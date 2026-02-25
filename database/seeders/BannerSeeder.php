<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'image' => 'uploads/banners/1.jpg',
                'link' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'image' => 'uploads/banners/2.jpg',
                'link' => '/courses',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'image' => 'uploads/banners/3.jpg',
                'link' => '/contact',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                ['order' => $banner['order']],
                $banner
            );
        }
    }
}
