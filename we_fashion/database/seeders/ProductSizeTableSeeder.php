<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 300; $i++) {
            $randomProduct = Product::inRandomOrder()->first();
            $randomSize = Size::inRandomOrder()->first();

            $haveAlreadyInBase = DB::table('product_size')->where('product_id', $randomProduct->id)->where('size_id', $randomSize->id)->first();
            if (!$haveAlreadyInBase) {
                DB::table('product_size')->insert([
                    'product_id' => $randomProduct->id,
                    'size_id' => $randomSize->id
                ]);
            }
        }
    }
}
