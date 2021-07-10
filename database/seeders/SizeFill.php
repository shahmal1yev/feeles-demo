<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Size\Size;

class SizeFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
        	[
                'label' => 'XS',
                'number' => '34'
            ],
            [
                'label' => 'S',
                'number' => '36'
            ],
            [
                'label' => 'M',
                'number' => '38'
            ],
            [
                'label' => 'L',
                'number' => '40'
            ],
            [
                'label' => 'XL',
                'number' => '42'
            ],
            [
                'label' => '2XL',
                'number' => '44'
            ],
            [
                'label' => '3XL',
                'number' => '46'
            ],
            [
                'label' => '4XL',
                'number' => '48'
            ],
            [
                'label' => '5XL',
                'number' => '50'
            ]
        ];

        foreach($sizes as $size)
        {
        	Size::create($size);
        }
    }
}
