#!/bin/bash

# CSA Education - Fix Permissions Script for EC2
# Run this script if you encounter permission issues with uploads

set -e

echo "🔐 Fixing file permissions for CSA Education..."

# Navigate to project directory
PROJECT_DIR="/var/www/education"

if [ ! -d "$PROJECT_DIR" ]; then
    echo "❌ Project directory not found: $PROJECT_DIR"
    echo "Please update PROJECT_DIR in this script to match your installation path"
    exit 1
fi

cd $PROJECT_DIR

# Create uploads directories if they don't exist
echo "📁 Creating upload directories..."
mkdir -p public/uploads/banners
mkdir -p public/uploads/gallery

# Set ownership to www-data (Nginx/PHP-FPM user)
echo "👤 Setting ownership to www-data..."
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
sudo chown -R www-data:www-data public/uploads

# Set proper permissions
# 755 for directories (rwxr-xr-x)
# 644 for files (rw-r--r--)
echo "🔑 Setting directory permissions..."
sudo find storage -type d -exec chmod 775 {} \;
sudo find bootstrap/cache -type d -exec chmod 775 {} \;
sudo find public/uploads -type d -exec chmod 775 {} \;

echo "🔑 Setting file permissions..."
sudo find storage -type f -exec chmod 664 {} \;
sudo find bootstrap/cache -type f -exec chmod 664 {} \;
sudo find public/uploads -type f -exec chmod 664 {} \;

# Verify permissions
echo ""
echo "✅ Permissions fixed!"
echo ""
echo "📊 Current permissions:"
ls -la public/uploads/
echo ""
ls -la storage/
echo ""

echo "🎉 Done! Try uploading files now."
