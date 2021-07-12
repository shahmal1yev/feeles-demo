<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemTranslation extends Model
{
    use HasFactory;

    public $table = 'menu_item_translations';
    public $timestamps = false;

    public $fillable = [
        'label'
    ];
}
