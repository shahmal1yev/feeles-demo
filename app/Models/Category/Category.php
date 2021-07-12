<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product\Product;

class Category extends Model
{
    use HasFactory;

    use \Astrotomic\Translatable\Translatable;

    public $translatedAttributes = ['name'];

    public $timestamps = false;

    public $hidden = ['created', 'updated'];

    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId', 'id');
    }
}