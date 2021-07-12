<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Menu\Dropdown\MenuItem as DropdownMenuItem;
use App\Models\Menu\Dropdown\Group\MenuGroupTitle as DropdownMenuItemGroup;

class MenuItem extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $table = 'menu_items';
    public $timestamps = false;

    public $translatedAttributes = [
        'label',
        'link'
    ];

    public $fillable = [
        'dropdown'
    ];

    public function dropdownItems()
    {
        return $this->hasMany(DropdownMenuItem::class, 'menu_item_id', 'id');
    }

    public function titles()
    {
        return $this->hasMany(DropdownMenuItemGroup::class, 'menu_item_id', 'id');
    }
}