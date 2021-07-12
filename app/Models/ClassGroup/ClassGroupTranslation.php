<?php

namespace App\Models\ClassGroup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroupTranslation extends Model
{
    use HasFactory;

    public $table = 'class_group_translations';

    public $timestamps = false;

    public $fillable = [
        'name'
    ];
}
