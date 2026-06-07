<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Stall;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // --- AMBIL ID STAN SECARA DINAMIS BERDASARKAN NAMA ---
        // Cara ini memastikan foreign key match 100% dengan data dari StallSeeder
        $stanMbakSri     = Stall::where('name', 'like', '%Mbak Sri%')->first()?->id ?? 1;
        $stanWarteg      = Stall::where('name', 'like', '%Warteg Bahari%')->first()?->id ?? 2;
        $stanDimsum      = Stall::where('name', 'like', '%Dimsum%')->first()?->id ?? 3;
        $stanSoto        = Stall::where('name', 'like', '%Soto%')->first()?->id ?? 4;
        $stanGorengan    = Stall::where('name', 'like', '%Gorengan%')->first()?->id ?? 5;
        $stanKedaiMinum  = Stall::where('name', 'like', '%Kedai Minuman%')->first()?->id ?? 6;

        // --- STAN 1: KANTIN MBAK SRI (BUKA) ---
        Menu::create([
            'stall_id' => $stanMbakSri,
            'name' => 'Ayam Geprez Krispi',
            'price' => 15000,
            'category' => 'Makanan Berat',
            'description' => 'Ayam geprek dengan cabai segar pilihan dan bumbu krispi yang gurih melimpah.'
        ]);
        Menu::create([
            'stall_id' => $stanMbakSri,
            'name' => 'Es Teh Manis Jumbo',
            'price' => 5000,
            'category' => 'Minuman Segar',
            'description' => 'Kesegaran teh asli dengan gula murni ukuran jumbo, pas untuk melepas dahaga.'
        ]);

        // --- STAN 2: WARTEG BAHARI (BUKA) ---
        Menu::create([
            'stall_id' => $stanWarteg,
            'name' => 'Nasi Rames Komplit',
            'price' => 18000,
            'category' => 'Makanan Berat',
            'description' => 'Nasi hangat dengan porsi mengenyangkan ditambah pilihan 3 lauk sayur bebas pilih plus telur balado.'
        ]);

        // --- STAN 3: DIMSUM & BAKSO JUARA (BUKA) ---
        Menu::create([
            'stall_id' => $stanDimsum,
            'name' => 'Dimsum Ayam Premium (Isi 4)',
            'price' => 13000,
            'category' => 'Jajanan Ringan',
            'description' => 'Dimsum olahan daging ayam asli yang lembut gurih, disajikan hangat dengan saus asam pedas.'
        ]);
        Menu::create([
            'stall_id' => $stanDimsum,
            'name' => 'Bakso Mercon Spesial',
            'price' => 17000,
            'category' => 'Makanan Berat',
            'description' => 'Bakso sapi urat besar dengan isian cabai rawit melimpah dipadukan kuah kaldu panas yang mantap.'
        ]);

        // --- STAN 4: SOTO & BUBUR AYAM BAROKAH (BUKA) ---
        Menu::create([
            'stall_id' => $stanSoto,
            'name' => 'Soto Ayam Lamongan',
            'price' => 14000,
            'category' => 'Makanan Berat',
            'description' => 'Soto ayam berkuah kuning hangat dengan taburan koya gurih, soun, dan suwiran ayam melimpah.'
        ]);
        Menu::create([
            'stall_id' => $stanSoto,
            'name' => 'Bubur Ayam Spesial',
            'price' => 10000,
            'category' => 'Makanan Berat',
            'description' => 'Bubur lembut dengan kuah kuning, cakwe, kacang goreng, kerupuk, dan suwiran ayam.'
        ]);

        // --- STAN 5: GORENGAN & KUE BASAH MAK MUR (BUKA) ---
        Menu::create([
            'stall_id' => $stanGorengan,
            'name' => 'Cireng Keraton Pedas',
            'price' => 8000,
            'category' => 'Jajanan Ringan',
            'description' => 'Cireng renyah di luar, kenyal di dalam dengan siraman bumbu kacang pedas yang khas.'
        ]);
        Menu::create([
            'stall_id' => $stanGorengan,
            'name' => 'Risoles Mayonais (Isi 3)',
            'price' => 9000,
            'category' => 'Jajanan Ringan',
            'description' => 'Risoles krispi dengan isian potongan telur, smoked beef, dan mayo yang meleleh di mulut.'
        ]);

        // --- STAN 6: KEDAI MINUMAN SEGAR (STATUS TUTUP) ---
        Menu::create([
            'stall_id' => $stanKedaiMinum,
            'name' => 'Es Coklat Lumer',
            'price' => 10000,
            'category' => 'Minuman Segar',
            'description' => 'Premium coklat kental disajikan dingin dengan topping choco chips melimpah.'
        ]);
        Menu::create([
            'stall_id' => $stanKedaiMinum,
            'name' => 'Roti Bakar Keju',
            'price' => 12000,
            'category' => 'Jajanan Ringan',
            'description' => 'Roti bakar empuk dengan selai mentega dan taburan keju parut melimpah.'
        ]);
        Menu::create([
            'stall_id' => $stanKedaiMinum,
            'name' => 'Jus Alpukat Kocok',
            'price' => 11000,
            'category' => 'Minuman Segar',
            'description' => 'Alpukat mentega segar yang dikocok kasar dengan siraman susu kental manis coklat.'
        ]);
    }
}