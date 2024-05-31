<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cart',
        'id_payment',
        'alamat_user',
        'bukti_pembayaran'
    ];
    
    public function cart() {
        return $this->belongsTo(\App\Models\Cart::class, 'id_cart', 'id');
    }
}
