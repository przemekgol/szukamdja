<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@szukamdja.pl'],
            [
                'name' => 'Administrator',
                'password' => 'admin12345',
                'role' => 'admin',
                'postal_code' => '00-001',
                'radius_km' => 1,
            ]
        );
    }
}
