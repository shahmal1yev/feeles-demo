<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropdownGroupTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdown_group_titles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('menu_item_id');
            
            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        });

        Schema::create('dropdown_group_title_translations', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('menu_group_title_id');
            $table->string('locale')->index();

            $table->string('title', 255);

            $table->unique([
                'menu_group_title_id',
                'locale'
            ], 'dropdown_group_title_translation_uniques');

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('menu_group_title_id', 'mgt_unique')->references('id')->on('dropdown_group_titles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dropdown_group_titles');
    }
}
