<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1. Buat 6 User dummy dulu supaya ID 1-6 tersedia
    for ($i = 1; $i <= 6; $i++) {
        \App\Models\User::updateOrCreate(
            ['email' => "mitra{$i}@kantinku.com"],
            [
                'name' => "Mitra {$i}",
                'password' => bcrypt('password'),
            ]
        );
    }

    // 2. Sekarang panggil Seeder Stan dan Menu
    $this->call([
        StallSeeder::class,
        MenuSeeder::class,
    ]);
}
}
