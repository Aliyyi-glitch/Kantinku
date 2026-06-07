<?php

namespace Database\Seeders;

use App\Models\Stall;
use App\Models\User;
use Illuminate\Database\Seeder;

class StallSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar stan dan data pemiliknya
        $stalls = [
            ['id' => 1, 'name' => 'Kantin Mbak Sri', 'phone' => '6281234567890', 'status' => 'buka', 'deskripsi' => 'Aneka ayam geprek.'],
            ['id' => 2, 'name' => 'Warteg Bahari', 'phone' => '6289876543210', 'status' => 'buka', 'deskripsi' => 'Nasi rames khas tegal.'],
            ['id' => 3, 'name' => 'Dimsum & Bakso Persib', 'phone' => '6281311223344', 'status' => 'buka', 'deskripsi' => 'Dimsum dan bakso urat.'],
            ['id' => 4, 'name' => 'Soto & Bubur Ayam Barokah', 'phone' => '6287712345678', 'status' => 'tutup', 'deskripsi' => 'Soto ayam lamongan.'],
            ['id' => 5, 'name' => 'Gorengan & Kue Basah Mak Mur', 'phone' => '6285298765432', 'status' => 'buka', 'deskripsi' => 'Aneka gorengan.'],
            ['id' => 6, 'name' => 'Kedai Minuman Segar', 'phone' => '6285555555555', 'status' => 'buka', 'deskripsi' => 'Es coklat lumer.'],
        ];

        foreach ($stalls as $stallData) {
            // 1. Pastikan User dengan ID ini ada dulu
            $user = User::updateOrCreate(
                ['id' => $stallData['id']], // Pakai ID yang sama dengan stan biar gampang
                ['name' => 'Mitra ' . $stallData['id'], 'email' => 'mitra' . $stallData['id'] . '@kantin.com', 'password' => bcrypt('password')]
            );

            // 2. Baru buat/update Stan-nya
            Stall::updateOrCreate(
                ['id' => $stallData['id']],
                [
                    'user_id'   => $user->id,
                    'name'      => $stallData['name'],
                    'phone'     => $stallData['phone'],
                    'status'    => $stallData['status'],
                    'deskripsi' => $stallData['deskripsi'],
                ]
            );
        }
    }
}