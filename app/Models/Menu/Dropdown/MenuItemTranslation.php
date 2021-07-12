<?php

namespace App\Models\Menu\Dropdown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemTranslation extends Model
{
    use HasFactory;

    public $table = 'dropdown_menu_item_translations';
    public $timestamps = false;

    public $fillable = [
        'label'
    ];

    public $hidden = [
        'created',
        'updated'
    ];
}
