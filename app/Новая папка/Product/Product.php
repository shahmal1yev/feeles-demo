<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $timestamps = false;

    public $translatedAttributes = ['description'];

    public $fillable = [
    	'name',
    	'categoryId',
    	'price',
    	'viewCount',
    	'saleCount'
    ];

    public function category()
    {
    	return $this->hasOne(Category::class, 'id', 'categoryId');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'productId', 'id');
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class, 'productId', 'id');
    }
}