# Dynamic Website Features

## Overview
Your website now has comprehensive dynamic content management through the admin panel.

## Features Implemented

### 1. Dynamic Banners (Home Page Slider)
**Location**: Home page top slider

**Features**:
- Upload unlimited banner images
- Set display order
- Add optional clickable links
- Toggle active/inactive status
- Built-in image editor

**Admin Panel**: Navigate to "Banners"

**Recommended Size**: 1920x780px

**Usage**:
1. Click "Banners" in admin panel
2. Click "Create" button
3. Upload banner image
4. Optionally add a link URL
5. Set display order (lower numbers appear first)
6. Toggle "Active" to show/hide
7. Save

---

### 2. Website Settings
**Location**: All pages (header, footer, meta tags)

**Features**:

#### General Settings
- Site name
- Site description (SEO)
- Main logo
- Footer logo
- Favicon

#### Contact Information
- Email address
- Phone number
- Full address (street, city, state, country, postal code)

#### Social Media
- Facebook
- Twitter
- LinkedIn
- Instagram
- YouTube

#### Theme Colors
- Primary color (buttons, links, accents)
- Secondary color (headers, dark sections)
- Accent color (highlights)

#### Footer Content
- Footer description text
- Custom copyright text

**Admin Panel**: Navigate to "Website Settings"

**Usage**:
1. Click "Website Settings" in admin panel
2. Navigate through tabs:
   - General: Site info and logos
   - Contact: Contact details
   - Social Media: Social links
   - Theme: Brand colors
   - Footer: Footer content
3. Make changes
4. Click "Save"

---

## Where Dynamic Content Appears

### Banners
- ✅ Home page slider (automatic rotation)

### Site Name
- ✅ Browser title
- ✅ Meta tags
- ✅ Header logo alt text
- ✅ Footer copyright

### Logos
- ✅ Header navigation
- ✅ Footer
- ✅ Browser favicon

### Contact Details
- ✅ Header top bar (email, location)
- ✅ Footer contact section
- ✅ Meta tags

### Social Media
- ✅ Header top bar
- ✅ Footer (when configured)

### Theme Colors
- ✅ Buttons
- ✅ Links
- ✅ Backgrounds
- ✅ Accents
- ✅ Headers

### Footer Content
- ✅ Footer description
- ✅ Copyright text

---

## Quick Start Guide

### Initial Setup
```bash
# Run this script (Windows)
setup-settings.bat

# Or manually:
composer dump-autoload
php artisan migrate
php artisan storage:link
php artisan db:seed --class=SettingSeeder
php artisan cache:clear
```

### Add Your First Banner
1. Login to `/admin`
2. Click "Banners"
3. Click "Create"
4. Upload image (1920x780px recommended)
5. Set order to 1
6. Save

### Customize Your Site
1. Login to `/admin`
2. Click "Website Settings"
3. Update each tab:
   - Upload your logos
   - Add contact details
   - Set social media links
   - Choose brand colors
   - Customize footer text
4. Save changes

---

## Best Practices

### Banners
- Use high-quality images (1920x780px)
- Keep file size under 500KB for fast loading
- Use consistent style across banners
- Test on mobile devices
- Limit to 4-6 active banners

### Logos
- Main logo: 200x60px (transparent background)
- Footer logo: 200x60px (light version for dark background)
- Favicon: 32x32px or 64x64px

### Colors
- Choose colors with good contrast
- Test readability on different backgrounds
- Use color picker for exact brand colors
- Preview changes before saving

### Contact Information
- Keep information current
- Use full phone numbers with country code
- Provide complete address
- Test email links

### Social Media
- Use full URLs (https://facebook.com/yourpage)
- Verify links work before saving
- Only add active social accounts
- Update regularly

---

## Advanced Usage

### Using Settings in Code

```php
// In controllers
$siteName = settings('site_name');
$email = settings('email');

// In blade templates
{{ settings('site_name') }}
{{ settings('primary_color') }}

// With default values
{{ settings('phone', 'Not available') }}

// Conditional display
@if(settings('facebook_url'))
    <a href="{{ settings('facebook_url') }}">Facebook</a>
@endif
```

### Custom CSS with Dynamic Colors

```css
.custom-button {
    background-color: var(--primary-color);
    color: white;
}

.custom-header {
    background-color: var(--secondary-color);
}
```

---

## Maintenance

### Clear Cache
When settings don't update immediately:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Backup Settings
Export settings from database:
```bash
php artisan db:seed --class=SettingSeeder
```

### Update Images
1. Go to admin panel
2. Click on image field
3. Upload new image
4. Old image is automatically replaced

---

## Troubleshooting

### Banners Not Showing
- Check if banners are marked as "Active"
- Verify images uploaded successfully
- Clear browser cache
- Check display order

### Settings Not Updating
- Clear application cache
- Check database connection
- Verify changes were saved
- Refresh browser

### Images Not Loading
- Run: `php artisan storage:link`
- Check file permissions
- Verify storage folder exists
- Check image paths in database

### Colors Not Applying
- Clear browser cache
- Check CSS inspector
- Verify hex color format
- Refresh page

---

## Support Resources

- **Settings Guide**: See `SETTINGS_GUIDE.md`
- **Laravel Docs**: https://laravel.com/docs
- **Filament Docs**: https://filamentphp.com/docs

---

## Future Enhancements

Potential additions:
- Multiple language support
- SEO meta tags per page
- Google Analytics integration
- Custom CSS editor
- Email template customization
- Advanced theme options
