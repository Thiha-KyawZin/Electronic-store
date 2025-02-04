<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09123456789',
            'role' => 'admin',
            'gender' => 'female',
            'house_no' => '-',
            'street' => '-',
            'township' => '-',
            'city' => '-',
            'password' => Hash::make('admin123'),
        ]);
    }
}
