<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimoni extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'testi', 
        'name'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
