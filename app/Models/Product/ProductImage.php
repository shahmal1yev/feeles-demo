<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'disk',
        'path',
        'name',
        'source',
        'productId'
    ];

    public $hidden = [
        'id',
        'created',
        'updated'
    ];
}
