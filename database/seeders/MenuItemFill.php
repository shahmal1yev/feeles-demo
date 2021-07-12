<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu\MenuItem;

class MenuItemFill extends Seeder
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
                'link' => '/',
                'az' => ['label' => 'Anasəhifə'],
                'ru' => ['label' => 'Домашняя страница'],
                'en' => ['label' => 'Home'],
            ],
            [
                'link' => '/#',
                'dropdown' => true,
                'az' => ['label' => 'Kişilər'],
                'ru' => ['label' => 'Мужчины'],
                'en' => ['label' => 'Men'],
            ],
            [
                'link' => '/#',
                'dropdown' => true,
                'az' => ['label' => 'Qadınlar'],
                'ru' => ['label' => 'Женщины'],
                'en' => ['label' => 'Women'],
            ],
            [
                'link' => '/#',
                'dropdown' => true,
                'az' => ['label' => 'Uşaqlar'],
                'ru' => ['label' => 'Дети'],
                'en' => ['label' => 'Children']
            ],
            [
                'link' => '/about',
                'az' => ['label' => 'Haqqımızda'],
                'ru' => ['label' => 'О нас'],
                'en' => ['label' => 'About']
            ],
        ];

        foreach($data as $dataItem)
            MenuItem::create($dataItem);
    }
}
