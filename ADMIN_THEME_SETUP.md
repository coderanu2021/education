# Admin Theme Setup Guide

This guide explains how to set up and customize the modern admin panel theme for CSA Education.

## Theme Features

The admin panel includes:
- CSA teal color scheme (#1db6c5)
- Modern gradient sidebar with dark navy background
- Smooth animations and transitions
- Rounded cards with hover effects
- Custom scrollbar styling
- Responsive design
- Light mode by default
- Collapsible sidebar
- Database notifications

## Quick Setup (3 Steps)

### 1. Install Node.js

Download and install Node.js from: https://nodejs.org/
- Choose the LTS (Long Term Support) version
- Restart your terminal after installation

### 2. Build the Theme

Open terminal in project directory and run:

```bash
npm install
npm run build
```

### 3. Clear Cache

```bash
php artisan optimize:clear
php artisan filament:cache-components
```

That's it! Visit `http://your-domain.com/admin` to see the modern theme.

## Theme Preview

The admin panel now features:

### Sidebar
- Dark gradient background (#001848 to #002855)
- Teal hover effects (#1db6c5)
- Smooth slide animations
- Collapsible with hamburger menu
- CSA logo at top

### Components
- Rounded cards with subtle shadows
- Hover animations (lift effect)
- Teal primary buttons with gradient
- Modern table styling
- Custom scrollbar (teal)
- Smooth page transitions

### Navigation Groups
- Content Management (Courses, Certificates, Banners)
- User Management (Students, Contacts)
- Settings

## Customization

### Change Colors

Edit `resources/css/filament/admin/theme.css`:

```css
:root {
    --csa-primary: #1db6c5;        /* Main teal color */
    --csa-primary-dark: #0d9aa8;   /* Darker teal */
    --csa-accent: #001848;         /* Navy blue */
}
```

After changes, rebuild:
```bash
npm run build
php artisan optimize:clear
```

### Change Logo

Edit `app/Providers/Filament/AdminPanelProvider.php`:

```php
->brandLogo(asset('images/your-logo.svg'))
->darkModeBrandLogo(asset('images/your-dark-logo.svg'))
```

### Enable Dark Mode

In `AdminPanelProvider.php`, change:

```php
->defaultThemeMode(ThemeMode::Dark)
```

## Development Mode

For live CSS updates during development:

Terminal 1:
```bash
npm run dev
```

Terminal 2:
```bash
php artisan serve
```

Visit: http://localhost:8000/admin

## Troubleshooting

### Theme Not Showing

1. Check Node.js is installed:
```bash
node --version
npm --version
```

2. Rebuild assets:
```bash
npm install
npm run build
```

3. Clear all caches:
```bash
php artisan optimize:clear
php artisan filament:cache-components
php artisan config:clear
php artisan view:clear
```

4. Hard refresh browser: `Ctrl + Shift + R` (Windows) or `Cmd + Shift + R` (Mac)

### CSS Not Loading

Check if build file exists:
```
public/css/filament/filament/app.css
```

If missing, run:
```bash
npm run build
```

### Build Errors

If you get Vite or npm errors:

1. Delete node_modules and package-lock.json:
```bash
rmdir /s /q node_modules
del package-lock.json
```

2. Reinstall:
```bash
npm install
npm run build
```

### Permission Errors

On Windows, run terminal as Administrator.

On Linux/Mac:
```bash
sudo chown -R $USER:$USER node_modules
```

## File Structure

```
resources/css/filament/admin/
  └── theme.css                 # Custom admin theme CSS

app/Providers/Filament/
  └── AdminPanelProvider.php    # Panel configuration & colors

tailwind.config.js              # Tailwind config
package.json                    # Node dependencies
vite.config.js                  # Build configuration

public/css/filament/            # Built CSS files (generated)
```

## Admin Panel Features

### Dashboard
- Welcome widget
- Account widget
- Database notifications (polls every 30s)

### Resources
- Courses management
- Certificates management
- Students management
- Contacts management
- Banners management
- Settings management

### Features
- SPA mode (faster navigation)
- Collapsible sidebar
- Global search
- Bulk actions
- Export functionality
- Responsive design

## Production Deployment

Before deploying to production:

1. Build optimized assets:
```bash
npm run build
```

2. Optimize Laravel:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan filament:cache-components
```

3. Set proper permissions:
```bash
chmod -R 755 storage bootstrap/cache
```

4. Ensure `.env` has:
```
APP_ENV=production
APP_DEBUG=false
```

## Additional Resources

- Filament Docs: https://filamentphp.com/docs
- Tailwind CSS: https://tailwindcss.com/docs
- Vite Guide: https://vitejs.dev/guide/
- Node.js: https://nodejs.org/

## Support

For issues:
1. Check the troubleshooting section above
2. Review Laravel logs: `storage/logs/laravel.log`
3. Check browser console for JavaScript errors
4. Verify all dependencies are installed
