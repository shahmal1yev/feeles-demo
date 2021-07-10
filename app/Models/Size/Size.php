<?php

namespace App\Models\Size;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['label', 'number'];
    public $hidden = ['created', 'updated'];
}