<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Courses
        $courses = [
            [
                'title' => 'Complete Web Design Bootcamp',
                'slug' => 'complete-web-design-bootcamp',
                'summary' => 'Master modern web design from scratch including HTML, CSS, and Figma.',
                'description' => "This comprehensive course takes you from zero to a professional web designer. You will learn the principles of design, color theory, typography, and how to build responsive websites.\n\nWhat you'll learn:\n- HTML5 & CSS3\n- Responsive Design\n- Figma for UI/UX\n- Web animations",
                'price' => 49.99,
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=800',
                'duration' => '12 Weeks',
                'level' => 'Beginner',
                'features' => [['feature' => 'HTML5 & CSS3'], ['feature' => 'Figma Basics'], ['feature' => 'UI/UX Design'], ['feature' => 'Portfolio Projects']],
            ],
            [
                'title' => 'Advanced PHP Programming',
                'slug' => 'advanced-php-programming',
                'summary' => 'Deep dive into object-oriented PHP and modern development patterns.',
                'description' => "Take your PHP skills to the next level. We cover advanced OOP concepts, Design Patterns, and how to build robust, scalable applications.\n\nKey topics:\n- Interfaces & Abstract Classes\n- Dependency Injection\n- Unit Testing with PHPUnit\n- Database Optimization",
                'price' => 79.99,
                'image' => 'https://images.unsplash.com/photo-1599507593499-a3f7d7d97667?auto=format&fit=crop&q=80&w=800',
                'duration' => '8 Weeks',
                'level' => 'Advanced',
                'features' => [['feature' => 'OOP Patterns'], ['feature' => 'PHPUnit'], ['feature' => 'Security Best Practices'], ['feature' => 'Database Performance']],
            ],
            [
                'title' => 'Mastering Adobe Photoshop',
                'slug' => 'mastering-adobe-photoshop',
                'summary' => 'Everything you need to know about professional photo editing and manipulation.',
                'description' => "The ultimate guide to Photoshop. Whether you want to retouch photos or create digital art, this course has you covered.\n\nCourse Modules:\n- Layers & Masks\n- Color Correction\n- Advanced Retouching\n- Creative Compositing",
                'price' => 59.99,
                'image' => 'https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&q=80&w=800',
                'duration' => '10 Weeks',
                'level' => 'Intermediate',
                'features' => [['feature' => 'Photo Retouching'], ['feature' => 'Compositing'], ['feature' => 'Color Grading'], ['feature' => 'Design Workflows']],
            ],
        ];

        foreach ($courses as $course) {
            \App\Models\Course::updateOrCreate(['slug' => $course['slug']], $course);
        }
    }
}
