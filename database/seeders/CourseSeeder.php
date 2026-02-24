<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Account Education',
                'slug' => 'account-education',
                'description' => 'Accounting professionals are extremely important in almost all functions of business and government. Learn comprehensive accounting skills with Tally ERP.',
                'duration' => '4 Months',
                'price' => 8000,
                'level' => 'Beginner',
                'image' => null,
            ],
            [
                'title' => 'Computer Classes',
                'slug' => 'computer-classes',
                'description' => 'A computer is an electronic device that manipulates information, or data. It has the ability to store, retrieve, and process data. Learn complete computer basics.',
                'duration' => '3 Months',
                'price' => 5000,
                'level' => 'Beginner',
                'image' => null,
            ],
            [
                'title' => 'Distance Education',
                'slug' => 'distance-education',
                'description' => 'The web development process includes web design, web content design & development. Learn HTML, CSS, JavaScript and modern web technologies.',
                'duration' => '6 Months',
                'price' => 15000,
                'level' => 'Intermediate',
                'image' => null,
            ],
            [
                'title' => 'English Speaking',
                'slug' => 'english-speaking',
                'description' => 'English is a West Germanic language that was first spoken in early medieval England and is now the global lingua franca. Improve your communication skills.',
                'duration' => '3 Months',
                'price' => 6000,
                'level' => 'Beginner',
                'image' => null,
            ],
            [
                'title' => 'Graphic Design & Multimedia',
                'slug' => 'graphic-design-multimedia',
                'description' => 'Learn Photoshop, CorelDRAW, Illustrator, and video editing. Create stunning graphics and multimedia content for professional use.',
                'duration' => '6 Months',
                'price' => 12000,
                'level' => 'Intermediate',
                'image' => null,
            ],
            [
                'title' => 'Programming with Python',
                'slug' => 'programming-with-python',
                'description' => 'Learn Python programming from scratch. Cover basics to advanced topics including data structures, algorithms and real-world applications.',
                'duration' => '5 Months',
                'price' => 18000,
                'level' => 'Intermediate',
                'image' => null,
            ],
            [
                'title' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Master SEO, social media marketing, Google Ads, email marketing, and content marketing strategies for business growth.',
                'duration' => '4 Months',
                'price' => 10000,
                'level' => 'Beginner',
                'image' => null,
            ],
            [
                'title' => 'Data Entry & Typing',
                'slug' => 'data-entry-typing',
                'description' => 'Improve typing speed and accuracy. Learn data entry techniques and office productivity tools for professional work.',
                'duration' => '2 Months',
                'price' => 4000,
                'level' => 'Beginner',
                'image' => null,
            ],
        ];

        foreach ($courses as $course) {
            \App\Models\Course::create($course);
        }
    }
}
