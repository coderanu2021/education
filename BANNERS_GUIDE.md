# Banners Guide

## Dummy Banners Created

I've created 3 dummy banner images with CSA Education branding:

### Banner 1
- **Location**: `public/uploads/banners/banner1.svg`
- **Content**: "Welcome to CSA Education"
- **Colors**: Teal to Navy gradient
- **Link**: None
- **Status**: Active

### Banner 2
- **Location**: `public/uploads/banners/banner2.svg`
- **Content**: "Explore Our Courses"
- **Colors**: Navy to Teal gradient
- **Link**: /courses
- **Status**: Active

### Banner 3
- **Location**: `public/uploads/banners/banner3.svg`
- **Content**: "Register Today!"
- **Colors**: Teal-Navy-Teal gradient
- **Link**: /contact
- **Status**: Active

## How to Manage Banners

### Via Admin Panel

1. Login to admin panel: `http://localhost:8000/admin`
2. Go to "Banners" in the sidebar
3. You can:
   - View all banners
   - Edit banner details
   - Upload new banner images
   - Change display order
   - Toggle active/inactive status
   - Add/remove links

### Upload New Banners

1. Go to Admin Panel > Banners > Create
2. Upload image (recommended size: 1920x780px)
3. Add optional link URL
4. Set display order (lower numbers appear first)
5. Toggle active status
6. Save

### Banner Display

Banners are displayed on the homepage in a slider/carousel. Only active banners are shown, ordered by the "order" field.

## File Locations

- **Upload Directory**: `public/uploads/banners/`
- **Database Table**: `banners`
- **Model**: `app/Models/Banner.php`
- **Admin Resource**: `app/Filament/Resources/Banners/`
- **Seeder**: `database/seeders/BannerSeeder.php`

## Replace Dummy Images

To replace the dummy SVG images with real photos:

1. Prepare your images (JPG/PNG, 1920x780px recommended)
2. Upload via Admin Panel, or
3. Place files in `public/uploads/banners/`
4. Update database records with new filenames

## Gallery Feature

Currently, there is no separate gallery feature. If you need a gallery:

1. You can use the Banners feature as a gallery
2. Or I can create a separate Gallery resource with its own model and admin panel

Let me know if you need a dedicated gallery feature!
