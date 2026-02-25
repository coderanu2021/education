# Quick Start Guide - CSA Education Website

## 🚀 Initial Setup (First Time Only)

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Configure Environment
```bash
copy .env.example .env
php artisan key:generate
```

Edit `.env` file with your database credentials:
```
DB_DATABASE=education
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Setup Database & Admin
```bash
# Run this script (Windows)
setup-admin.bat

# Or manually:
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### 4. Login to Admin Panel
- URL: `http://localhost:8000/admin`
- Email: `admin@admin.com`
- Password: `password`

**⚠️ Change password immediately after first login!**

---

## 📋 Admin Credentials

### Default Admin (from seeder)
```
Email: admin@admin.com
Password: password
```

### Create Custom Admin
```bash
php artisan admin:create
```

---

## 🎨 Configure Your Website

### 1. Website Settings
1. Login to `/admin`
2. Click "Website Settings"
3. Configure:
   - **General**: Site name, logos, favicon
   - **Contact**: Email, phone, address
   - **Social Media**: Facebook, Twitter, etc.
   - **Theme**: Brand colors
   - **Footer**: Footer text, copyright

### 2. Add Banners
1. Click "Banners" in admin panel
2. Click "Create"
3. Upload banner image (1920x780px)
4. Set display order
5. Save

### 3. Manage Courses
1. Click "Courses"
2. Add/Edit/Delete courses
3. Upload course images
4. Set pricing and details

---

## 🛠️ Common Commands

### Development
```bash
# Start development server
php artisan serve

# Watch for file changes
npm run dev
```

### Admin Management
```bash
# Create admin user
php artisan admin:create

# Create with options
php artisan admin:create --name="Admin" --email="admin@example.com" --password="SecurePass123"
```

### Database
```bash
# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Fresh migration (WARNING: deletes all data)
php artisan migrate:fresh --seed
```

### Cache
```bash
# Clear all cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Or clear everything at once
php artisan optimize:clear
```

---

## 📁 Project Structure

```
education/
├── app/
│   ├── Filament/Resources/     # Admin panel resources
│   │   ├── Banners/           # Banner management
│   │   ├── Certificates/      # Certificate management
│   │   ├── Contacts/          # Contact management
│   │   ├── Courses/           # Course management
│   │   ├── Settings/          # Website settings
│   │   └── Students/          # Student management
│   ├── Http/Controllers/      # Frontend controllers
│   ├── Models/                # Database models
│   └── Helpers/               # Helper functions
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── public/                    # Public assets
│   ├── css/                   # Stylesheets
│   ├── js/                    # JavaScript files
│   └── images/                # Static images
├── resources/
│   └── views/                 # Blade templates
│       ├── layouts/           # Layout files
│       ├── courses/           # Course pages
│       ├── students/          # Student pages
│       └── certificates/      # Certificate pages
└── storage/
    └── app/public/            # Uploaded files
```

---

## 🌐 URLs

### Frontend
- Home: `http://localhost:8000/`
- Courses: `http://localhost:8000/courses`
- About: `http://localhost:8000/about`
- Contact: `http://localhost:8000/contact`
- Register: `http://localhost:8000/students/register`
- Verify Certificate: `http://localhost:8000/verify-certificate`

### Admin Panel
- Login: `http://localhost:8000/admin`
- Dashboard: `http://localhost:8000/admin/dashboard`

---

## 🎯 Dynamic Features

### What You Can Manage from Admin Panel:

#### 1. Banners
- Upload slider images
- Set display order
- Add clickable links
- Toggle active/inactive

#### 2. Website Settings
- Site name & description
- Logos (header, footer, favicon)
- Contact information
- Social media links
- Theme colors
- Footer content

#### 3. Courses
- Add/edit/delete courses
- Upload course images
- Set pricing
- Manage course details

#### 4. Students
- View student registrations
- Manage student records
- Export student data

#### 5. Certificates
- Generate certificates
- Verify certificates
- Download PDFs

#### 6. Contacts
- View contact submissions
- Manage inquiries

---

## 🔧 Troubleshooting

### Can't Login to Admin
```bash
# Reset admin password
php artisan tinker
$user = \App\Models\User::where('email', 'admin@admin.com')->first();
$user->password = bcrypt('newpassword');
$user->save();
exit
```

### Images Not Showing
```bash
php artisan storage:link
```

### Settings Not Updating
```bash
php artisan cache:clear
php artisan config:clear
```

### Database Connection Error
1. Check `.env` file
2. Verify database exists
3. Check MySQL is running (WAMP/XAMPP)

### 404 Error on Admin Panel
```bash
php artisan route:clear
php artisan config:clear
composer dump-autoload
```

---

## 📚 Documentation

- **Admin Setup**: See `ADMIN_SETUP.md`
- **Settings Guide**: See `SETTINGS_GUIDE.md`
- **Dynamic Features**: See `DYNAMIC_FEATURES.md`

---

## 🔐 Security Checklist

Before going live:

- [ ] Change default admin password
- [ ] Update `.env` with production settings
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Enable HTTPS/SSL
- [ ] Set strong database password
- [ ] Remove test/demo data
- [ ] Configure backup system
- [ ] Set up error monitoring

---

## 📞 Support

Need help?
1. Check documentation files
2. Review Laravel logs: `storage/logs/laravel.log`
3. Clear cache and try again
4. Check Laravel docs: https://laravel.com/docs
5. Check Filament docs: https://filamentphp.com/docs

---

## 🎉 You're Ready!

Your website is now fully dynamic and manageable from the admin panel. No more hardcoded content!

**Next Steps:**
1. Login to admin panel
2. Configure website settings
3. Upload your banners
4. Add your courses
5. Customize colors and branding
6. Test everything
7. Go live!

Good luck! 🚀
