<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    public $table = 'product_details';

    public $timestamps = false;

    public $fillable = [
        'productId',
        'colorId',
        'sizeId',
        'classGroupId',
        'fabricId',
        'discount',
        'stock'
    ];

    public $hidden = [
        'created',
        'updated'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'productId');
    }

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'colorId');
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'sizeId');
    }

    public function classGroup()
    {
        return $this->hasOne(ClassGroup::class, 'id', 'classGroupId');
    }

    public function fabric()
    {
        return $this->hasOne(Fabric::class, 'id', 'fabricId');
    }
}
