# CSA Education - Computer Education & IT Training Center

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.3-blue)
![Filament](https://img.shields.io/badge/Filament-5.x-orange)

Complete education website for CSA Education Bhawanigarh with student registration, certificate verification, and admin management.

---

## 🚀 Features

### Public Features
- 📚 Course Catalog (8 courses)
- 📝 Student Registration System
- 🎓 Certificate Verification
- 📞 Contact Form
- 💬 Testimonials
- 📱 Responsive Design

### Admin Features
- 👥 Student Management
- 🎓 Certificate Management
- 📚 Course Management
- 📊 Dashboard & Analytics
- 🔍 Search & Filters
- ⚡ Bulk Actions

---

## 🎨 Branding

**CSA Education Bhawanigarh**
- Primary Color: #1db6c5 (Teal)
- Logo: Custom CSA Education logo
- Theme: Professional IT Training

---

## 🚀 Quick Start

### Local Development

```bash
# Clone repository
git clone <repository-url>

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env
DB_DATABASE=education
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# Seed courses
php artisan db:seed --class=CourseSeeder

# Create admin user
php artisan make:filament-user

# Start server
php artisan serve
```

Visit: `http://localhost:8000`

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

```bash
# Clear cache
php artisan optimize:clear

# View routes
php artisan route:list

# Create admin
php artisan make:filament-user

# Seed courses
php artisan db:seed --class=CourseSeeder
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
