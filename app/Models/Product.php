<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use HasFactory, SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
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

    protected $table = 'products';

    public function scopeSearch($query, $term)
    {
        return $query->where('variant_product', 'LIKE', "%{$term}%")
                     ->orWhere('description_product', 'LIKE', "%{$term}%");
    }
}
