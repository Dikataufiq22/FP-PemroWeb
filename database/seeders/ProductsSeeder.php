<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Senturion',
                'description' => 'denhoehwdohedhow',
                'category' => 'Tenda',
                'price' => 10000,
                'rating' => 10,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'assets/tenda.png',
                'created_at' => '2025-06-17 01:23:29',
                'updated_at' => '2025-06-17 01:23:29',
            ],
            [
                'id' => 2,
                'name' => 'centurion',
                'description' => '4 kab',
                'category' => 'Tenda',
                'price' => 10000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'eiger',
                'image' => 'assets/tenda2.png',
                'created_at' => '2025-06-17 02:29:00',
                'updated_at' => '2025-06-17 02:29:00',
            ],
            [
                'id' => 3,
                'name' => 'tenda1',
                'description' => 'denhoehwdohedhow',
                'category' => 'Tenda',
                'price' => 20000,
                'rating' => 10,
                'status' => 'tersedia',
                'brand' => 'rei',
                'image' => 'assets/matras.png',
                'created_at' => '2025-06-24 02:43:53',
                'updated_at' => '2025-06-24 02:43:53',
            ],
        ];

        DB::table('products')->insert($products);
    }
}