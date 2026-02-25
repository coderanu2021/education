# EC2 Upload Path Fix Guide

## Issue
Images upload successfully on localhost but fail or don't display on EC2 server.

## Root Causes
1. **Incorrect APP_URL** in `.env` file
2. **Permission issues** on `public/uploads` directory
3. **Nginx configuration** not serving static files correctly
4. **SELinux or AppArmor** blocking file access (rare)

## Solution Steps

### 1. Update .env File on EC2

SSH into your EC2 instance and update the `.env` file:

```bash
cd /var/www/education
nano .env
```

Update these values:
```env
APP_URL=http://your-ec2-ip-or-domain
# Example: APP_URL=http://54.123.45.67
# Or: APP_URL=https://csaeducation.com
```

### 2. Fix Directory Permissions

Run the permission fix script:

```bash
cd /var/www/education
chmod +x fix-permissions.sh
./fix-permissions.sh
```

Or manually:

```bash
# Create directories
sudo mkdir -p public/uploads/banners
sudo mkdir -p public/uploads/gallery

# Set ownership
sudo chown -R www-data:www-data public/uploads
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache

# Set permissions
sudo chmod -R 775 public/uploads
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

### 3. Clear All Caches

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Then cache again
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 4. Verify Nginx Configuration

Check your Nginx config at `/etc/nginx/sites-available/csaeducation`:

```nginx
server {
    listen 80;
    server_name your-domain.com;
    
    root /var/www/education/public;
    index index.php index.html;

    # Important: Allow access to uploads directory
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        access_log off;
    }

    # Ensure uploads directory is accessible
    location /uploads/ {
        alias /var/www/education/public/uploads/;
        autoindex off;
    }

    # PHP handling
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Increase upload size
    client_max_body_size 20M;
}
```

Test and reload Nginx:

```bash
sudo nginx -t
sudo systemctl reload nginx
```

### 5. Verify PHP Upload Settings

Check PHP configuration:

```bash
sudo nano /etc/php/8.3/fpm/php.ini
```

Ensure these values are set:

```ini
upload_max_filesize = 20M
post_max_size = 20M
memory_limit = 256M
max_execution_time = 300
```

Restart PHP-FPM:

```bash
sudo systemctl restart php8.3-fpm
```

### 6. Test Upload

1. Go to admin panel: `http://your-ec2-ip/admin`
2. Navigate to Banners or Gallery
3. Try uploading an image
4. Check if it displays in the table
5. Visit the frontend to verify display

### 7. Debug Path Issues

If images still don't show, check the actual paths in database:

```bash
php artisan tinker
```

```php
// Check banner paths
\App\Models\Banner::all()->pluck('image');

// Check gallery paths
\App\Models\Gallery::all()->pluck('image');

// Test URL generation
$banner = \App\Models\Banner::first();
echo $banner->image_url;
```

Expected output: `http://your-ec2-ip/uploads/banners/filename.jpg`

### 8. Check File Existence

Verify files are actually uploaded:

```bash
ls -la /var/www/education/public/uploads/banners/
ls -la /var/www/education/public/uploads/gallery/
```

### 9. Check Nginx Error Logs

If files exist but don't display:

```bash
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/nginx/csaeducation-error.log
```

### 10. SELinux Issues (CentOS/RHEL only)

If using CentOS/RHEL, SELinux might block access:

```bash
# Check if SELinux is enabled
getenforce

# If enabled, set proper context
sudo chcon -R -t httpd_sys_rw_content_t /var/www/education/public/uploads
sudo chcon -R -t httpd_sys_rw_content_t /var/www/education/storage
```

## Quick Deployment Checklist

After deploying to EC2, always run:

```bash
cd /var/www/education

# 1. Pull latest code
git pull origin master

# 2. Install dependencies
composer install --no-dev --optimize-autoloader

# 3. Run migrations
php artisan migrate --force

# 4. Fix permissions
./fix-permissions.sh

# 5. Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Restart services
sudo systemctl restart php8.3-fpm
sudo systemctl reload nginx
```

## Common Issues & Solutions

### Issue: "Permission denied" when uploading
**Solution**: Run `./fix-permissions.sh`

### Issue: Images upload but show broken icon
**Solution**: Check APP_URL in `.env` and clear config cache

### Issue: 404 error for uploaded images
**Solution**: Verify Nginx configuration and reload

### Issue: Upload works but images don't persist after server restart
**Solution**: Check if uploads directory is on ephemeral storage (use EBS volume)

### Issue: Different behavior on localhost vs EC2
**Solution**: Ensure APP_URL is correctly set for each environment

## Verification Commands

```bash
# Check if directories exist and have correct permissions
ls -la public/uploads/

# Check PHP-FPM is running
sudo systemctl status php8.3-fpm

# Check Nginx is running
sudo systemctl status nginx

# Check disk space
df -h

# Check if files are being created
sudo tail -f /var/log/nginx/access.log
```

## Support

If issues persist:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Check Nginx error logs: `/var/log/nginx/error.log`
3. Check PHP-FPM logs: `/var/log/php8.3-fpm.log`
