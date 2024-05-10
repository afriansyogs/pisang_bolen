<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Saran extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nama_user',
        'saran',
        'id_user',
        'name_user',
    ];

}
