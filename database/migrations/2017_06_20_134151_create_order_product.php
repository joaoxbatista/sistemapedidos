<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('product_quantity');
            $table->decimal('item_discount', 10, 2)->nullable();
            $table->decimal('item_price', 10, 2)->nullable();
            $table->decimal('item_total_price', 10, 2)->nullable();
            $table->decimal('item_weight', 10, 2)->nullable();
            
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_product');
    }
}
