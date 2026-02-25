<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔧 Fixing Banner Image Paths\n";
echo "=============================\n\n";

$banners = \App\Models\Banner::all();

echo "Total Banners: " . $banners->count() . "\n\n";

foreach ($banners as $banner) {
    $oldPath = $banner->image;
    
    // Remove 'uploads/' prefix if present
    $newPath = str_replace('uploads/', '', $oldPath);
    
    // Ensure it starts with 'banners/'
    if (!str_starts_with($newPath, 'banners/')) {
        $newPath = 'banners/' . $newPath;
    }
    
    if ($oldPath !== $newPath) {
        echo "Banner ID {$banner->id}:\n";
        echo "  Old: {$oldPath}\n";
        echo "  New: {$newPath}\n";
        
        $banner->image = $newPath;
        $banner->save();
        
        echo "  ✅ Updated\n\n";
    } else {
        echo "Banner ID {$banner->id}: ✅ Already correct ({$newPath})\n\n";
    }
}

echo "✅ All banner paths normalized!\n";
echo "\nFinal paths:\n";
\App\Models\Banner::all()->each(function($b) {
    echo "  ID {$b->id}: {$b->image}\n";
});
