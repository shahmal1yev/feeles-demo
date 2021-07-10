<?php

namespace App\Models\Hashtag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $translatedAttributes = ['label'];

    public $timestamps = false;

    public $fillable = [
        'link'
    ];

    public $hidden = [
        'created',
        'updated'
    ];
}