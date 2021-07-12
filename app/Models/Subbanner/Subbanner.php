<?php

namespace App\Models\Subbanner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbanner extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $table = 'subbanners';
    public $timestamps = false;

    public $translatedAttributes = [
        'label'
    ];

    public $fillable = [
        'disk',
        'source',
        'path',
        'name',
        'link'
    ];

    public $hidden = [
        'created',
        'updated'
    ];
}
