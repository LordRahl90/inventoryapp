<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_sub_category_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->double('price',30, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_sub_category_id')->references('id')->on('product_sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
