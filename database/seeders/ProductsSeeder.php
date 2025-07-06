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
                'name' => 'Centurion',
                'description' => '4 kab',
                'category' => 'Tenda',
                'price' => 10000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'assets/tenda2.png',
                'created_at' => '2025-06-17 02:29:00',
                'updated_at' => '2025-06-17 02:29:00',
            ],
            [
                'id' => 3,
                'name' => 'Tenda1',
                'description' => 'denhoehwdohedhow',
                'category' => 'Tenda',
                'price' => 20000,
                'rating' => 10,
                'status' => 'tersedia',
                'brand' => 'Rei',
                'image' => 'assets/matras.png',
                'created_at' => '2025-06-24 02:43:53',
                'updated_at' => '2025-06-24 02:43:53',
            ],
            [
                'id' => 4,
                'name' => 'Carrier 60L',
                'description' => 'Tas carrier kapasitas besar, cocok untuk ekspedisi',
                'category' => 'Tas & Carrier',
                'price' => 30000,
                'rating' => 9,
                'status' => 'tersedia',
                'brand' => 'Osprey',
                'image' => 'assets/arcteryx.png',
                'created_at' => '2025-06-25 10:00:00',
                'updated_at' => '2025-06-25 10:00:00',
            ],
            [
                'id' => 5,
                'name' => 'Matras Lipat',
                'description' => 'Matras lipat ringan dan mudah dibawa',
                'category' => 'Sleeping Gear',
                'price' => 5000,
                'rating' => 8,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'assets/matras.png',
                'created_at' => '2025-06-26 09:00:00',
                'updated_at' => '2025-06-26 09:00:00',
            ],
            [
                'id' => 6,
                'name' => 'Kompor Portable',
                'description' => 'Kompor gas mini untuk camping',
                'category' => 'Peralatan Masak',
                'price' => 15000,
                'rating' => 9,
                'status' => 'tersedia',
                'brand' => 'Patagonia',
                'image' => 'assets/alatmasak.jpg',
                'created_at' => '2025-06-27 08:00:00',
                'updated_at' => '2025-06-27 08:00:00',
            ],
            [
                'id' => 7,
                'name' => 'Headlamp LED',
                'description' => 'Lampu kepala LED, tahan air',
                'category' => 'Penerangan',
                'price' => 8000,
                'rating' => 8,
                'status' => 'tersedia',
                'brand' => 'The North Face',
                'image' => 'assets/bg2.jpg',
                'created_at' => '2025-06-28 07:00:00',
                'updated_at' => '2025-06-28 07:00:00',
            ],
            [
                'id' => 8,
                'name' => 'Tenda Dome 4P',
                'description' => 'Tenda kapasitas 4 orang, anti air',
                'category' => 'Tenda',
                'price' => 25000,
                'rating' => 9,
                'status' => 'tersedia',
                'brand' => 'Arei',
                'image' => 'assets/tenda2.png',
                'created_at' => '2025-06-29 06:00:00',
                'updated_at' => '2025-06-29 06:00:00',
            ],
            [
                'id' => 9,
                'name' => 'Cooking Set',
                'description' => 'Set peralatan masak lengkap untuk camping',
                'category' => 'Peralatan Masak',
                'price' => 12000,
                'rating' => 7,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'assets/alatmasak.jpg',
                'created_at' => '2025-06-30 05:00:00',
                'updated_at' => '2025-06-30 05:00:00',
            ],
            [
                'id' => 10,
                'name' => 'Jaket Gunung',
                'description' => 'Jaket windproof dan waterproof',
                'category' => 'Peralatan Mendaki',
                'price' => 20000,
                'rating' => 10,
                'status' => 'tersedia',
                'brand' => 'Patagonia',
                'image' => 'assets/arcteryx.png',
                'created_at' => '2025-07-01 04:00:00',
                'updated_at' => '2025-07-01 04:00:00',
            ],
        ];

        DB::table('products')->insert($products);
    }
}