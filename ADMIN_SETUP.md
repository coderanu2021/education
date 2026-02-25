# Admin Panel Setup Guide

## Default Admin Credentials

After running the database seeder, you can login with:

```
Email: admin@admin.com
Password: password
```

**⚠️ IMPORTANT: Change this password immediately after first login!**

---

## Method 1: Using Database Seeder (Recommended for First Setup)

### Step 1: Run Migrations
```bash
php artisan migrate
```

### Step 2: Seed Database (includes admin user)
```bash
php artisan db:seed
```

This will create:
- Admin user (admin@admin.com / password)
- Sample courses
- Default settings (if you run SettingSeeder)

### Step 3: Login
1. Go to: `http://yourdomain.com/admin`
2. Email: `admin@admin.com`
3. Password: `password`

---

## Method 2: Create Custom Admin User (Interactive)

Use the custom artisan command to create a new admin user:

```bash
php artisan admin:create
```

You'll be prompted to enter:
- Admin name
- Email address
- Password (minimum 8 characters)

### Example:
```bash
php artisan admin:create

Creating Admin User...

Enter admin name [Admin]: John Doe
Enter admin email [admin@csaeducation.in]: john@csaeducation.in
Enter admin password (min 8 characters): ********

✓ Admin user created successfully!

┌──────────┬──────────────────────────┐
│ Field    │ Value                    │
├──────────┼──────────────────────────┤
│ Name     │ John Doe                 │
│ Email    │ john@csaeducation.in     │
│ Password │ ********                 │
└──────────┴──────────────────────────┘

You can now login at: http://yourdomain.com/admin
Please keep these credentials safe!
```

---

## Method 3: Create Admin User (Non-Interactive)

Create admin user with command-line options:

```bash
php artisan admin:create --name="Admin User" --email="admin@example.com" --password="SecurePass123"
```

---

## Method 4: Create Admin User Manually

### Using Tinker:
```bash
php artisan tinker
```

Then run:
```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@csaeducation.in',
    'password' => bcrypt('your-secure-password'),
    'email_verified_at' => now(),
]);
```

Press `Ctrl+C` to exit tinker.

---

## Accessing Admin Panel

### URL
```
http://yourdomain.com/admin
```

Or for local development:
```
http://localhost:8000/admin
http://127.0.0.1:8000/admin
```

### Login Page
1. Navigate to `/admin`
2. Enter your email
3. Enter your password
4. Click "Sign in"

---

## Change Password After First Login

### Method 1: Through Filament Profile
1. Login to admin panel
2. Click your name in top-right corner
3. Click "Profile"
4. Update password
5. Save changes

### Method 2: Using Tinker
```bash
php artisan tinker
```

```php
$user = \App\Models\User::where('email', 'admin@admin.com')->first();
$user->password = bcrypt('new-secure-password');
$user->save();
```

### Method 3: Using Command
```bash
php artisan admin:create --email="admin@admin.com" --password="NewPassword123" --name="Admin"
```
(This will update existing user if email exists)

---

## Create Multiple Admin Users

You can create multiple admin users for different team members:

```bash
# First admin
php artisan admin:create --name="John Doe" --email="john@csaeducation.in" --password="SecurePass1"

# Second admin
php artisan admin:create --name="Jane Smith" --email="jane@csaeducation.in" --password="SecurePass2"

# Third admin
php artisan admin:create --name="Bob Wilson" --email="bob@csaeducation.in" --password="SecurePass3"
```

---

## Quick Setup Script

Create a file `setup-admin.bat` (Windows) or `setup-admin.sh` (Linux/Mac):

### Windows (setup-admin.bat):
```batch
@echo off
echo ========================================
echo Admin Panel Setup
echo ========================================
echo.

echo Running migrations...
call php artisan migrate
echo.

echo Seeding database...
call php artisan db:seed
echo.

echo Creating storage link...
call php artisan storage:link
echo.

echo Clearing cache...
call php artisan cache:clear
call php artisan config:clear
echo.

echo ========================================
echo Setup Complete!
echo ========================================
echo.
echo Default Admin Credentials:
echo Email: admin@admin.com
echo Password: password
echo.
echo Admin Panel: http://localhost:8000/admin
echo.
echo IMPORTANT: Change password after first login!
echo.
pause
```

### Linux/Mac (setup-admin.sh):
```bash
#!/bin/bash
echo "========================================"
echo "Admin Panel Setup"
echo "========================================"
echo ""

echo "Running migrations..."
php artisan migrate
echo ""

echo "Seeding database..."
php artisan db:seed
echo ""

echo "Creating storage link..."
php artisan storage:link
echo ""

echo "Clearing cache..."
php artisan cache:clear
php artisan config:clear
echo ""

echo "========================================"
echo "Setup Complete!"
echo "========================================"
echo ""
echo "Default Admin Credentials:"
echo "Email: admin@admin.com"
echo "Password: password"
echo ""
echo "Admin Panel: http://localhost:8000/admin"
echo ""
echo "IMPORTANT: Change password after first login!"
echo ""
```

Make it executable:
```bash
chmod +x setup-admin.sh
./setup-admin.sh
```

---

## Troubleshooting

### Can't Login - "Invalid Credentials"
1. Verify email and password are correct
2. Check if user exists in database:
   ```bash
   php artisan tinker
   \App\Models\User::where('email', 'admin@admin.com')->first();
   ```
3. Reset password using tinker (see above)

### Admin Panel Shows 404
1. Clear cache: `php artisan cache:clear`
2. Clear config: `php artisan config:clear`
3. Check if Filament is installed: `composer show filament/filament`

### Forgot Password
1. Use tinker to reset (see "Change Password" section)
2. Or create new admin user with different email

### Email Already Exists
If you get "email already exists" error:
1. Use different email address
2. Or update existing user's password using tinker

---

## Security Best Practices

### 1. Strong Passwords
- Minimum 12 characters
- Mix of uppercase, lowercase, numbers, symbols
- Don't use common words or patterns

### 2. Change Default Credentials
- Never use default credentials in production
- Change immediately after first login

### 3. Limit Admin Access
- Only create admin accounts for trusted users
- Remove admin access when no longer needed

### 4. Regular Updates
- Keep Laravel and Filament updated
- Run `composer update` regularly

### 5. Enable Two-Factor Authentication (Optional)
Consider adding 2FA package for extra security:
```bash
composer require filament/spatie-laravel-settings-plugin
```

---

## Admin Panel Features

Once logged in, you can manage:

### Content Management
- ✅ Banners (home page slider)
- ✅ Courses
- ✅ Students
- ✅ Certificates
- ✅ Contacts

### Settings
- ✅ Website Settings (logos, colors, contact info)
- ✅ Social Media Links
- ✅ Theme Customization

### User Management
- ✅ View all users
- ✅ Create new users
- ✅ Edit user details
- ✅ Delete users

---

## Need Help?

### Check Logs
```bash
tail -f storage/logs/laravel.log
```

### Clear Everything
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Reinstall Admin
```bash
composer require filament/filament
php artisan filament:install --panels
```

---

## Quick Reference

| Command | Description |
|---------|-------------|
| `php artisan admin:create` | Create new admin user (interactive) |
| `php artisan db:seed` | Seed database with default admin |
| `php artisan tinker` | Open Laravel console |
| `php artisan migrate` | Run database migrations |
| `php artisan cache:clear` | Clear application cache |

---

## Production Deployment

Before deploying to production:

1. ✅ Change all default passwords
2. ✅ Use strong, unique passwords
3. ✅ Set up SSL certificate (HTTPS)
4. ✅ Configure `.env` properly
5. ✅ Set `APP_ENV=production`
6. ✅ Set `APP_DEBUG=false`
7. ✅ Run `php artisan config:cache`
8. ✅ Run `php artisan route:cache`
9. ✅ Run `php artisan view:cache`

---

## Support

For issues or questions:
- Laravel Docs: https://laravel.com/docs
- Filament Docs: https://filamentphp.com/docs
- Check logs: `storage/logs/laravel.log`
