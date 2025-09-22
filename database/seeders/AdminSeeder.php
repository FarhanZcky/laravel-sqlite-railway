<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admintracer@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('study123'),
                'role' => 'admin',
            ]
        );
    }
}
