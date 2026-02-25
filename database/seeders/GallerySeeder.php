<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Computer Lab',
                'description' => 'Our state-of-the-art computer lab with latest equipment',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=600&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Classroom',
                'description' => 'Modern classroom with interactive learning environment',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&h=600&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Students Learning',
                'description' => 'Students engaged in practical training sessions',
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Certification Ceremony',
                'description' => 'Annual certification ceremony for successful students',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&h=600&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Library',
                'description' => 'Well-stocked library with technical books and resources',
                'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=800&h=600&fit=crop',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Workshop',
                'description' => 'Hands-on workshop sessions for practical skills',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['title' => $gallery['title']],
                $gallery
            );
        }
    }
}
