<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductProcurementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_procurements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productID')->unsigned();
            $table->string('documentRef');
            $table->text('narration');
            $table->integer('quantity');
            $table->double('price', 30, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('productID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_procurements');
    }
}
