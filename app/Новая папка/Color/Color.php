<?php

namespace App\Models\Admin\Color;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $timestamps = false;

    public $translatedAttributes = ['name'];

    public $fillable = ['hex'];

    public $hidden = ['created', 'updated'];
}