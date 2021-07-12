<?php

namespace App\Models\Fabric;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricTranslation extends Model
{
    use HasFactory;

    public $table = 'fabric_translations';
    public $timestamps = false;

    public $fillable = [
        'name'
    ];
}
