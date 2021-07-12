<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropdownMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdown_menu_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('title_id');
            $table->unsignedInteger('menu_item_id');

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('title_id')
            ->references('id')
            ->on('dropdown_group_titles')
            ->onDelete('cascade');
            
            $table->foreign('menu_item_id')
            ->references('id')
            ->on('menu_items')
            ->onDelete('cascade');
        });

        Schema::create('dropdown_menu_item_translations', function(Blueprint $table){
            $table->increments('id');

            $table->unsignedInteger('menu_item_id');
            $table->string('locale')->index();

            $table->string('label', 255);
            $table->string('link', 255);

            $table->unique([
                'menu_item_id',
                'locale'
            ], 'dropdown_menu_item_translation_uniques');

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('menu_item_id')->references('id')->on('dropdown_menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dropdown_menu_items');
    }
}
