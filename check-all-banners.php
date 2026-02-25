<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 All Banners in Database\n";
echo "==========================\n\n";

$allBanners = \App\Models\Banner::orderBy('order')->get();

echo "Total Banners: " . $allBanners->count() . "\n\n";

foreach ($allBanners as $banner) {
    echo "ID: {$banner->id}\n";
    echo "  Order: {$banner->order}\n";
    echo "  Active: " . ($banner->is_active ? '✅ Yes' : '❌ No') . "\n";
    echo "  Link: " . ($banner->link ?? 'No link') . "\n";
    echo "  Image: {$banner->image}\n";
    echo "  Created: {$banner->created_at}\n";
    echo "\n";
}

echo "\n📊 Active Banners Only:\n";
echo "========================\n\n";

$activeBanners = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
echo "Total Active: " . $activeBanners->count() . "\n\n";

foreach ($activeBanners as $banner) {
    echo "ID: {$banner->id} | Order: {$banner->order} | Image: {$banner->image}\n";
}
