<?php

namespace App\Models\Subbanner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubbannerTranslation extends Model
{
    use HasFactory;

    public $table = 'subbanner_translations';
    public $timestamps = false;

    public $fillable = [
        'link',
        'label'
    ];
}
