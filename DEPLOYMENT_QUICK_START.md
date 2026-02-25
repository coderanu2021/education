# 🚀 Quick Deployment Guide

## One-Time Setup (30 minutes)

### 1. Launch EC2 Instance
```
- Ubuntu 22.04 LTS
- t2.micro or t2.small
- Open ports: 22, 80, 443
- Download .pem key
```

### 2. Connect to EC2
```bash
chmod 400 your-key.pem
ssh -i your-key.pem ubuntu@YOUR_EC2_IP
```

### 3. Run Setup Script
```bash
# Upload setup-ec2.sh to EC2
chmod +x setup-ec2.sh
./setup-ec2.sh
```

### 4. Configure MySQL
```bash
sudo mysql_secure_installation

sudo mysql -u root -p
CREATE DATABASE csaeducation;
CREATE USER 'csauser'@'localhost' IDENTIFIED BY 'strong_password';
GRANT ALL PRIVILEGES ON csaeducation.* TO 'csauser'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 5. Clone & Setup Application
```bash
cd /var/www
git clone YOUR_REPO_URL csaeducation
cd csaeducation

cp .env.example .env
nano .env  # Update DB credentials

composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --seed
php artisan make:filament-user

sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 6. Configure Nginx
```bash
sudo cp nginx-config.conf /etc/nginx/sites-available/csaeducation
# Edit server_name in the file
sudo nano /etc/nginx/sites-available/csaeducation

sudo ln -s /etc/nginx/sites-available/csaeducation /etc/nginx/sites-enabled/
sudo rm /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl restart nginx
```

### 7. Setup GitHub Actions
```bash
# Generate SSH key on EC2
ssh-keygen -t rsa -b 4096
cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
cat ~/.ssh/id_rsa  # Copy this

# Add to GitHub Secrets:
# EC2_HOST: Your EC2 IP
# EC2_USERNAME: ubuntu
# EC2_SSH_KEY: Private key from above
```

### 8. Make Deploy Script Executable
```bash
cd /var/www/csaeducation
chmod +x deploy.sh
```

---

## Auto Deployment (Automatic)

### Push to GitHub
```bash
git add .
git commit -m "Update"
git push origin main
```

**GitHub Actions will automatically:**
1. Connect to EC2
2. Pull latest code
3. Install dependencies
4. Run migrations
5. Clear & cache
6. Restart services

---

## Manual Deployment

```bash
ssh -i your-key.pem ubuntu@YOUR_EC2_IP
cd /var/www/csaeducation
./deploy.sh
```

---

## Quick Commands

### Check Status
```bash
sudo systemctl status nginx
sudo systemctl status php8.3-fpm
sudo systemctl status mysql
```

### View Logs
```bash
tail -f storage/logs/laravel.log
sudo tail -f /var/log/nginx/error.log
```

### Restart Services
```bash
sudo systemctl restart nginx
sudo systemctl restart php8.3-fpm
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## SSL Certificate (Optional)

```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d yourdomain.com
```

---

## Troubleshooting

### 502 Bad Gateway
```bash
sudo systemctl restart php8.3-fpm
sudo systemctl restart nginx
```

### Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/csaeducation
sudo chmod -R 775 storage bootstrap/cache
```

### Database Issues
```bash
php artisan tinker
DB::connection()->getPdo();
```

---

## 🎉 Done!

Your website is now:
- ✅ Live on AWS EC2
- ✅ Auto-deploying from GitHub
- ✅ Production ready

**Access:** http://YOUR_EC2_IP
**Admin:** http://YOUR_EC2_IP/admin

---

**For detailed guide, see:** `AWS_DEPLOYMENT_GUIDE.md`
