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
            $table->string('bank');
            $table->boolean('status');
            $table->date('due_date');
            $table->string('agency');
            $table->string('acount_number');
            $table->decimal('value');
            $table->string('holder_name');
            $table->string('cnpj')->nullable();
            $table->string('cpf')->nullable();
            $table->integer('parcel_id')->unsigned();
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('no action')->onUpdate('cascade');
            $table->timestamps();
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
