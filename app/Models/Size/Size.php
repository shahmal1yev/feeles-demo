<?php

namespace App\Models\Size;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product\ProductDetail;

class Size extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['label', 'number'];
    public $hidden = ['created', 'updated'];

    public function products()
    {
        return $this->hasMany(ProductDetail::class, 'sizeId', 'id');
    }
}