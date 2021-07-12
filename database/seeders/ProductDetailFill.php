<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product\ProductDetail;

class ProductDetailFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDetails = [
        	[
        		'productId' => 1,
        		'colorId' => 1,
        		'sizeId' => 1,
        		'stock' => 6,
				'classGroupId' => 1,
				'fabricId' => 1,
        	],
        	[
        		'productId' => 1,
        		'colorId' => 2,
        		'sizeId' => 2,
        		'stock' => 6,
				'classGroupId' => 1,
				'fabricId' => 1,
        	],
        	[
        		'productId' => 2,
        		'colorId' => 1,
        		'sizeId' => 1,
        		'stock' => 6,
				'classGroupId' => 2,
				'fabricId' => 1,
        	],
        	[
        		'productId' => 2,
        		'colorId' => 2,
        		'sizeId' => 2,
        		'stock' => 6,
				'classGroupId' => 2,
				'fabricId' => 1,
        	]
        ];

        foreach($productDetails as $productDetail)
        {
        	ProductDetail::create($productDetail);
        }
    }
}
