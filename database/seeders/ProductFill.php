<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product\Product;

use Illuminate\Support\Str;

class ProductFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        	[
        		'categoryId' => 1,
        		'price' => 22.9,
        		'viewCount' => 89,
        		'saleCount' => 12,
        		'online' => true,
        		'az' => [
                    'name' => 'Convense / Polo Qısaqol Köynək',
                    'slug' => Str::slug('Convense / Polo Qısaqol Köynək'),
        			'desc' => 'AZ desc'
        		],
        		'en' => [
                    'name' => 'Convense / Polo T-shirt',
                    'slug' => Str::slug('Convense / Polo T-shirt'),
        			'desc' => 'EN desc'
				],
				'ru' => [
                    'name' => 'Футболка Convense / Polo',
                    'slug' => Str::slug('Футболка Convense / Polo'),
        			'desc' => 'RU desc'
        		]
        	],
        	[
        		'categoryId' => 1,
        		'price' => 22.9,
        		'viewCount' => 89,
        		'saleCount' => 12,
        		'online' => true,
        		'az' => [
                    'name' => 'Tommy Hilfigher Uzunqol Köynək',
                    'slug' => Str::slug('Tommy Hilfigher Uzunqol Köynək'),
        			'desc' => 'AZ desc'
        		],
        		'en' => [
                    'name' => 'Tommy Hilfigher Long-sleeved shirt',
                    'slug' => Str::slug('Tommy Hilfigher Long-sleeved shirt'),
        			'desc' => 'EN desc'
        		],
				'ru' => [
                    'name' => 'Рубашка Tommy Hilfiger с длинными рукавами',
                    'slug' => Str::slug('Рубашка Tommy Hilfiger с длинными рукавами'),
        			'desc' => 'RU desc'
        		]
        	]
        ];

        foreach($products as $product)
        {
        	Product::create($product);
        }
    }
}
