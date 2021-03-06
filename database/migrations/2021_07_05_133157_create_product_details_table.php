<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('productId');
            $table->unsignedInteger('colorId');
            $table->unsignedInteger('sizeId');
            $table->unsignedInteger('classGroupId');
            $table->unsignedInteger('fabricId');
            $table->unsignedInteger('discount')->default(0);

            $table->unsignedInteger('stock');

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('colorId')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('sizeId')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('classGroupId')->references('id')->on('class_groups')->onDelete('cascade');
            $table->foreign('fabricId')->references('id')->on('fabrics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
