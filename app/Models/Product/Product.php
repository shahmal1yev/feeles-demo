<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category\Category;

class Product extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $timestamps = false;

    public $translatedAttributes = [
        'name', 
        'desc',
        'slug'
    ];

    public $fillable = [
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
