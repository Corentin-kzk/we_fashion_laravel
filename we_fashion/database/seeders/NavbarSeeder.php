<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Navbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $links = [
            [
                'name' => 'Solde',
                'route' => '/solde',
                'ordering' => 1,
            ],
            [
                'name' => 'Homme',
                'route' => '/category/men',
                'ordering' => 2,
            ],
            [
                'name' => 'Femme',
                'route' => '/category/women',
                'ordering' => 3,
            ],
        ];

        foreach ($links as $navbar) {
            Navbar::create($navbar);
        }
    }
}
