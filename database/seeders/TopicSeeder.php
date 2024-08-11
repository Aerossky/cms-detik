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
            ],
            [
                'title' => 'IT Innovations',
                'division' => 'it',
                'description' => 'Overview of recent innovations in IT.',
                'image' => 'it-innovations.jpg',
                'slug' => 'it-innovations',
                'created_by' => 3,
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
                ]
            );
        }
    }
}
