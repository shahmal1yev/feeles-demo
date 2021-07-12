<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu\Dropdown\Group\MenuGroupTitle as DropdownGroupTitle;

class DropdownGroupTitleFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'menu_item_id' => 2,
                'az' => ['title' => 'Geyim'],
                'ru' => ['title' => 'Одежда'],
                'en' => ['title' => 'Clothing']
            ],
            [
                'menu_item_id' => 3,
                'az' => ['title' => 'Geyim'],
                'ru' => ['title' => 'Одежда'],
                'en' => ['title' => 'Clothing']
            ],
            [
                'menu_item_id' => 4,
                'az' => ['title' => 'Geyim'],
                'ru' => ['title' => 'Одежда'],
                'en' => ['title' => 'Clothing']
            ],
        ];

        foreach($data as $dataItem)
            DropdownGroupTitle::create($dataItem);
    }
}
