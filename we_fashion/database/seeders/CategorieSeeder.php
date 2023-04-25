<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'label' => 'Homme',
            'slug'=>'men',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'label' => 'Femme',
            'slug'=>'women',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
