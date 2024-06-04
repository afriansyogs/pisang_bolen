<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_product', 'qty'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product', 'id');
    }
}