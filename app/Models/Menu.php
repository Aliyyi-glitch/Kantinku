<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['stall_id', 'nama_makanan', 'harga', 'keterangan'];

    public function stall()
    {
        return $this->belongsTo(Stall::class);
    }
}
