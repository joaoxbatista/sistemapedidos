<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity')->nullable();
            
            
            $table->integer('provider_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();


            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('set null')->onUpdate('cascade');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');    

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
        Schema::dropIfExists('products');
    }
}
