#!/bin/bash

# CSA Education - EC2 Initial Setup Script
# Run this script on a fresh Ubuntu 22.04 EC2 instance

set -e

echo "🚀 CSA Education - EC2 Setup Script"
echo "===================================="
echo ""

# Update system
echo "📦 Updating system packages..."
sudo apt update
sudo apt upgrade -y

# Install Nginx
echo "🌐 Installing Nginx..."
sudo apt install nginx -y

# Install PHP 8.3
echo "🐘 Installing PHP 8.3..."
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install php8.3 php8.3-fpm php8.3-mysql php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-gd php8.3-intl -y

# Install MySQL
echo "🗄️ Installing MySQL..."
sudo apt install mysql-server -y

# Install Composer
echo "🎼 Installing Composer..."
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Git
echo "📚 Installing Git..."
sudo apt install git -y

# Install Node.js
echo "📦 Installing Node.js..."
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install nodejs -y

# Setup firewall
echo "🔒 Configuring firewall..."
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw --force enable

# Create web directory
echo "📁 Creating web directory..."
sudo mkdir -p /var/www/csaeducation
sudo chown -R $USER:$USER /var/www/csaeducation

echo ""
echo "✅ Basic setup completed!"
echo ""
echo "📝 Next steps:"
echo "1. Secure MySQL: sudo mysql_secure_installation"
echo "2. Create database and user"
echo "3. Clone your repository to /var/www/csaeducation"
echo "4. Configure .env file"
echo "5. Run: composer install"
echo "6. Run: php artisan migrate --seed"
echo "7. Configure Nginx"
echo ""
echo "📖 See AWS_DEPLOYMENT_GUIDE.md for detailed instructions"
