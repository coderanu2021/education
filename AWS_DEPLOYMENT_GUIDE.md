# AWS EC2 Auto Deployment Guide

## 🚀 Complete Setup Guide for CSA Education Website

---

## 📋 Prerequisites

1. AWS Account
2. GitHub Account
3. Domain name (optional)
4. Basic Linux knowledge

---

## 🖥️ Part 1: AWS EC2 Setup

### Step 1: Launch EC2 Instance

1. **Login to AWS Console**
   - Go to EC2 Dashboard
   - Click "Launch Instance"

2. **Configure Instance**
   - **Name:** CSA-Education-Server
   - **AMI:** Ubuntu Server 22.04 LTS
   - **Instance Type:** t2.micro (Free tier) or t2.small
   - **Key Pair:** Create new or use existing
   - **Security Group:** Create with these rules:
     - SSH (22) - Your IP
     - HTTP (80) - Anywhere
     - HTTPS (443) - Anywhere

3. **Launch Instance**
   - Wait for instance to start
   - Note down Public IP address

### Step 2: Connect to EC2

```bash
# Download your .pem key file
chmod 400 your-key.pem

# Connect to EC2
ssh -i your-key.pem ubuntu@YOUR_EC2_IP
```

---

## 🔧 Part 2: Server Setup

### Step 1: Update System

```bash
sudo apt update
sudo apt upgrade -y
```

### Step 2: Install Required Software

```bash
# Install Nginx
sudo apt install nginx -y

# Install PHP 8.3 and extensions
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install php8.3 php8.3-fpm php8.3-mysql php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-gd -y

# Install MySQL
sudo apt install mysql-server -y

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Git
sudo apt install git -y

# Install Node.js (optional, for assets)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install nodejs -y
```

### Step 3: Configure MySQL

```bash
# Secure MySQL installation
sudo mysql_secure_installation

# Create database
sudo mysql -u root -p

# In MySQL prompt:
CREATE DATABASE csaeducation;
CREATE USER 'csauser'@'localhost' IDENTIFIED BY 'your_strong_password';
GRANT ALL PRIVILEGES ON csaeducation.* TO 'csauser'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

## 📁 Part 3: Deploy Application

### Step 1: Clone Repository

```bash
# Create web directory
sudo mkdir -p /var/www/csaeducation
sudo chown -R $USER:$USER /var/www/csaeducation

# Clone your repository
cd /var/www
git clone https://github.com/YOUR_USERNAME/csaeducation.git csaeducation
cd csaeducation
```

### Step 2: Configure Application

```bash
# Copy environment file
cp .env.example .env

# Edit .env file
nano .env
```

**Update these values in .env:**
```env
APP_NAME="CSA Education"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://YOUR_DOMAIN_OR_IP

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=csaeducation
DB_USERNAME=csauser
DB_PASSWORD=your_strong_password
```

### Step 3: Install Dependencies

```bash
# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Create admin user
php artisan make:filament-user

# Set permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

---

## 🌐 Part 4: Configure Nginx

### Create Nginx Configuration

```bash
sudo nano /etc/nginx/sites-available/csaeducation
```

**Add this configuration:**
```nginx
server {
    listen 80;
    server_name YOUR_DOMAIN_OR_IP;
    root /var/www/csaeducation/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### Enable Site

```bash
# Create symbolic link
sudo ln -s /etc/nginx/sites-available/csaeducation /etc/nginx/sites-enabled/

# Remove default site
sudo rm /etc/nginx/sites-enabled/default

# Test configuration
sudo nginx -t

# Restart Nginx
sudo systemctl restart nginx
```

---

## 🔐 Part 5: SSL Certificate (Optional but Recommended)

### Install Certbot

```bash
sudo apt install certbot python3-certbot-nginx -y

# Get SSL certificate
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Auto-renewal is set up automatically
```

---

## 🤖 Part 6: GitHub Actions Auto Deployment

### Step 1: Generate SSH Key on EC2

```bash
# On EC2 server
ssh-keygen -t rsa -b 4096 -C "deploy@csaeducation"

# Add to authorized_keys
cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys

# Copy private key (you'll need this for GitHub)
cat ~/.ssh/id_rsa
```

### Step 2: Configure GitHub Repository

1. **Go to your GitHub repository**
2. **Settings → Secrets and variables → Actions**
3. **Add these secrets:**

   - `EC2_HOST`: Your EC2 public IP or domain
   - `EC2_USERNAME`: `ubuntu` (or your username)
   - `EC2_SSH_KEY`: Paste the private key from above

### Step 3: Setup Deployment Script

```bash
# On EC2 server
cd /var/www/csaeducation

# Make deploy script executable
chmod +x deploy.sh

# Test deployment
./deploy.sh
```

### Step 4: Configure Git on EC2

```bash
# Configure Git
git config --global user.name "Your Name"
git config --global user.email "your@email.com"

# Setup Git credentials (for private repos)
git config --global credential.helper store
```

---

## 🔄 Part 7: Auto Deployment Workflow

### How It Works

1. **Push code to GitHub** (main/master branch)
2. **GitHub Actions triggers** automatically
3. **Connects to EC2** via SSH
4. **Pulls latest code**
5. **Runs deployment script**
6. **Website updated** automatically!

### Manual Deployment

```bash
# SSH to EC2
ssh -i your-key.pem ubuntu@YOUR_EC2_IP

# Run deployment
cd /var/www/csaeducation
./deploy.sh
```

---

## 📊 Part 8: Monitoring & Maintenance

### Check Application Status

```bash
# Check Nginx status
sudo systemctl status nginx

# Check PHP-FPM status
sudo systemctl status php8.3-fpm

# Check MySQL status
sudo systemctl status mysql

# View Laravel logs
tail -f /var/www/csaeducation/storage/logs/laravel.log

# View Nginx error logs
sudo tail -f /var/nginx/error.log
```

### Useful Commands

```bash
# Restart services
sudo systemctl restart nginx
sudo systemctl restart php8.3-fpm

# Clear Laravel cache
cd /var/www/csaeducation
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Optimize application
php artisan optimize
```

---

## 🔒 Part 9: Security Best Practices

### 1. Firewall Setup

```bash
# Enable UFW
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

### 2. Secure MySQL

```bash
# Change root password
sudo mysql -u root -p
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'new_strong_password';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Regular Updates

```bash
# Create update script
sudo nano /usr/local/bin/update-system.sh
```

Add:
```bash
#!/bin/bash
apt update
apt upgrade -y
apt autoremove -y
```

```bash
chmod +x /usr/local/bin/update-system.sh

# Setup cron for weekly updates
sudo crontab -e
# Add: 0 2 * * 0 /usr/local/bin/update-system.sh
```

---

## 🚨 Troubleshooting

### Issue: 502 Bad Gateway

```bash
# Check PHP-FPM
sudo systemctl status php8.3-fpm
sudo systemctl restart php8.3-fpm

# Check permissions
sudo chown -R www-data:www-data /var/www/csaeducation
```

### Issue: Database Connection Error

```bash
# Check MySQL
sudo systemctl status mysql

# Verify credentials in .env
nano /var/www/csaeducation/.env

# Test connection
php artisan tinker
DB::connection()->getPdo();
```

### Issue: Permission Denied

```bash
# Fix permissions
cd /var/www/csaeducation
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

---

## 📝 Deployment Checklist

Before going live:

- [ ] EC2 instance running
- [ ] Domain configured (if using)
- [ ] SSL certificate installed
- [ ] Database created and configured
- [ ] .env file configured for production
- [ ] APP_DEBUG=false in .env
- [ ] Migrations run successfully
- [ ] Admin user created
- [ ] File permissions set correctly
- [ ] Nginx configured and running
- [ ] GitHub Actions secrets configured
- [ ] Test deployment successful
- [ ] Backup strategy in place

---

## 💾 Backup Strategy

### Database Backup Script

```bash
# Create backup script
sudo nano /usr/local/bin/backup-db.sh
```

Add:
```bash
#!/bin/bash
BACKUP_DIR="/var/backups/mysql"
DATE=$(date +%Y%m%d_%H%M%S)
mkdir -p $BACKUP_DIR
mysqldump -u csauser -p'your_password' csaeducation > $BACKUP_DIR/csaeducation_$DATE.sql
# Keep only last 7 days
find $BACKUP_DIR -name "*.sql" -mtime +7 -delete
```

```bash
chmod +x /usr/local/bin/backup-db.sh

# Setup daily backup
sudo crontab -e
# Add: 0 3 * * * /usr/local/bin/backup-db.sh
```

---

## 🎉 Success!

Your CSA Education website is now:
- ✅ Deployed on AWS EC2
- ✅ Auto-deploying from GitHub
- ✅ Secured with SSL (if configured)
- ✅ Backed up regularly
- ✅ Production ready!

---

## 📞 Support

For issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Check Nginx logs: `/var/log/nginx/error.log`
3. Check PHP-FPM logs: `/var/log/php8.3-fpm.log`

---

**Deployment Guide Version:** 1.0
**Last Updated:** February 24, 2026
