<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Hashtag\Hashtag;

class HashtagFill extends Seeder
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
                'link' => '#',
                'az' => ['label' => 'Don'],
                'en' => ['label' => 'Dress'],
            ],
            [
                'link' => '#',
                'az' => ['label' => 'Köynək'],
                'en' => ['label' => 'T-shirt']
            ]

        ];

        foreach($data as $dataItem)
        {
            Hashtag::create($dataItem);
        }
    }
}
