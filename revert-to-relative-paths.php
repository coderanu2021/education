<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔄 Converting to relative paths...\n\n";

// Convert Banners
$banners = \App\Models\Banner::all();
foreach ($banners as $banner) {
    $oldPath = $banner->image;
    
    // If it's a full URL, convert to relative
    if (str_starts_with($oldPath, 'http://') || str_starts_with($oldPath, 'https://')) {
        // Extract path after /uploads/
        if (preg_match('#/uploads/(.+)$#', $oldPath, $matches)) {
            $newPath = $matches[1];
        } else {
            continue;
        }
    } else {
        // Already relative, just normalize
        $newPath = ltrim($oldPath, '/');
        $newPath = str_replace('uploads/', '', $newPath);
    }
    
    if ($oldPath !== $newPath) {
        $banner->image = $newPath;
        $banner->save();
        
        echo "Banner {$banner->id}:\n";
        echo "  Old: {$oldPath}\n";
        echo "  New: {$newPath}\n\n";
    }
}

// Convert Gallery
$galleries = \App\Models\Gallery::all();
foreach ($galleries as $gallery) {
    $oldPath = $gallery->image;
    
    // If it's a full URL, convert to relative
    if (str_starts_with($oldPath, 'http://') || str_starts_with($oldPath, 'https://')) {
        if (preg_match('#/uploads/(.+)$#', $oldPath, $matches)) {
            $newPath = $matches[1];
        } else {
            continue;
        }
    } else {
        $newPath = ltrim($oldPath, '/');
        $newPath = str_replace('uploads/', '', $newPath);
    }
    
    if ($oldPath !== $newPath) {
        $gallery->image = $newPath;
        $gallery->save();
        
        echo "Gallery {$gallery->id}:\n";
        echo "  Old: {$oldPath}\n";
        echo "  New: {$newPath}\n\n";
    }
}

echo "✅ Done! All paths are now relative.\n";
echo "\nFormat: directory/filename.ext\n";
echo "Example: banners/image.jpg\n";
