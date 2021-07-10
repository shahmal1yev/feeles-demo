<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category\Category;

class CategoryFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	[
        		'az' => ['name' => 'Hamam xalatı'],
        		'en' => ['name' => 'Bathrobe']
        	],
        	[
        		'az' => ['name' => 'Pencək'],
        		'en' => ['name' => 'Jacket']
        	],
        	[
        		'az' => ['name' => 'Kostyum'],
        		'en' => ['name' => 'Suit'],
        	],
        	[
        		'az' => ['name' => 'Köynək'],
        		'en' => ['name' => 'Shirt'],
        	],
        	[
        		'az' => ['name' => 'Mayka'],
        		'en' => ['name' => 'T-shirt'],
        	],
        	[
        		'az' => ['name' => 'Palto'],
        		'en' => ['name' => 'Coat'],
        	],
        	[
        		'az' => ['name' => 'Pajamas'],
        		'en' => ['name' => 'Pyjamas'],
        	],
        	[
        		'az' => ['name' => 'Qalstuk'],
        		'en' => ['name' => 'Tie'],
        	],
        	[
        		'az' => ['name' => 'Yaylıq'],
        		'en' => ['name' => 'Headscarf'],
        	],
        	[
        		'az' => ['name' => 'Çimərlik kostyumları'],
        		'en' => ['name' => 'Beach suits'],
        	],
        	[
        		'az' => ['name' => 'Önlük'],
        		'en' => ['name' => 'Apron'],
        	],
        	[
        		'az' => ['name' => 'İdman kostyumlar'],
        		'en' => ['name' => 'Sports suits'],
        	],
        	[
        		'az' => ['name' => 'İstehsalat və peşə geyimlər'],
        		'en' => ['name' => 'Prefessional wear'],
        	],
        	[
        		'az' => ['name' => 'Şalvar'],
        		'en' => ['name' => 'Pants'],
        	],
        	[
        		'az' => ['name' => 'Şort'],
        		'en' => ['name' => 'Shorts'],
        	],
        	[
        		'az' => ['name' => 'Şərf'],
        		'en' => ['name' => 'Scarf'],
        	],
        	[
        		'az' => ['name' => 'Əlcək'],
        		'en' => ['name' => 'Gloves'],
        	],
        	[
        		'az' => ['name' => 'Ətək'],
        		'en' => ['name' => 'Skirt'],
        	],
        ];

        foreach($categories as $category)
        {
        	Category::create($category);
        }
    }
}
