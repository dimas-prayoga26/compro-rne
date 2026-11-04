<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Galeri;
use App\Models\Lokasi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([LokasiSeeder::class, HargaSeeder::class, GaleriSeeder::class]);

        User::factory()->create([
            'name' => 'Admin RNE',
            'email' => 'rne@gmail.com',
        ]);

        Detail::create([
            'user_id' => 1,
            'company_profile' => 'COMPRO_PT_RNE.pdf',
            'whatsapp' => '6285172071096',
            'email_contact' => 'rajawalinusantaraenergi@gmail.com',
            'office_contact' => '(021) 5890 5002',
            'maps_office' => 'https://maps.app.goo.gl/Pn5WmSZr5EZybbyw7',
            'address' => 'Indonesia Stock Exchange Building, Tower 1 Level 3 Suite 304, SCBD Jl. Jend. Sudirman Kav. 52-53 Jakarta Selatan 12190'
        ]);
    }
}
