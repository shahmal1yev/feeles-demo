<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    public $table = 'category_translations';
    public $timestamps = false;
    
    public $fillable = [
        'name'
    ];
}
