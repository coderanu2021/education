# Gallery Management Guide

## Gallery Page

The gallery page is now live at: `http://localhost:8000/gallery`

## Features

- ✅ Responsive grid layout
- ✅ Lightbox for full-size images
- ✅ Hover effects with title and description
- ✅ Dynamic content from database
- ✅ Footer link added

## How to Add Gallery Images

### Method 1: Using Database Directly

1. Place your images in `public/uploads/gallery/`
2. Run this command to add an image:

```bash
php artisan tinker
```

Then run:
```php
App\Models\Gallery::create([
    'title' => 'Your Image Title',
    'description' => 'Your image description',
    'image' => 'uploads/gallery/your-image.jpg',
    'order' => 1,
    'is_active' => true
]);
```

### Method 2: Using Seeder (Bulk Upload)

1. Place multiple images in `public/uploads/gallery/`
2. Edit `database/seeders/GallerySeeder.php`
3. Add your images to the array
4. Run: `php artisan db:seed --class=GallerySeeder`

### Method 3: Direct Database Insert

Run SQL in your database:

```sql
INSERT INTO galleries (title, description, image, `order`, is_active, created_at, updated_at) 
VALUES ('Image Title', 'Description', 'uploads/gallery/image.jpg', 1, 1, NOW(), NOW());
```

## Current Gallery Images

The gallery currently has 6 sample images from Unsplash. You can:

1. **Keep them** - They work fine as placeholders
2. **Replace them** - Update the `image` field in database with your local images
3. **Delete them** - Run: `php artisan tinker` then `App\Models\Gallery::truncate();`

## Image Specifications

- **Recommended Size**: 800x600 pixels
- **Format**: JPG, PNG
- **Location**: `public/uploads/gallery/`
- **Max Size**: Keep under 2MB for fast loading

## Managing Gallery

### View All Images
```bash
php artisan tinker
App\Models\Gallery::all();
```

### Add New Image
```bash
php artisan tinker
App\Models\Gallery::create(['title' => 'New Image', 'description' => 'Description', 'image' => 'uploads/gallery/new.jpg', 'order' => 7, 'is_active' => true]);
```

### Update Image
```bash
php artisan tinker
$gallery = App\Models\Gallery::find(1);
$gallery->title = 'Updated Title';
$gallery->save();
```

### Delete Image
```bash
php artisan tinker
App\Models\Gallery::find(1)->delete();
```

### Toggle Active Status
```bash
php artisan tinker
$gallery = App\Models\Gallery::find(1);
$gallery->is_active = false;
$gallery->save();
```

## Quick Add Multiple Images

If you have images named 1.jpg, 2.jpg, 3.jpg in `public/uploads/gallery/`:

```bash
php artisan tinker
```

```php
for($i = 1; $i <= 6; $i++) {
    App\Models\Gallery::create([
        'title' => 'Gallery Image ' . $i,
        'description' => 'CSA Education Gallery',
        'image' => 'uploads/gallery/' . $i . '.jpg',
        'order' => $i,
        'is_active' => true
    ]);
}
```

## Troubleshooting

### Images Not Showing
1. Check image path is correct: `uploads/gallery/image.jpg`
2. Verify image exists in `public/uploads/gallery/`
3. Check `is_active` is set to `1` or `true`
4. Clear browser cache

### Lightbox Not Working
- Make sure jQuery is loaded
- Check browser console for errors
- Lightbox CDN should be accessible

## Database Structure

```
galleries table:
- id (auto increment)
- title (string)
- description (text, nullable)
- image (string) - path relative to public/
- order (integer) - display order
- is_active (boolean) - show/hide
- created_at
- updated_at
```

## Tips

1. Use descriptive titles for better SEO
2. Keep descriptions short (under 100 characters)
3. Use `order` field to control display sequence
4. Set `is_active` to false to hide without deleting
5. Optimize images before uploading for faster loading

## Example: Replace All Sample Images

```bash
# 1. Delete existing
php artisan tinker
App\Models\Gallery::truncate();

# 2. Add your images
App\Models\Gallery::insert([
    ['title' => 'My Image 1', 'description' => 'Description 1', 'image' => 'uploads/gallery/1.jpg', 'order' => 1, 'is_active' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'My Image 2', 'description' => 'Description 2', 'image' => 'uploads/gallery/2.jpg', 'order' => 2, 'is_active' => 1, 'created_at' => now(), 'updated_at' => now()],
]);
```

That's it! Your gallery is fully functional and dynamic.
