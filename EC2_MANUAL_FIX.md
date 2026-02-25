# EC2 Manual Fix - Step by Step

## Problem
Files not uploading on EC2 server. Error: Permission denied or file not found.

## Solution - Run These Commands on EC2

### Step 1: SSH into EC2
```bash
ssh your-user@your-ec2-ip
# Example: ssh ubuntu@54.123.45.67
```

### Step 2: Navigate to Project
```bash
cd /var/www/education
```

### Step 3: Create Upload Directories
```bash
sudo mkdir -p public/uploads/banners
sudo mkdir -p public/uploads/gallery
sudo mkdir -p public/uploads/courses
sudo mkdir -p public/uploads/settings
```

### Step 4: Set Ownership (CRITICAL!)
```bash
sudo chown -R www-data:www-data public/uploads
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
```

### Step 5: Set Permissions (CRITICAL!)
```bash
sudo chmod -R 775 public/uploads
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

### Step 6: Verify Permissions
```bash
ls -la public/uploads/
```

You should see:
```
drwxrwxr-x www-data www-data banners
drwxrwxr-x www-data www-data gallery
drwxrwxr-x www-data www-data courses
drwxrwxr-x www-data www-data settings
```

### Step 7: Update .env File
```bash
nano .env
```

Make sure these are set:
```env
APP_URL=http://your-ec2-ip-or-domain
APP_ENV=production
APP_DEBUG=false
```

Save: `Ctrl+O`, `Enter`, `Ctrl+X`

### Step 8: Fix Database Paths
```bash
php fix-banner-paths.php
```

### Step 9: Clear All Caches
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### Step 10: Cache Configuration
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 11: Restart Services
```bash
sudo systemctl restart php8.3-fpm
sudo systemctl reload nginx
```

### Step 12: Test Upload
1. Open browser: `http://your-ec2-ip/admin`
2. Login to admin panel
3. Go to Banners → New banner
4. Upload an image
5. Save
6. Check if image shows in table
7. Visit homepage to verify

## Quick One-Liner Fix

If you want to run everything at once:

```bash
cd /var/www/education && sudo mkdir -p public/uploads/{banners,gallery,courses,settings} && sudo chown -R www-data:www-data public/uploads storage bootstrap/cache && sudo chmod -R 775 public/uploads storage bootstrap/cache && php artisan config:clear && php artisan cache:clear && php artisan config:cache && sudo systemctl restart php8.3-fpm nginx && echo "✅ Done!"
```

## Troubleshooting

### Issue: "Permission denied" when uploading
**Solution:**
```bash
sudo chown -R www-data:www-data public/uploads
sudo chmod -R 775 public/uploads
```

### Issue: "Directory not found"
**Solution:**
```bash
sudo mkdir -p public/uploads/{banners,gallery,courses,settings}
```

### Issue: Images upload but don't display
**Solution:**
```bash
# Check APP_URL in .env
grep APP_URL .env

# Should be: APP_URL=http://your-ec2-ip

# Clear cache
php artisan config:clear
php artisan config:cache
```

### Issue: "File exists but shows 404"
**Solution:**
```bash
# Check Nginx config
sudo nginx -t

# Reload Nginx
sudo systemctl reload nginx

# Check file permissions
ls -la public/uploads/banners/
```

### Issue: Different images on localhost vs EC2
**Solution:**
```bash
# Normalize paths
php fix-banner-paths.php

# Clear cache
php artisan config:clear
php artisan config:cache
```

## Verification Commands

```bash
# Check if directories exist
ls -la public/uploads/

# Check ownership
stat -c "%U:%G" public/uploads/banners

# Check permissions
stat -c "%a" public/uploads/banners

# Check if writable
[ -w public/uploads/banners ] && echo "✅ Writable" || echo "❌ Not writable"

# Check PHP-FPM user
ps aux | grep php-fpm | head -1

# Check Nginx user
ps aux | grep nginx | head -1

# Test file creation
sudo -u www-data touch public/uploads/test.txt && echo "✅ Can write" || echo "❌ Cannot write"
sudo rm public/uploads/test.txt
```

## Expected Output

After running all steps, you should see:

```bash
$ ls -la public/uploads/
total 16
drwxrwxr-x 6 www-data www-data 4096 Feb 25 20:00 .
drwxr-xr-x 8 www-data www-data 4096 Feb 25 19:00 ..
drwxrwxr-x 2 www-data www-data 4096 Feb 25 20:00 banners
drwxrwxr-x 2 www-data www-data 4096 Feb 25 20:00 gallery
drwxrwxr-x 2 www-data www-data 4096 Feb 25 20:00 courses
drwxrwxr-x 2 www-data www-data 4096 Feb 25 20:00 settings
```

## Important Notes

1. **Always use www-data** as owner on Ubuntu/Debian EC2
2. **775 permissions** allow PHP-FPM to write files
3. **Clear cache** after any .env changes
4. **Restart services** after permission changes
5. **Test in incognito** to avoid browser cache

## Need Help?

Run diagnostics:
```bash
bash diagnose-uploads.sh
```

This will show you exactly what's wrong.
