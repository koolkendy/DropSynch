<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect([
            [
                'id' => 100,
                'name' => 'Admin Supplier 1',
                'email' => 'supplier1@dropsynch.com',
                'email_verified_at' => now(),
                'phone' => '+63 970 000 0001',
                'password' => bcrypt('password'),
                'created_at' => now()
            ],
            [
                'id' => 200,
                'name' => 'Admin Supplier 2',
                'email' => 'supplier2@dropsynch.com',
                'email_verified_at' => now(),
                'phone' => '+63 970 000 0002',
                'password' => bcrypt('password'),
                'created_at' => now()
            ],
            [
                'id' => 1001,
                'name' => 'Dropshipper 1',
                'email' => 'dropshipper1@dropsync.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now()
            ],
            [
                'name' => 'Dropshipper 2',
                'email' => 'dropshipper2@dropsync.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now()
            ]
        ]);

        $users->each(function ($user) {
            User::insert($user);
        });
    }
}
