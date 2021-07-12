<?php

namespace App\Models\ClassGroup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product\ProductDetail;

class ClassGroup extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $table = 'class_groups';
    public $timestamps = false;

    public $translatedAttributes = [
        'name'
    ];

    public $fillable = [];

    public $hidden = [
        'created',
        'updated'
    ];

    public function products()
    {
        return $this->hasMany(ProductDetail::class, 'classGroupId', 'id');
    }    
}
