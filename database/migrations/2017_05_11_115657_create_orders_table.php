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
            $table->decimal('total', 10, 2);
            $table->date('due_date')->nullable();
            $table->boolean('status');
            $table->integer('saller_id')->nullable()->unsigned();
            $table->integer('client_id')->nullable()->unsigned();

            $table->foreign('saller_id')->references('id')->on('sallers')->onDelete('set null')->onUpdate('set null');
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
