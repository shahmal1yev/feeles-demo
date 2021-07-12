<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ClassGroup\ClassGroup;

class ClassGroupFill extends Seeder
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
                'az' => ['name' => 'Kişilər'],
                'ru' => ['name' => 'Мужчины'],
                'en' => ['name' => 'Men'],
            ],
            [
                'az' => ['name' => 'Qadınlar'],
                'ru' => ['name' => 'Женщины'],
                'en' => ['name' => 'Women'],
            ],
            [
                'az' => ['name' => 'Uşaqlar'],
                'ru' => ['name' => 'Дети'],
                'en' => ['name' => 'Children'],
            ],
        ];

        foreach($data as $dataItem)
            ClassGroup::create($dataItem);
    }
}
