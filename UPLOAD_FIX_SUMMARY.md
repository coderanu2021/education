# Upload Path Fix - Summary

## What Was Fixed

### 1. **Model Accessors** (Banner.php & Gallery.php)
- Changed from `asset()` to `url()` helper for better EC2 compatibility
- Added path normalization (removes leading slashes)
- Handles multiple path formats:
  - `banners/image.jpg` → `http://domain/uploads/banners/image.jpg`
  - `uploads/banners/image.jpg` → `http://domain/uploads/banners/image.jpg`
  - External URLs → returned as-is

### 2. **Filesystem Configuration** (config/filesystems.php)
- Updated 'uploads' disk URL to fallback to relative path if APP_URL not set
- Ensures compatibility with both localhost and EC2

### 3. **Frontend Views**
- Updated `home.blade.php` to use `$banner->image_url`
- Updated `gallery.blade.php` to use `$gallery->image_url`

### 4. **Admin Panel Tables**
- Updated `BannersTable.php` with proper disk configuration
- Updated `GalleryTable.php` with proper disk configuration
- Added visibility and default image settings

### 5. **Deployment Scripts**
- Updated `deploy.sh` to set permissions on `public/uploads`
- Created `fix-permissions.sh` for manual permission fixes
- Created `diagnose-uploads.sh` for troubleshooting

### 6. **Nginx Configuration**
- Added explicit `/uploads/` location block
- Ensures static files are served correctly

## Files Modified

1. `app/Models/Banner.php` - Added robust image URL accessor
2. `app/Models/Gallery.php` - Added robust image URL accessor
3. `app/Filament/Resources/Banners/Tables/BannersTable.php` - Fixed image column
4. `app/Filament/Resources/Gallery/Tables/GalleryTable.php` - Fixed image column
5. `resources/views/home.blade.php` - Updated to use accessor
6. `resources/views/gallery.blade.php` - Updated to use accessor
7. `config/filesystems.php` - Improved URL generation
8. `deploy.sh` - Added uploads directory permissions
9. `nginx-config.conf` - Added uploads location block

## Files Created

1. `fix-permissions.sh` - Script to fix file permissions on EC2
2. `diagnose-uploads.sh` - Script to diagnose upload issues
3. `EC2_UPLOAD_FIX.md` - Comprehensive troubleshooting guide
4. `.env.ec2.example` - EC2-specific environment configuration
5. `UPLOAD_FIX_SUMMARY.md` - This file

## How It Works Now

### Upload Process:
1. User uploads image via Filament admin panel
2. File is saved to `public/uploads/banners/` or `public/uploads/gallery/`
3. Database stores relative path: `banners/filename.jpg`
4. Model accessor converts to full URL: `http://domain/uploads/banners/filename.jpg`

### Display Process:
1. Controller fetches records from database
2. View calls `$model->image_url` accessor
3. Accessor generates correct URL based on environment
4. Browser requests image from `/uploads/banners/filename.jpg`
5. Nginx serves file from `public/uploads/banners/filename.jpg`

## Deployment to EC2

### First Time Setup:
```bash
# 1. Clone repository
cd /var/www/education

# 2. Copy environment file
cp .env.ec2.example .env
nano .env  # Update APP_URL, database credentials

# 3. Install dependencies
composer install --no-dev --optimize-autoloader

# 4. Generate key
php artisan key:generate

# 5. Run migrations
php artisan migrate --seed

# 6. Fix permissions
chmod +x fix-permissions.sh
./fix-permissions.sh

# 7. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 8. Configure Nginx
sudo cp nginx-config.conf /etc/nginx/sites-available/csaeducation
sudo ln -s /etc/nginx/sites-available/csaeducation /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx

# 9. Restart services
sudo systemctl restart php8.3-fpm
```

### Subsequent Deployments:
```bash
cd /var/www/education
./deploy.sh
```

## Troubleshooting on EC2

### If images don't display:

1. **Run diagnostics:**
   ```bash
   chmod +x diagnose-uploads.sh
   ./diagnose-uploads.sh
   ```

2. **Check APP_URL:**
   ```bash
   grep APP_URL .env
   # Should be: APP_URL=http://your-ec2-ip
   ```

3. **Fix permissions:**
   ```bash
   ./fix-permissions.sh
   ```

4. **Clear cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan config:cache
   ```

5. **Check logs:**
   ```bash
   tail -f storage/logs/laravel.log
   sudo tail -f /var/log/nginx/error.log
   ```

## Testing

### Test on Localhost:
1. Upload banner via admin panel
2. Check if it displays in banners table
3. Visit homepage - banner should display
4. Upload gallery image
5. Visit /gallery - image should display

### Test on EC2:
1. SSH into EC2
2. Run `./diagnose-uploads.sh`
3. Upload test image via admin panel
4. Check if file exists: `ls -la public/uploads/banners/`
5. Visit frontend to verify display
6. Check browser console for 404 errors

## Key Differences: Localhost vs EC2

| Aspect | Localhost | EC2 |
|--------|-----------|-----|
| APP_URL | http://localhost | http://ec2-ip or domain |
| File Owner | Your user | www-data |
| Permissions | Usually 755 | Must be 775 with www-data |
| Web Server | Apache/Nginx | Nginx |
| PHP | php-fpm/mod_php | php8.3-fpm |
| Cache | Less critical | Must clear after changes |

## Security Notes

1. **Never commit .env** - Contains sensitive credentials
2. **Set APP_DEBUG=false** in production
3. **Use strong passwords** for database
4. **Limit upload file sizes** - Currently 20MB
5. **Validate file types** - Only images allowed
6. **Set proper permissions** - 775 for directories, 664 for files
7. **Use HTTPS** in production with SSL certificate

## Performance Tips

1. **Enable OPcache** in PHP for better performance
2. **Use Redis** for cache and sessions (optional)
3. **Enable Nginx caching** for static files
4. **Optimize images** before upload
5. **Use CDN** for serving uploads (optional)

## Support

If issues persist after following this guide:
1. Review `EC2_UPLOAD_FIX.md` for detailed troubleshooting
2. Run `diagnose-uploads.sh` and share output
3. Check Laravel logs: `storage/logs/laravel.log`
4. Check Nginx logs: `/var/log/nginx/error.log`
