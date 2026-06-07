<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'dentbase11@gmail.com'],
            [
                 'name' => 'Farih',
                 'password' => \Illuminate\Support\Facades\Hash::make('farih123'),
                 'role' => \App\Models\User::admin
            ]
        );

    \App\Models\User::firstOrCreate(
            ['email' => 'andrehayfa@gmail.com'],
            [
                 'name' => 'Deandre',
                 'password' => \Illuminate\Support\Facades\Hash::make('deandre123'),
                 'role' => \App\Models\User::user
            ]
        );
    }
}
