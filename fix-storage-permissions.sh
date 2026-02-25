#!/bin/bash

# Fix Storage Permissions on EC2
# This fixes the "Permission denied" error for storage/logs

echo "🔧 Fixing Storage Permissions..."

cd /var/www/education

# Fix storage directory
echo "1️⃣  Fixing storage directory..."
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage

# Fix bootstrap/cache
echo "2️⃣  Fixing bootstrap/cache..."
sudo chown -R www-data:www-data bootstrap/cache
sudo chmod -R 775 bootstrap/cache

# Fix uploads
echo "3️⃣  Fixing uploads directory..."
sudo chown -R www-data:www-data public/uploads
sudo chmod -R 775 public/uploads

# Create log file if doesn't exist
echo "4️⃣  Creating log file..."
sudo touch storage/logs/laravel.log
sudo chown www-data:www-data storage/logs/laravel.log
sudo chmod 664 storage/logs/laravel.log

# Verify
echo ""
echo "✅ Permissions fixed!"
echo ""
echo "Verification:"
ls -la storage/logs/laravel.log
echo ""
ls -la public/uploads/
echo ""

# Test write access
echo "Testing write access..."
sudo -u www-data touch storage/logs/test.log && echo "✅ Storage writable" || echo "❌ Storage not writable"
sudo -u www-data touch public/uploads/test.txt && echo "✅ Uploads writable" || echo "❌ Uploads not writable"

# Cleanup test files
sudo rm -f storage/logs/test.log public/uploads/test.txt

echo ""
echo "🎉 Done! Try uploading now."
