<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔄 Converting paths to full URLs...\n\n";

// Convert Banners
$banners = \App\Models\Banner::all();
foreach ($banners as $banner) {
    $oldPath = $banner->image;
    
    // If already a full URL, skip
    if (str_starts_with($oldPath, 'http')) {
        echo "Banner {$banner->id}: Already full URL\n";
        continue;
    }
    
    // Convert to full URL
    $newPath = url('uploads/' . ltrim($oldPath, '/'));
    
    $banner->image = $newPath;
    $banner->save();
    
    echo "Banner {$banner->id}:\n";
    echo "  Old: {$oldPath}\n";
    echo "  New: {$newPath}\n\n";
}

echo "✅ Done! All paths converted to full URLs.\n";
