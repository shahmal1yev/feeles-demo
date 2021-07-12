<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Fabric\Fabric;

class FabricFill extends Seeder
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
                'az' => ['name' => 'Şifon'],
                'ru' => ['name' => 'Шифон'],
                'en' => ['name' => 'Chiffon'],
            ],
            [
                'az' => ['name' => 'Koton'],
                'ru' => ['name' => 'Хлопок'],
                'en' => ['name' => 'Cotton'],
            ],
            [
                'az' => ['name' => 'Krep'],
                'ru' => ['name' => 'Креп'],
                'en' => ['name' => 'Crepe'],
            ],
            [
                'az' => ['name' => 'Cins'],
                'ru' => ['name' => 'Джинсы'],
                'en' => ['name' => 'Jeans'],
            ],
            [
                'az' => ['name' => 'Krujeva'],
                'ru' => ['name' => 'Кружево'],
                'en' => ['name' => 'Lace'],
            ],
            [
                'az' => ['name' => 'Dəri'],
                'ru' => ['name' => 'Натуральная кожа'],
                'en' => ['name' => 'Leather'],
            ],
            [
                'az' => ['name' => 'Kətan'],
                'ru' => ['name' => 'Белье'],
                'en' => ['name' => 'Linen'],
            ],
            [
                'az' => ['name' => 'Saten'],
                'ru' => ['name' => 'Атлас'],
                'en' => ['name' => 'Satin'],
            ],
            [
                'az' => ['name' => 'İpək'],
                'ru' => ['name' => 'Шелк'],
                'en' => ['name' => 'Silk'],
            ],
            [
                'az' => ['name' => 'Sintetik'],
                'ru' => ['name' => 'Синтетический'],
                'en' => ['name' => 'Synthetic'],
            ],
            [
                'az' => ['name' => 'Məxmər'],
                'ru' => ['name' => 'Бархат'],
                'en' => ['name' => 'Velvet'],
            ],
            [
                'az' => ['name' => 'Yun'],
                'ru' => ['name' => 'Шерсть'],
                'en' => ['name' => 'Wool'],
            ],  
        ];

        foreach($data as $dataItem)
            Fabric::create($dataItem);

    }
}
