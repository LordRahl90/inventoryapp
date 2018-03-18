<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderID')->unsigned();
            $table->integer('productID')->unsigned();
            $table->integer('quantity');
            $table->double('price', 30, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('orderID')->references('id')->on('orders');
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
        Schema::drop('order_details');
    }
}
