<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'super admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'super@example.com',
                'role' => 'super_admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'username' => 'admin 1',
                'first_name' => 'Admin',
                'last_name' => 'Aja',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],

            [
                'username' => 'admin 2',
                'first_name' => 'Admin',
                'last_name' => 'Aja',
                'email' => 'admin2@example.com',
                'role' => 'admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'username' => 'User',
                'first_name' => 'User',
                'last_name' => 'Aja',
                'email' => 'user@example.com',
                'role' => 'user',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($data as $item) {
            User::insert(
                [
                    'username' => $item['username'],
                    'first_name' => $item['first_name'],
                    'last_name' => $item['last_name'],
                    'email' => $item['email'],
                    'role' => $item['role'],
                    'password' => $item['password'],
                    'email_verified_at' => $item['email_verified_at'],
                ]
            );
        }

    }
}
