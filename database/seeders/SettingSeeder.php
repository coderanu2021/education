<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'site_name' => 'CSA Education',
            'site_description' => 'CSA Education Bhawanigarh - Best Computer Education and IT Training Center',
            'email' => 'info@csaeducation.in',
            'phone' => '+91-XXXXXXXXXX',
            'address' => 'Bhawanigarh',
            'city' => 'Bhawanigarh',
            'state' => 'Punjab',
            'country' => 'India',
            'primary_color' => '#F96D17',
            'secondary_color' => '#0F1B31',
            'facebook_url' => 'https://facebook.com/csaeducation',
            'twitter_url' => 'https://twitter.com/csaeducation',
            'linkedin_url' => 'https://linkedin.com/company/csaeducation',
            'instagram_url' => 'https://instagram.com/csaeducation',
            'youtube_url' => 'https://youtube.com/@csaeducation',
            'footer_text' => 'CSA Education Bhawanigarh - Best place for learning latest technology for IT industry. Huge experience in multimedia and web technologies.',
            'copyright_text' => 'Copyright © ' . date('Y') . ' CSA Education Bhawanigarh. All Rights Reserved.',
        ]);
    }
}
