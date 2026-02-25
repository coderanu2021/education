# Quick Fix for EC2 Upload Issues

## 🚨 If images don't display on EC2, run these commands:

```bash
# 1. Navigate to project
cd /var/www/education

# 2. Update .env file
nano .env
# Set: APP_URL=http://your-ec2-ip-address

# 3. Fix permissions
sudo mkdir -p public/uploads/banners public/uploads/gallery
sudo chown -R www-data:www-data public/uploads storage bootstrap/cache
sudo chmod -R 775 public/uploads storage bootstrap/cache

# 4. Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# 5. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Restart services
sudo systemctl restart php8.3-fpm
sudo systemctl reload nginx

# 7. Test upload
# Go to: http://your-ec2-ip/admin
# Upload a banner or gallery image
```

## ✅ Verify Fix

```bash
# Check if files are created
ls -la public/uploads/banners/
ls -la public/uploads/gallery/

# Check permissions
ls -la public/uploads/

# Check URL generation
php artisan tinker
>>> $banner = \App\Models\Banner::first();
>>> echo $banner->image_url;
# Should output: http://your-ec2-ip/uploads/banners/filename.jpg
```

## 🔍 Still Not Working?

Run diagnostics:
```bash
chmod +x diagnose-uploads.sh
./diagnose-uploads.sh
```

## 📋 Common Issues

| Issue | Solution |
|-------|----------|
| Permission denied | Run: `sudo chown -R www-data:www-data public/uploads` |
| 404 on images | Check APP_URL in .env, run `php artisan config:cache` |
| Upload fails | Check: `sudo tail -f /var/log/nginx/error.log` |
| Images disappear | Ensure uploads folder is on EBS, not ephemeral storage |

## 🎯 One-Line Fix

```bash
cd /var/www/education && sudo chown -R www-data:www-data public/uploads storage bootstrap/cache && sudo chmod -R 775 public/uploads storage bootstrap/cache && php artisan config:clear && php artisan config:cache && sudo systemctl restart php8.3-fpm nginx
```

## 📞 Need Help?

1. Check `EC2_UPLOAD_FIX.md` for detailed guide
2. Run `./diagnose-uploads.sh` for diagnostics
3. Check logs: `tail -f storage/logs/laravel.log`
