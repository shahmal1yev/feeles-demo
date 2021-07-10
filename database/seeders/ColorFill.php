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
        		'en' => ['name' => 'Blue'],
        	],
        	[
        		'hex' => '#6610f2',
        		'az' => ['name' => 'İndiqo'],
        		'en' => ['name' => 'Indigo']
        	],
        	[
        		'hex' => '#6f42c1',
        		'az' => ['name' => 'Bənövşəyi'],
        		'en' => ['name' => 'Purple']
        	],
        	[
        		'hex' => '#d63384',
        		'az' => ['name' => 'Çəhrayı'],
        		'en' => ['name' => 'Pink']
        	],
        	[
        		'hex' => '#dc3545',
        		'az' => ['name' => 'Qırmızı'],
        		'en' => ['name' => 'Red']
        	],
        	[
        		'hex' => '#fd7e14',
        		'az' => ['name' => 'Narıncı'],
        		'en' => ['name' => 'Orange']
        	],
        	[
        		'hex' => '#ffc107',
        		'az' => ['name' => 'Sarı'],
        		'en' => ['name' => 'Yellow']
        	],
        	[
        		'hex' => '#198754',
        		'az' => ['name' => 'Yaşıl'],
        		'en' => ['name' => 'Green']
        	],
        	[
        		'hex' => '#20c997',
        		'az' => ['name' => 'Çay rəngi'],
        		'en' => ['name' => 'Teal']
        	],
        	[
        		'hex' => '#0dcaf0',
        		'az' => ['name' => 'Açıq mavi'],
        		'en' => ['name' => 'Cyan']
        	],
        ];

        foreach($colors as $color)
        {
        	Color::create($color);
        }
    }
}
