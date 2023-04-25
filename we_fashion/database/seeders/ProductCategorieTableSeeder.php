<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 300; $i++) {
            $randomProduct = Product::inRandomOrder()->first();
            $randomCategorie = Categorie::inRandomOrder()->first();

            $haveAlreadyInBase = DB::table('categorie_product')->where('product_id', $randomProduct->id)->where('categorie_id', $randomCategorie->id)->first();
            if (!$haveAlreadyInBase) {
                DB::table('categorie_product')->insert([
                    'product_id' => $randomProduct->id,
                    'categorie_id' => $randomCategorie->id
                ]);
            }
        }
    }
}
