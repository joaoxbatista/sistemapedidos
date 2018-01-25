<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('number');
            $table->string('holder_name');
            $table->string('cnpj')->nullable();
            $table->string('cpf')->nullable();
            $table->string('agency');
            $table->string('acount_number');
            $table->date('due_date');
            $table->decimal('value');
            $table->boolean('status');
            
            $table->integer('bank_id')->nullable()->unsigned();
            $table->integer('order_id')->nullable()->unsigned();
            
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null')->onUpdate('cascade');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checks');
    }
}
