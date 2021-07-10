<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public $timestamps = false;

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