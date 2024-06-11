<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id_user',
        'id_product',
        'harga_product', // Ubah disini
        'qty',
        'alamat',
        'id_payment',
        'bukti_transaksi',
        'status',
    ];
    
    public function cart() {
        return $this->belongsTo(\App\Models\Cart::class, 'id_cart', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }
    
}
