<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 3,
                'topic_id' => 1,
                'status' => 'pending',
            ],
            [
                'user_id' => 3,
                'topic_id' => 2,
                'status' => 'approved',
            ],
        ];

        foreach ($data as $item) {
            Request::insert(
                [
                    'user_id' => $item['user_id'],
                    'topic_id' => $item['topic_id'],
                    'status' => $item['status'],
                ]
            );
        }
    }
}
