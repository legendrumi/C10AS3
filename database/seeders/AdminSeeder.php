<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}