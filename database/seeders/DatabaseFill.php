<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

class DatabaseFill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            HashtagFill::class,
        	SizeFill::class,
        	ColorFill::class,
        	CategoryFill::class,
            FabricFill::class,
            ClassGroupFill::class,
        	ProductFill::class,
        	ProductImageFill::class,
        	ProductDetailFill::class,
            MenuItemFill::class,
            DropdownGroupTitleFill::class,
            DropdownMenuItemFill::class
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
