# Website Settings Management Guide

## Overview
Your website now has a comprehensive settings management system that allows you to control all aspects of your site from the admin panel.

## Setup Instructions

### 1. Install Dependencies
```bash
composer dump-autoload
```

### 2. Run Migrations
```bash
php artisan migrate
```

### 3. Seed Default Settings (Optional)
```bash
php artisan db:seed --class=SettingSeeder
```

## Features

### 1. General Settings
- **Site Name**: Your website name (appears in title, meta tags)
- **Site Description**: SEO description for search engines
- **Main Logo**: Header logo (recommended: 200x60px)
- **Footer Logo**: Footer logo (recommended: 200x60px)
- **Favicon**: Browser tab icon (recommended: 32x32px or 64x64px)

### 2. Contact Information
- Email Address
- Phone Number
- Street Address
- City
- State/Province
- Country
- Postal Code

All contact details automatically appear in:
- Header top bar
- Footer contact section
- Contact page

### 3. Social Media Links
- Facebook
- Twitter
- LinkedIn
- Instagram
- YouTube

Social icons automatically appear in:
- Header top bar
- Footer (if configured)

### 4. Theme Colors
- **Primary Color**: Main brand color (buttons, links, accents)
- **Secondary Color**: Secondary brand color (headers, dark sections)
- **Accent Color**: Optional highlight color

Colors are applied automatically throughout the site using CSS variables.

### 5. Footer Content
- **Footer Description**: Text displayed in footer
- **Copyright Text**: Custom copyright message

## How to Use

### Access Settings
1. Login to admin panel at `/admin`
2. Click "Website Settings" in the navigation
3. Edit settings in organized tabs:
   - General
   - Contact
   - Social Media
   - Theme
   - Footer

### Upload Images
1. Click on image upload fields
2. Select image from your computer
3. Use built-in image editor to crop/resize
4. Save changes

### Change Colors
1. Go to "Theme" tab
2. Click on color picker
3. Select your brand colors
4. Save changes
5. Colors apply instantly across the site

### Update Contact Details
1. Go to "Contact" tab
2. Fill in your contact information
3. Save changes
4. Details appear automatically in header and footer

### Add Social Media Links
1. Go to "Social Media" tab
2. Enter full URLs (e.g., https://facebook.com/yourpage)
3. Save changes
4. Icons appear automatically with links

## Helper Function

Use the `settings()` helper function anywhere in your code:

```php
// Get all settings
$settings = settings();

// Get specific setting
$siteName = settings('site_name');

// Get with default value
$email = settings('email', 'default@example.com');
```

## In Blade Templates

```blade
{{ settings('site_name') }}
{{ settings('email') }}
{{ settings('phone') }}

@if(settings('facebook_url'))
    <a href="{{ settings('facebook_url') }}">Facebook</a>
@endif
```

## Cache Management

Settings are automatically cached for performance. The cache is cleared when you save changes in the admin panel.

To manually clear cache:
```bash
php artisan cache:clear
```

## Customization

### Add New Settings
1. Add column to migration: `database/migrations/*_create_settings_table.php`
2. Add to fillable array in: `app/Models/Setting.php`
3. Add form field in: `app/Filament/Resources/Settings/Schemas/SettingForm.php`
4. Run migration: `php artisan migrate`

### Modify Theme Colors
Edit the CSS in `resources/views/layouts/app.blade.php` to apply colors to different elements.

## Tips

1. **Image Sizes**: Use recommended sizes for best results
2. **Colors**: Choose colors that provide good contrast
3. **Contact Info**: Keep information up-to-date
4. **Social Media**: Use full URLs including https://
5. **Testing**: Test changes on different devices

## Troubleshooting

### Settings Not Appearing
- Clear cache: `php artisan cache:clear`
- Check database connection
- Verify migration ran successfully

### Images Not Showing
- Check storage link: `php artisan storage:link`
- Verify file permissions
- Check image paths in database

### Colors Not Applying
- Clear browser cache
- Check CSS in browser inspector
- Verify color values are valid hex codes

## Support

For issues or questions, check:
- Laravel documentation: https://laravel.com/docs
- Filament documentation: https://filamentphp.com/docs
