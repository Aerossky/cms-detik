<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Marketing Strategies',
                'division' => 'marketing',
                'description' => 'Discussion on effective marketing strategies.',
                'image' => 'marketing-strategies.jpg',
                'slug' => 'marketing-strategies',
                'created_by' => 2,
                'created_at' => now(),
            ],
            [
                'title' => 'IT Innovations',
                'division' => 'it',
                'description' => 'Overview of recent innovations in IT.',
                'image' => 'it-innovations.jpg',
                'slug' => 'it-innovations',
                'created_by' => 3,
                'created_at' => now(),
            ],
            [
                'title' => 'Human Capital Management',
                'division' => 'human capital',
                'description' => 'Exploring strategies for effective human capital management.',
                'image' => 'human-capital-management.jpg',
                'slug' => 'human-capital-management',
                'created_by' => 4,
                'created_at' => now(),
            ],
            [
                'title' => 'Product Development',
                'division' => 'product',
                'description' => 'Discussion on the process of product development.',
                'image' => 'product-development.jpg',
                'slug' => 'product-development',
                'created_by' => 5,
                'created_at' => now(),
            ],
        ];

        foreach ($data as $item) {
            Topic::insert(
                [
                    'title' => $item['title'],
                    'division' => $item['division'],
                    'description' => $item['description'],
                    'image' => $item['image'],
                    'slug' => $item['slug'],
                    'created_by' => $item['created_by'],
                    'created_at' => $item['created_at'],
                ]
            );
        }
    }
}
