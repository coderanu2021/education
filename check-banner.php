<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 Checking Banner Data\n";
echo "======================\n\n";

$banners = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();

echo "Total Active Banners: " . $banners->count() . "\n\n";

foreach ($banners as $index => $banner) {
    echo "Banner #" . ($index + 1) . ":\n";
    echo "  ID: " . $banner->id . "\n";
    echo "  Order: " . $banner->order . "\n";
    echo "  Active: " . ($banner->is_active ? 'Yes' : 'No') . "\n";
    echo "  Link: " . ($banner->link ?? 'No link') . "\n";
    echo "  Image (DB): " . $banner->image . "\n";
    echo "  Image URL: " . $banner->image_url . "\n";
    
    // Check if file exists
    $imagePath = str_replace('uploads/', '', $banner->image);
    $fullPath = public_path('uploads/' . $imagePath);
    echo "  Full Path: " . $fullPath . "\n";
    echo "  File Exists: " . (file_exists($fullPath) ? '✅ Yes' : '❌ No') . "\n";
    
    if (file_exists($fullPath)) {
        echo "  File Size: " . number_format(filesize($fullPath) / 1024, 2) . " KB\n";
    }
    
    echo "\n";
}

echo "🌐 Testing URL Generation:\n";
echo "  APP_URL: " . config('app.url') . "\n";
echo "  url('/'): " . url('/') . "\n";
echo "  asset('/'): " . asset('/') . "\n";
