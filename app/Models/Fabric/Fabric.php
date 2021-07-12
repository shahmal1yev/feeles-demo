<?php

namespace App\Models\Fabric;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product\ProductDetail;

class Fabric extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $table = 'fabrics';
    public $timestamps = false;

    public $translatedAttributes = [
        'name'
    ];

    public $fillable = [

    ];

    public $hidden = [
        'created',
        'updated'
    ];

    public function products()
    {
        return $this->hasMany(ProductDetail::class, 'fabricId', 'id');
    }
}
