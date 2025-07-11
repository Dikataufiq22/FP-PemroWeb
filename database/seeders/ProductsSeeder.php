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
                'name' => 'Tenda EIGER X-Berganoa 1P',
                'description' => 'Tenda satu orang berdesain ringkas dan kokoh, cocok untuk solo hiking dan ekspedisi ringan. Dirancang dengan material tahan air dan struktur dome yang mudah dipasang, X-Berganoa 1P memberikan perlindungan optimal dalam cuaca tidak menentu tanpa membebani bawaan.',
                'category' => 'Tenda',
                'price' => 30000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'tendatnf.png',
                'created_at' => '2025-06-17 01:23:29',
                'updated_at' => '2025-06-17 01:23:29',
            ],
            [
                'id' => 2,
                'name' => 'Tenda Arrei Expedition 4',
                'description' => 'Tenda ekspedisi berkapasitas empat orang yang dirancang untuk menghadapi kondisi ekstrem. Menggabungkan material tahan air dan struktur dome yang stabil, Arrei Expedition 4 cocok untuk kegiatan outdoor intensif seperti pendakian gunung atau ekspedisi panjang. Ventilasi ganda dan ruang penyimpanan tambahan memberikan kenyamanan ekstra di alam terbuka.',
                'category' => 'Tenda',
                'price' => 45000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Rei',
                'image' => 'tenda.png',
                'created_at' => '2025-06-17 02:29:00',
                'updated_at' => '2025-06-17 02:29:00',
            ],
            [
                'id' => 3,
                'name' => 'Tas Carrier Osprey Atmost 50',
                'description' => 'Dirancang untuk petualangan multi-hari, Osprey Aether 65 S21 menawarkan dukungan optimal dengan sistem suspensi AirScape dan rangka ringan yang mengikuti kontur tubuh. Kapasitas 65 liter memungkinkan penyimpanan perlengkapan secara efisien, sementara bahan tahan lama dan tahan air menjaga barang tetap aman dalam berbagai cuaca.',
                'category' => 'Tas & Carrier',
                'price' => 50000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Osprey',
                'image' => 'tasosprey.png',
                'created_at' => '2025-06-24 02:43:53',
                'updated_at' => '2025-06-24 02:43:53',
            ],
            [
                'id' => 4,
                'name' => 'Jaket Patagonia Puffer',
                'description' => 'Jaket puffer dari Patagonia dirancang untuk menghadapi suhu dingin dengan tetap menjaga mobilitas dan kenyamanan. Dengan material insulasi berkualitas tinggi dan desain ramah lingkungan, jaket ini cocok untuk aktivitas outdoor seperti mendaki, berkemah, atau sekadar menikmati udara pegunungan.',
                'category' => 'Peralatan Mendaki',
                'price' => 25000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Patagonia',
                'image' => 'jaket1.png',
                'created_at' => '2025-06-25 10:00:00',
                'updated_at' => '2025-06-25 10:00:00',
            ],
            [
                'id' => 5,
                'name' => 'Sepatu Hedgehog Fastpack II',
                'description' => 'The North Face (TNF) menghadirkan sepatu hiking dan trekking dengan pendekatan teknologi tinggi dan desain yang siap menghadapi medan ekstrem. Sepatu mereka cocok bagi pendaki profesional maupun petualang weekend yang mencari kenyamanan, perlindungan, dan performa yang konsisten',
                'category' => 'Peralatan Mendaki',
                'price' => 20000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'The North Face',
                'image' => 'sepatutnf.png',
                'created_at' => '2025-06-26 09:00:00',
                'updated_at' => '2025-06-26 09:00:00',
            ],
            [
                'id' => 6,
                'name' => 'Jaket Arei Stormshield',
                'description' => 'Polyester tahan air dengan lapisan breathable untuk menjaga kenyamanan saat bergerak',
                'category' => 'Peralatan Mendaki',
                'price' => 20000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Rei',
                'image' => 'jaket2.png',
                'created_at' => '2025-06-27 08:00:00',
                'updated_at' => '2025-06-27 08:00:00',
            ],
            [
                'id' => 7,
                'name' => 'Headlamp Eiger Lumos 220',
                'description' => 'Headlamp dari Eiger dirancang untuk memenuhi kebutuhan pencahayaan di alam terbuka, terutama saat mendaki, berkemah, atau beraktivitas malam hari. Dikenal dengan konstruksi tangguh dan fitur yang praktis, produk ini cocok untuk pemula hingga adventurer berpengalaman.',
                'category' => 'Penerangan',
                'price' => 8000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'headlamp.png',
                'created_at' => '2025-06-28 07:00:00',
                'updated_at' => '2025-06-28 07:00:00',
            ],
            [
                'id' => 8,
                'name' => 'Sleping Bag ThermoLite',
                'description' => 'Temperatur nyaman: Ideal untuk suhu -15°C, cocok untuk dataran tinggi Indonesia Polyester tahan air dan tahan abrasi, mudah dibersihkan Synthetic hollow fiber yang ringan namun mampu menahan panas, Full zipper dengan double slider dan pelindung anti-snag, Dilengkapi compression sack, mudah disimpan dan dibawa',
                'category' => 'Sleeping Gear',
                'price' => 15000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Arei',
                'image' => 'slepingbag.png',
                'created_at' => '2025-06-29 06:00:00',
                'updated_at' => '2025-06-29 06:00:00',
            ],
            [
                'id' => 9,
                'name' => 'Cooking Set',
                'description' => 'Set peralatan masak lengkap untuk camping, Terbuat dari aluminium anodized yang ringan, tahan panas, dan mudah dibersihkan, mencakup panci, wajan, tutup multi-fungsi, dan gelas lipat—beberapa model juga dilengkapi sendok, Stackable dan dilengkapi jaring penyimpanan atau tas kecil untuk transportasi mudah, Stackable dan dilengkapi jaring penyimpanan atau tas kecil untuk transportasi mudah',
                'category' => 'Peralatan Masak',
                'price' => 12000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'alatmasak.jpg',
                'created_at' => '2025-06-30 05:00:00',
                'updated_at' => '2025-06-30 05:00:00',
            ],
            [
                'id' => 10,
                'name' => 'Tas Eiger Caldera 75L',
                'description' => 'Tas carrier Eiger kapasitas 75L dengan dukungan frame internal dan sistem ventilasi tropis. Cocok untuk ekspedisi pegunungan atau hiking multi-hari. Material polyester atau nylon dengan lapisan tahan air, raincover terintegrasi, Sistem back panel dengan mesh dan airflow channel untuk sirkulasi udara maksimal, Menggunakan frame internal aluminium atau plastik fleksibel untuk stabilitas di medan berat',
                'category' => 'Tas & Carrier',
                'price' => 50000,
                'rating' => 100,
                'status' => 'tersedia',
                'brand' => 'Eiger',
                'image' => 'Carrier1.png',
                'created_at' => '2025-07-01 04:00:00',
                'updated_at' => '2025-07-01 04:00:00',
            ],
        ];

        DB::table('products')->insert($products);
    }
}