<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('buy_date');
            $table->date('due_date')->nullable();

            $table->decimal('price_products', 10, 2);
            $table->decimal('price_discount', 10, 2);
            $table->decimal('price_final', 10, 2);
            $table->decimal('total_weight', 10, 2);

            $table->enum('payment_form', ['money', 'installment', 'check']);
            
            $table->boolean('status');
            
            $table->integer('seller_id')->nullable()->unsigned();
            $table->integer('client_id')->nullable()->unsigned();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('set null')->onUpdate('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
