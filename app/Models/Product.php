<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'foto_product',
        'variant_product',
        'description_product',
        'harga_product',
        'jumlah_product',
        'status_publish',
        'slug_link',
    ];

}
