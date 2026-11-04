<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lokasi::insert([
            ['wilayah' => 'Jakarta', 'latitude' => -6.2, 'longitude' => 106.8],
            ['wilayah' => 'Banyuwangi', 'latitude' => -8.65, 'longitude' => 114.35],
            ['wilayah' => 'Surabaya', 'latitude' => -7.25, 'longitude' => 112.75],
            ['wilayah' => 'Yogyakarta', 'latitude' => -7.79, 'longitude' => 110.36],
            ['wilayah' => 'Sidoarjo', 'latitude' => -7.45, 'longitude' => 112.72],
            ['wilayah' => 'Madiun', 'latitude' => -7.62, 'longitude' => 111.53],
            ['wilayah' => 'Malang', 'latitude' => -7.98, 'longitude' => 112.63],
            ['wilayah' => 'Bandung', 'latitude' => -6.92, 'longitude' => 107.61],
            ['wilayah' => 'Purwakarta', 'latitude' => -6.55, 'longitude' => 107.45],
            ['wilayah' => 'Palembang', 'latitude' => -2.97, 'longitude' => 104.75],
            ['wilayah' => 'Lampung', 'latitude' => -5.45, 'longitude' => 105.25],
            ['wilayah' => 'Sulawesi', 'latitude' => 3.61, 'longitude' => 125.2],
            ['wilayah' => 'Kalimantan', 'latitude' => 0.35, 'longitude' => 114.42],
        ]);
    }
}
