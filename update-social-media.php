<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Setting;

$setting = Setting::first();

if ($setting) {
    $setting->update([
        'facebook_url' => 'https://facebook.com/csaeducation',
        'twitter_url' => 'https://twitter.com/csaeducation',
        'linkedin_url' => 'https://linkedin.com/company/csaeducation',
        'instagram_url' => 'https://instagram.com/csaeducation',
        'youtube_url' => 'https://youtube.com/@csaeducation',
    ]);
    
    echo "✓ Social media URLs updated successfully!\n\n";
    echo "Facebook: " . $setting->facebook_url . "\n";
    echo "Twitter: " . $setting->twitter_url . "\n";
    echo "LinkedIn: " . $setting->linkedin_url . "\n";
    echo "Instagram: " . $setting->instagram_url . "\n";
    echo "YouTube: " . $setting->youtube_url . "\n";
} else {
    echo "✗ No settings record found. Please run: php artisan db:seed --class=SettingSeeder\n";
}
