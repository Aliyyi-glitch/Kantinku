<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kantin', 'deskripsi'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
