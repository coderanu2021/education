# Complete Image Upload Fix - All Resources

## Summary of Changes

### ✅ Fixed Resources:
1. **Banners** - Upload & Display
2. **Gallery** - Upload & Display  
3. **Courses** - Upload & Display
4. **Settings** - Logo, Footer Logo, Favicon Upload & Display

## What Was Fixed

### 1. FileUpload Components (Admin Panel)
All FileUpload components now use consistent configuration:
```php
FileUpload::make('image')
    ->disk('uploads')              // Uses public/uploads directory
    ->directory('subfolder')       // banners, gallery, courses, settings
    ->visibility('public')         // Ensures files are publicly accessible
    ->maxSize(5120)               // 5MB limit
```

### 2. Model Accessors
Added `image_url` accessors to all models:
- `Banner::getImageUrlAttribute()`
- `Gallery::getImageUrlAttribute()`
- `Course::getImageUrlAttribute()`
- `Setting::getLogoUrlAttribute()`, `getFooterLogoUrlAttribute()`, `getFaviconUrlAttribute()`

These accessors handle:
- External URLs (http/https)
- Paths with/without 'uploads/' prefix
- Relative paths
- Generate proper URLs using `url()` helper

### 3. Filament Tables (ImageColumn)
All ImageColumn configurations updated:
```php
ImageColumn::make('image')
    ->disk('uploads')
    ->visibility('public')
    ->size(150)
```

### 4. Frontend Views
Updated all blade templates to use model accessors:
- `home.blade.php` - Banner & Course images
- `gallery.blade.php` - Gallery images
- `courses/index.blade.php` - Course listing images
- `courses/show.blade.php` - Course detail images

Changed from:
```php
asset('storage/' . $model->image)
```

To:
```php
$model->image_url
```

### 5. Directory Structure
Created all required upload directories:
```
public/uploads/
├── banners/
├── gallery/
├── courses/
└── settings/
```

## Files Modified

### Models:
1. `app/Models/Banner.php` - Added image_url accessor
2. `app/Models/Gallery.php` - Added image_url accessor
3. `app/Models/Course.php` - Added image_url accessor
4. `app/Models/Setting.php` - Added logo_url, footer_logo_url, favicon_url accessors

### Forms:
1. `app/Filament/Resources/Banners/Schemas/BannerForm.php`
2. `app/Filament/Resources/Gallery/Schemas/GalleryForm.php`
3. `app/Filament/Resources/Courses/Schemas/CourseForm.php`
4. `app/Filament/Resources/Settings/Schemas/SettingForm.php`

### Tables:
1. `app/Filament/Resources/Banners/Tables/BannersTable.php`
2. `app/Filament/Resources/Gallery/Tables/GalleryTable.php`
3. `app/Filament/Resources/Courses/Tables/CoursesTable.php`

### Views:
1. `resources/views/home.blade.php`
2. `resources/views/gallery.blade.php`
3. `resources/views/courses/index.blade.php`
4. `resources/views/courses/show.blade.php`

### Configuration:
1. `config/filesystems.php` - Updated uploads disk URL generation

### Scripts:
1. `deploy.sh` - Added uploads directory permissions
2. `fix-permissions.sh` - Created for EC2 permission fixes
3. `diagnose-uploads.sh` - Created for troubleshooting
4. `test-uploads.php` - Created for testing configuration

## How It Works Now

### Upload Flow:
1. User uploads image via Filament admin panel
2. Filament saves to `public/uploads/{directory}/filename.jpg`
3. Database stores relative path: `{directory}/filename.jpg`
4. Model accessor converts to full URL when accessed

### Display Flow:
1. Controller fetches model from database
2. View calls `$model->image_url`
3. Accessor generates: `http://domain/uploads/{directory}/filename.jpg`
4. Browser displays image

## Testing

### Run Test Script:
```bash
php test-uploads.php
```

This will check:
- Model accessors working correctly
- File paths in database
- Physical files exist
- Directory permissions
- Filesystem configuration
- APP_URL configuration

### Manual Testing:

#### 1. Test Banner Upload:
```
1. Go to /admin/banners/create
2. Upload an image
3. Save
4. Check if image shows in table
5. Visit homepage - banner should display
```

#### 2. Test Gallery Upload:
```
1. Go to /admin/gallery/create
2. Upload an image
3. Save
4. Check if image shows in table
5. Visit /gallery - image should display
```

#### 3. Test Course Upload:
```
1. Go to /admin/courses/create
2. Fill form and upload image
3. Save
4. Check if image shows in table
5. Visit /courses - image should display
```

#### 4. Test Settings Upload:
```
1. Go to /admin/settings
2. Upload logo, footer logo, favicon
3. Save
4. Check if images show in form
5. Visit homepage - logos should display
```

## Deployment to EC2

### After deploying code:

```bash
cd /var/www/education

# 1. Create directories
mkdir -p public/uploads/{banners,gallery,courses,settings}

# 2. Set permissions
sudo chown -R www-data:www-data public/uploads
sudo chmod -R 775 public/uploads

# 3. Update .env
nano .env
# Set: APP_URL=http://your-ec2-ip-or-domain

# 4. Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# 5. Cache config
php artisan config:cache

# 6. Test
php test-uploads.php

# 7. Restart services
sudo systemctl restart php8.3-fpm
sudo systemctl reload nginx
```

## Troubleshooting

### Images not showing in admin panel:
```bash
# Check permissions
ls -la public/uploads/

# Fix permissions
./fix-permissions.sh

# Clear cache
php artisan config:clear
php artisan config:cache
```

### Images not showing on frontend:
```bash
# Check APP_URL
grep APP_URL .env

# Should be: APP_URL=http://your-domain.com

# Clear cache
php artisan config:clear
php artisan config:cache
```

### Upload fails:
```bash
# Check disk space
df -h

# Check permissions
ls -la public/uploads/

# Check PHP upload limits
php -i | grep upload_max_filesize
php -i | grep post_max_size

# Check logs
tail -f storage/logs/laravel.log
```

### 404 on images:
```bash
# Check if file exists
ls -la public/uploads/banners/
ls -la public/uploads/gallery/

# Check Nginx config
sudo nginx -t

# Check Nginx logs
sudo tail -f /var/log/nginx/error.log
```

## Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| Permission denied | Run `./fix-permissions.sh` |
| Images show broken icon | Check APP_URL in .env |
| Upload button not working | Check browser console for errors |
| Images disappear after restart | Ensure uploads is on persistent storage (EBS) |
| Different behavior localhost vs EC2 | Ensure APP_URL is set correctly for each environment |

## Verification Checklist

- [ ] All upload directories exist
- [ ] Directories have correct permissions (775)
- [ ] APP_URL is set correctly in .env
- [ ] Config cache is cleared
- [ ] Can upload banner image
- [ ] Banner shows in admin table
- [ ] Banner displays on homepage
- [ ] Can upload gallery image
- [ ] Gallery shows in admin table
- [ ] Gallery displays on /gallery page
- [ ] Can upload course image
- [ ] Course shows in admin table
- [ ] Course displays on /courses page
- [ ] Can upload settings logos
- [ ] Logos show in settings form
- [ ] Logos display on frontend

## Support Files

- `test-uploads.php` - Test configuration
- `fix-permissions.sh` - Fix file permissions
- `diagnose-uploads.sh` - Diagnose issues
- `EC2_UPLOAD_FIX.md` - Detailed EC2 guide
- `QUICK_FIX_EC2.md` - Quick reference

## Notes

- All images stored in `public/uploads/` directory
- Database stores relative paths (e.g., `banners/image.jpg`)
- Model accessors generate full URLs
- Works on both localhost and EC2
- No symbolic links required
- No storage directory used
