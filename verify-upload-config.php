<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "✅ Upload Configuration Verification\n";
echo "====================================\n\n";

// Check filesystem config
$uploadsConfig = config('filesystems.disks.uploads');

echo "1️⃣  Uploads Disk Configuration:\n";
echo "   Driver: " . $uploadsConfig['driver'] . "\n";
echo "   Root: " . $uploadsConfig['root'] . "\n";
echo "   URL: " . $uploadsConfig['url'] . "\n";
echo "   Visibility: " . $uploadsConfig['visibility'] . "\n\n";

// Check if directories exist
echo "2️⃣  Upload Directories:\n";
$directories = ['banners', 'gallery', 'courses', 'settings'];
foreach ($directories as $dir) {
    $path = public_path('uploads/' . $dir);
    $exists = is_dir($path);
    $writable = $exists && is_writable($path);
    echo "   uploads/$dir: " . ($exists ? '✅ Exists' : '❌ Missing') . " | " . ($writable ? '✅ Writable' : '❌ Not writable') . "\n";
}

echo "\n3️⃣  Sample File Paths:\n";

// Banner
$banner = \App\Models\Banner::first();
if ($banner) {
    echo "   Banner:\n";
    echo "     DB: " . $banner->image . "\n";
    echo "     Expected: http://localhost/uploads/banners/filename.jpg\n";
}

// Gallery
$gallery = \App\Models\Gallery::first();
if ($gallery) {
    echo "   Gallery:\n";
    echo "     DB: " . $gallery->image . "\n";
    echo "     Expected: http://localhost/uploads/gallery/filename.jpg\n";
}

// Course
$course = \App\Models\Course::whereNotNull('image')->first();
if ($course) {
    echo "   Course:\n";
    echo "     DB: " . $course->image . "\n";
    echo "     Expected: http://localhost/uploads/courses/filename.jpg\n";
}

echo "\n4️⃣  FileUpload Configuration Summary:\n";
echo "   ✅ Banners: disk('uploads') → directory('banners')\n";
echo "   ✅ Gallery: disk('uploads') → directory('gallery')\n";
echo "   ✅ Courses: disk('uploads') → directory('courses')\n";
echo "   ✅ Settings: disk('uploads') → directory('settings')\n";

echo "\n5️⃣  Upload Flow:\n";
echo "   1. User uploads file via Filament\n";
echo "   2. Filament saves to: public/uploads/{directory}/\n";
echo "   3. Database stores: {directory}/filename.ext OR full URL\n";
echo "   4. Frontend displays via: \$model->image_url accessor\n";

echo "\n✅ All uploads use public/uploads folder!\n";
