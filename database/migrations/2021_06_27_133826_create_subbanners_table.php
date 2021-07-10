<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubbannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subbanners', function (Blueprint $table) {
            $table->increments('id');

            $table->string('label', 255);
            $table->string('disk', 255);
            $table->string('source', 255);
            $table->string('path', 255);
            $table->string('name')->unique();
            $table->string('link', 255);

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subbanners');
    }
}
