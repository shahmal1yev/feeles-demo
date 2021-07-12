<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu\Dropdown\MenuItem as DropdownMenuItem;

class DropdownMenuItemFill extends Seeder
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
                'title_id' => 1,
                'link' => '#',
                'az' => ['label' => 'Şalvarlar'],
                'ru' => ['label' => 'Штаны'],
                'en' => ['label' => 'Pants']
            ],
            [
                'menu_item_id' => 3,
                'title_id' => 2,
                'link' => '#',
                'az' => ['label' => 'Ətəklər'],
                'ru' => ['label' => 'Юбки'],
                'en' => ['label' => 'Skirts']
            ],
            [
                'menu_item_id' => 4,
                'title_id' => 3,
                'link' => '#',
                'az' => ['label' => 'Jaketlər'],
                'ru' => ['label' => 'Пиджак'],
                'en' => ['label' => 'Jackets']
            ]
        ];

        foreach($data as $dataItem)
            DropdownMenuItem::create($dataItem);
    }
}
