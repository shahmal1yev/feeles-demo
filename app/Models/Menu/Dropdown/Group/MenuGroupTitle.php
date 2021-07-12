<?php

namespace App\Models\Menu\Dropdown\Group;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Menu\Dropdown\MenuItem as DropdownItem;

class MenuGroupTitle extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $table = 'dropdown_group_titles';
    public $timestamps = false;

    public $translatedAttributes = [
        'title'
    ];

    public $fillable = [
        'menu_item_id'
    ];

    public $hidden = [
        'created',
        'updated'
    ];

    public function group()
    {
        return $this->hasMany(DropdownItem::class, 'title_id', 'id');
    }
}
