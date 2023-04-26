<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Edouard',
            'email' => 'Edouard@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'userType' => 'admin',
        ]);
    }
}
