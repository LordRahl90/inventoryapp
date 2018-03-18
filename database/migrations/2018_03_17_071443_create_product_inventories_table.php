<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductInventoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productID')->unsigned();
            $table->string('inventoryRef');
            $table->double('quantity_in', 30, 2);
            $table->double('quantity_out', 30, 2);
            $table->text('narration');
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
        Schema::drop('product_inventories');
    }
}
