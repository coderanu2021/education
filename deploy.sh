#!/bin/bash

# CSA Education - Deployment Script for AWS EC2
# This script automates the deployment process

set -e

echo "🚀 Starting deployment..."

# Navigate to project directory
cd /var/www/education

# Enable maintenance mode
echo "📝 Enabling maintenance mode..."
php artisan down || true

# Pull latest code from Git
echo "📥 Pulling latest code..."
git pull origin main

# Install/Update Composer dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Run database migrations
echo "🗄️ Running migrations..."
php artisan migrate --force

# Clear old cache
echo "🧹 Clearing cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize application
echo "⚡ Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Set proper permissions
echo "🔐 Setting permissions..."
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Restart PHP-FPM
echo "🔄 Restarting PHP-FPM..."
sudo systemctl restart php8.3-fpm

# Reload Nginx
echo "🔄 Reloading Nginx..."
sudo systemctl reload nginx

# Disable maintenance mode
echo "✅ Disabling maintenance mode..."
php artisan up

echo "🎉 Deployment completed successfully!"
echo "✅ Website is now live!"
