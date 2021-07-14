<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Color\Color;

class ColorFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
        	[
        		'hex' => '#0d6efd',
        		'az' => ['name' => 'Mavi'],
				'ru' => ['name' => 'Синий'],
        		'en' => ['name' => 'Blue'],
        	],
        	[
        		'hex' => '#6610f2',
        		'az' => ['name' => 'İndiqo'],
				'ru' => ['name' => 'Индиго'],
        		'en' => ['name' => 'Indigo']
        	],
        	[
        		'hex' => '#6f42c1',
        		'az' => ['name' => 'Bənövşəyi'],
				'ru' => ['name' => 'Фиолетовый'],
        		'en' => ['name' => 'Purple']
        	],
        	[
        		'hex' => '#d63384',
        		'az' => ['name' => 'Çəhrayı'],
				'ru' => ['name' => 'Розовый'],
        		'en' => ['name' => 'Pink']
        	],
        	[
        		'hex' => '#dc3545',
        		'az' => ['name' => 'Qırmızı'],
				'ru' => ['name' => 'Kрасный'],
        		'en' => ['name' => 'Red']
        	],
        	[
        		'hex' => '#fd7e14',
        		'az' => ['name' => 'Narıncı'],
				'ru' => ['name' => 'Оранжевый'],
        		'en' => ['name' => 'Orange']
        	],
        	[
        		'hex' => '#ffc107',
        		'az' => ['name' => 'Sarı'],
				'ru' => ['name' => 'Желтый'],
        		'en' => ['name' => 'Yellow']
        	],
        	[
        		'hex' => '#198754',
        		'az' => ['name' => 'Yaşıl'],
				'ru' => ['name' => 'Зеленый'],
        		'en' => ['name' => 'Green']
        	],
        	[
        		'hex' => '#20c997',
        		'az' => ['name' => 'Çay rəngi'],
				'ru' => ['name' => 'Бирюзовый'],
        		'en' => ['name' => 'Teal']
        	],
        	[
        		'hex' => '#0dcaf0',
        		'az' => ['name' => 'Açıq mavi'],
				'ru' => ['name' => 'Голубой'],
        		'en' => ['name' => 'Cyan']
        	],
        ];

        foreach($colors as $color)
        {
        	Color::create($color);
        }
    }
}
