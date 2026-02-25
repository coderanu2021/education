#!/bin/bash

# Quick Fix for EC2 Upload Issues
# Run this on EC2: bash ec2-quick-fix.sh

echo "🚀 CSA Education - Quick EC2 Fix"
echo "================================="
echo ""

cd /var/www/education

# 1. Create directories
echo "1️⃣  Creating upload directories..."
sudo mkdir -p public/uploads/{banners,gallery,courses,settings}

# 2. Set ownership
echo "2️⃣  Setting ownership..."
sudo chown -R www-data:www-data public/uploads
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache

# 3. Set permissions
echo "3️⃣  Setting permissions..."
sudo chmod -R 775 public/uploads
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache

# 4. Normalize banner paths in database
echo "4️⃣  Normalizing database paths..."
php artisan tinker --execute="
\App\Models\Banner::all()->each(function(\$b) {
    \$old = \$b->image;
    \$new = str_replace('uploads/', '', \$old);
    if (!\str_starts_with(\$new, 'banners/')) {
        \$new = 'banners/' . basename(\$new);
    }
    if (\$old !== \$new) {
        \$b->image = \$new;
        \$b->save();
        echo \"Updated Banner {\$b->id}: \$old -> \$new\n\";
    }
});
echo \"✅ Banners updated\n\";
"

# 5. Clear caches
echo "5️⃣  Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# 6. Cache config
echo "6️⃣  Caching configuration..."
php artisan config:cache

# 7. Restart services
echo "7️⃣  Restarting services..."
sudo systemctl restart php8.3-fpm
sudo systemctl reload nginx

echo ""
echo "✅ Fix complete!"
echo ""
echo "📊 Verification:"
ls -la public/uploads/
echo ""
echo "🧪 Test upload now at: http://your-ec2-ip/admin"
