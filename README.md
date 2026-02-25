# CSA Education - Computer Education & IT Training Center

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.3-blue)
![Filament](https://img.shields.io/badge/Filament-5.x-orange)

Complete education website for CSA Education Bhawanigarh with student registration, certificate verification, and admin management.

---

## 🚀 Features

### Public Features
- 📚 Course Catalog with Dynamic Management
- 📝 Student Registration System
- 🎓 Certificate Verification & Generation
- 📞 Contact Form
- 💬 Testimonials
- 🎨 **Dynamic Banners** - Manage slider images from admin
- ⚙️ **Dynamic Settings** - Control everything from admin panel
- 📱 Responsive Design

### Admin Features
- 👥 Student Management
- 🎓 Certificate Management & PDF Generation
- 📚 Course Management
- 🖼️ **Banner Management** - Upload/manage home page sliders
- ⚙️ **Website Settings** - Logos, colors, contact info, social media
- 📊 Dashboard & Analytics
- 🔍 Search & Filters
- ⚡ Bulk Actions

### Dynamic Content Management
- 🎨 **Theme Colors** - Change brand colors instantly
- 🏢 **Contact Details** - Update email, phone, address
- 🔗 **Social Media** - Manage all social links
- 🖼️ **Logos** - Upload header, footer, and favicon
- 📝 **Footer Content** - Customize footer text and copyright

---

## 🎨 Branding

**CSA Education Bhawanigarh**
- Primary Color: #1db6c5 (Teal)
- Logo: Custom CSA Education logo
- Theme: Professional IT Training

---

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- MySQL/MariaDB
- Composer
- Node.js & NPM

### Installation

```bash
# 1. Clone repository
git clone <repository-url>
cd education

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
copy .env.example .env
php artisan key:generate

# 4. Configure database in .env
DB_DATABASE=education
DB_USERNAME=root
DB_PASSWORD=

# 5. Run setup script (Windows)
setup-admin.bat

# Or manually:
php artisan migrate
php artisan db:seed
php artisan storage:link

# 6. Start development server
php artisan serve
```

### 🔐 Admin Login

**Default Credentials:**
```
URL: http://localhost:8000/admin
Email: admin@admin.com
Password: password
```

**⚠️ IMPORTANT: Change password after first login!**

**Create Custom Admin:**
```bash
php artisan admin:create
```

### 📚 Documentation
- **Quick Start:** `QUICK_START.md` - Get started in 5 minutes
- **Admin Setup:** `ADMIN_SETUP.md` - Admin user management
- **Settings Guide:** `SETTINGS_GUIDE.md` - Website settings
- **Dynamic Features:** `DYNAMIC_FEATURES.md` - Content management
- **Complete Guide:** `CSA_EDUCATION_GUIDE.md` - Full documentation
- **AWS Deployment:** `AWS_DEPLOYMENT_GUIDE.md` - Production deployment

### AWS EC2 Deployment

**Quick Setup:**
```bash
# See DEPLOYMENT_QUICK_START.md for step-by-step guide
```

**Auto Deployment:**
- Push to `main` branch
- GitHub Actions automatically deploys to EC2
- See `AWS_DEPLOYMENT_GUIDE.md` for complete setup

**Files:**
- `.github/workflows/deploy.yml` - GitHub Actions workflow
- `deploy.sh` - Deployment script
- `setup-ec2.sh` - EC2 initial setup
- `nginx-config.conf` - Nginx configuration template

---

## 🌐 URLs

### Public
- Homepage: `/`
- Courses: `/courses`
- Register: `/register`
- Verify Certificate: `/verify-certificate`
- Contact: `/contact`

### Admin
- Dashboard: `/admin`
- Students: `/admin/students`
- Certificates: `/admin/certificates`

---

## 📚 Courses

1. Account Education - ₹8,000
2. Computer Classes - ₹5,000
3. Distance Education - ₹15,000
4. English Speaking - ₹6,000
5. Graphic Design - ₹12,000
6. Python Programming - ₹18,000
7. Digital Marketing - ₹10,000
8. Data Entry & Typing - ₹4,000

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12.x
- **Admin Panel:** Filament 5.x
- **Database:** MySQL
- **Frontend:** Bootstrap 5, jQuery
- **Icons:** Font Awesome 4.7.0

---

## 📖 Documentation

- **README:** This file
- **Complete Guide:** `CSA_EDUCATION_GUIDE.md`
- **Registration System:** `STUDENT_REGISTRATION_GUIDE.md`
- **AWS Deployment:** `AWS_DEPLOYMENT_GUIDE.md`
- **Quick Deploy:** `DEPLOYMENT_QUICK_START.md`

---

## 🔧 Commands

### Admin Management
```bash
# Create admin user (interactive)
php artisan admin:create

# Create admin with options
php artisan admin:create --name="Admin" --email="admin@example.com" --password="SecurePass123"
```

### Database
```bash
# Run migrations
php artisan migrate

# Seed database (includes admin user)
php artisan db:seed

# Seed specific seeder
php artisan db:seed --class=CourseSeeder
php artisan db:seed --class=SettingSeeder
```

### Cache Management
```bash
# Clear all cache
php artisan optimize:clear

# Individual cache clear
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Development
```bash
# Start server
php artisan serve

# Watch assets
npm run dev

# Build for production
npm run build
```

### Utilities
```bash
# Create storage link
php artisan storage:link

# View routes
php artisan route:list

# Open tinker console
php artisan tinker
```

---

## 📞 Contact

**CSA Education Bhawanigarh**
- Email: info@csaeducation.in
- Location: Bhawanigarh, Punjab, India

---

## 📄 License

This project is proprietary software for CSA Education.

---

## 🎉 Status

✅ **Complete and Ready to Launch**

- CSA Education branded
- All features working
- Responsive design
- Admin panel configured
- Documentation complete

---

**Developed with ❤️ for CSA Education Bhawanigarh**
