<?php

namespace App\Models\Menu\Dropdown\Group;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroupTitleTranslation extends Model
{
    use HasFactory;

    public $table = 'dropdown_group_title_translations';
    public $timestamps = false;

    public $fillable = [
        'title'
    ];
}
