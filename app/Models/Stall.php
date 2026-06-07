<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stall extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk pengisian massal (Mass Assignment).
     * Diselaraskan dengan struktur migration dan seeder terbaru.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'status',
        'deskripsi',
    ];

    /**
     * Konversi tipe data otomatis (Casting).
     * Memastikan 'is_open' dibaca sebagai boolean (true/false) bukan integer (1/0) di aplikasi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_open' => 'boolean',
    ];

    /**
     * Relasi ke model Menu (One-to-Many).
     * Sebuah stan kantin dapat memiliki banyak menu makanan atau minuman.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus(): HasMany
    {
        // Parameter kedua 'stall_id' adalah foreign key yang ada di tabel menus
        return $this->hasMany(Menu::class, 'stall_id');
    }
}