<?php

/**
 * Upload Test Script
 * Run this with: php test-uploads.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 Testing Image Upload Configuration\n";
echo "=====================================\n\n";

// Test Banner
echo "1️⃣  Testing Banner Model:\n";
$banner = \App\Models\Banner::first();
if ($banner) {
    echo "   Image path in DB: " . $banner->image . "\n";
    echo "   Image URL: " . $banner->image_url . "\n";
    echo "   File exists: " . (file_exists(public_path('uploads/' . str_replace('uploads/', '', $banner->image))) ? '✅ Yes' : '❌ No') . "\n";
} else {
    echo "   ⚠️  No banners found\n";
}
echo "\n";

// Test Gallery
echo "2️⃣  Testing Gallery Model:\n";
$gallery = \App\Models\Gallery::first();
if ($gallery) {
    echo "   Image path in DB: " . $gallery->image . "\n";
    echo "   Image URL: " . $gallery->image_url . "\n";
    $imagePath = str_replace('uploads/', '', $gallery->image);
    $fullPath = public_path('uploads/' . $imagePath);
    echo "   Full path: " . $fullPath . "\n";
    echo "   File exists: " . (file_exists($fullPath) ? '✅ Yes' : '❌ No') . "\n";
} else {
    echo "   ⚠️  No gallery images found\n";
}
echo "\n";

// Test Course
echo "3️⃣  Testing Course Model:\n";
$course = \App\Models\Course::first();
if ($course) {
    echo "   Image path in DB: " . ($course->image ?? 'NULL') . "\n";
    if ($course->image) {
        echo "   Image URL: " . $course->image_url . "\n";
        $imagePath = str_replace('uploads/', '', $course->image);
        $fullPath = public_path('uploads/' . $imagePath);
        echo "   Full path: " . $fullPath . "\n";
        echo "   File exists: " . (file_exists($fullPath) ? '✅ Yes' : '❌ No') . "\n";
    }
} else {
    echo "   ⚠️  No courses found\n";
}
echo "\n";

// Test Settings
echo "4️⃣  Testing Settings Model:\n";
$settings = \App\Models\Setting::first();
if ($settings) {
    if ($settings->logo) {
        echo "   Logo path in DB: " . $settings->logo . "\n";
        echo "   Logo URL: " . $settings->logo_url . "\n";
    } else {
        echo "   ⚠️  No logo set\n";
    }
} else {
    echo "   ⚠️  No settings found\n";
}
echo "\n";

// Test Filesystem Configuration
echo "5️⃣  Testing Filesystem Configuration:\n";
$uploadsPath = config('filesystems.disks.uploads.root');
echo "   Uploads disk root: " . $uploadsPath . "\n";
echo "   Uploads disk URL: " . config('filesystems.disks.uploads.url') . "\n";
echo "   Directory exists: " . (is_dir($uploadsPath) ? '✅ Yes' : '❌ No') . "\n";
echo "   Directory writable: " . (is_writable($uploadsPath) ? '✅ Yes' : '❌ No') . "\n";
echo "\n";

// Test Upload Directories
echo "6️⃣  Testing Upload Directories:\n";
$directories = ['banners', 'gallery', 'courses', 'settings'];
foreach ($directories as $dir) {
    $path = public_path('uploads/' . $dir);
    $exists = is_dir($path);
    $writable = $exists && is_writable($path);
    echo "   uploads/$dir: " . ($exists ? '✅ Exists' : '❌ Missing') . " | " . ($writable ? '✅ Writable' : '❌ Not writable') . "\n";
}
echo "\n";

// Test APP_URL
echo "7️⃣  Testing APP_URL Configuration:\n";
echo "   APP_URL: " . config('app.url') . "\n";
echo "   url() helper: " . url('/') . "\n";
echo "\n";

echo "✅ Test complete!\n";
