#!/bin/bash

# CSA Education - Upload Diagnostics Script
# Run this on EC2 to diagnose upload path issues

echo "🔍 CSA Education - Upload Diagnostics"
echo "======================================"
echo ""

PROJECT_DIR="/var/www/education"

if [ ! -d "$PROJECT_DIR" ]; then
    echo "⚠️  Project directory not found: $PROJECT_DIR"
    echo "Please update PROJECT_DIR in this script"
    exit 1
fi

cd $PROJECT_DIR

echo "1️⃣  Checking directory structure..."
echo "-----------------------------------"
if [ -d "public/uploads" ]; then
    echo "✅ public/uploads exists"
else
    echo "❌ public/uploads NOT FOUND"
fi

if [ -d "public/uploads/banners" ]; then
    echo "✅ public/uploads/banners exists"
else
    echo "❌ public/uploads/banners NOT FOUND"
fi

if [ -d "public/uploads/gallery" ]; then
    echo "✅ public/uploads/gallery exists"
else
    echo "❌ public/uploads/gallery NOT FOUND"
fi

echo ""
echo "2️⃣  Checking permissions..."
echo "-----------------------------------"
ls -la public/ | grep uploads
echo ""
ls -la public/uploads/

echo ""
echo "3️⃣  Checking ownership..."
echo "-----------------------------------"
stat -c "%U:%G" public/uploads 2>/dev/null || stat -f "%Su:%Sg" public/uploads

echo ""
echo "4️⃣  Checking uploaded files..."
echo "-----------------------------------"
echo "Banners:"
ls -lh public/uploads/banners/ 2>/dev/null || echo "No files or directory not accessible"
echo ""
echo "Gallery:"
ls -lh public/uploads/gallery/ 2>/dev/null || echo "No files or directory not accessible"

echo ""
echo "5️⃣  Checking .env configuration..."
echo "-----------------------------------"
if [ -f ".env" ]; then
    echo "APP_URL: $(grep APP_URL .env | head -1)"
    echo "APP_ENV: $(grep APP_ENV .env | head -1)"
    echo "APP_DEBUG: $(grep APP_DEBUG .env | head -1)"
else
    echo "❌ .env file not found!"
fi

echo ""
echo "6️⃣  Checking PHP-FPM status..."
echo "-----------------------------------"
sudo systemctl status php8.3-fpm --no-pager | head -5

echo ""
echo "7️⃣  Checking Nginx status..."
echo "-----------------------------------"
sudo systemctl status nginx --no-pager | head -5

echo ""
echo "8️⃣  Checking disk space..."
echo "-----------------------------------"
df -h | grep -E "Filesystem|/$"

echo ""
echo "9️⃣  Checking recent uploads in database..."
echo "-----------------------------------"
php artisan tinker --execute="echo 'Banners: '; \App\Models\Banner::latest()->take(3)->pluck('image'); echo 'Gallery: '; \App\Models\Gallery::latest()->take(3)->pluck('image');"

echo ""
echo "🔟  Testing URL generation..."
echo "-----------------------------------"
php artisan tinker --execute="\$banner = \App\Models\Banner::first(); if(\$banner) { echo 'Image path: ' . \$banner->image . PHP_EOL; echo 'Image URL: ' . \$banner->image_url . PHP_EOL; } else { echo 'No banners found'; }"

echo ""
echo "1️⃣1️⃣  Checking Nginx configuration..."
echo "-----------------------------------"
sudo nginx -t

echo ""
echo "1️⃣2️⃣  Recent Nginx errors..."
echo "-----------------------------------"
sudo tail -20 /var/log/nginx/error.log 2>/dev/null || echo "No error log found"

echo ""
echo "1️⃣3️⃣  Recent Laravel errors..."
echo "-----------------------------------"
tail -20 storage/logs/laravel.log 2>/dev/null || echo "No Laravel log found"

echo ""
echo "======================================"
echo "✅ Diagnostics complete!"
echo ""
echo "📝 Common fixes:"
echo "   1. Run: ./fix-permissions.sh"
echo "   2. Update APP_URL in .env"
echo "   3. Run: php artisan config:clear && php artisan config:cache"
echo "   4. Restart: sudo systemctl restart php8.3-fpm nginx"
