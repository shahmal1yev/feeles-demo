<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('categoryId');
            $table->decimal('price', 11, 2);

            $table->unsignedInteger('viewCount')->default(0);
            $table->unsignedInteger('saleCount')->default(0);
            
            $table->boolean('online')->default(false);

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::create('product_translations', function(Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('product_id');
            $table->string('locale')->index();

            $table->string('name', 255);
            $table->string('slug', 255);
            $table->text('desc');

            $table->unique([
                'product_id',
                'locale',
                'slug',
            ]);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
