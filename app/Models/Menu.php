<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    // Pastikan 'category' dan 'description' ada di dalam array ini!
    protected $fillable = [
        'stall_id', 
        'name', 
        'price', 
        'image', 
        'category', 
        'description'
    ];

    /**
     * Relasi balik ke model Stall
     */
    public function stall(): BelongsTo
    {
        return $this->belongsTo(Stall::class, 'stall_id');
    }
}