<?php

namespace App\Models\Subbanner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbanner extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'label',
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
