<?php

namespace App\Models\Menu\Dropdown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Menu\MenuItem as MainMenuItem;
use App\Models\Menu\Dropdown\Group\MenuGroupTitle as DropdownItemTitle;

class MenuItem extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $table = "dropdown_menu_items";
    public $timestamps = false;

    public $translatedAttributes = [
        'label'
    ];

    public $fillable = [
        'title_id',
        'menu_item_id',        
        'link'
    ];

    public $hidden = [
        'created',
        'updated'
    ];

    public function menuItem()
    {
        return $this->belongsTo(MainMenuItem::class, 'menu_item_id', 'id');
    }

    public function title()
    {
        return $this->belongsTo(DropdownItemTitle::class, 'title_id', 'id');
    }
}
