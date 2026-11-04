<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galeri::insert([
            [
                'title' => 'Armada Tangki RNE',
                'description' => '1. Armada tangki kami dilengkapi standar keselamatan kerja dan regulasi transportasi bahan bakar nasional
                2. Armada tangki berstandar industri dengan kapasitas besar, siap menjangkau berbagai wilayah distribusi.
                3. Kesiapan distribusi bahan bakar didukung kendaraan tangki berspesifikasi tinggi untuk menjamin kualitas dan ketepatan pengiriman.',
                'image_path' => 'Tangki.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Solar Industri RNE',
                'description' => 'Setiap produk bahan bakar yang kami distribusikan melalui proses pengujian ketat untuk memastikan standar mutu dan spesifikasi selalu terjaga. Dengan pengawasan yang konsisten, kami menjamin pelanggan menerima energi yang berkualitas, aman, dan andal untuk mendukung kebutuhan operasional perusahaan anda.',
                'image_path' => 'SolarIndustri.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
