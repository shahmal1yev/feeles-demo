<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'azLabel',
        'ruLabel',
        'enLabel',
        'label',
        'link'
    ];

    public $hidden = [
        'created',
        'updated'
    ];
}
