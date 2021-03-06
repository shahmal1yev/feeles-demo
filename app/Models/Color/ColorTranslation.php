<?php

namespace App\Models\Color;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorTranslation extends Model
{
    use HasFactory;

    public $table = 'color_translations';
    public $timestamps = false;

    public $fillable = [
        'name'
    ];
}