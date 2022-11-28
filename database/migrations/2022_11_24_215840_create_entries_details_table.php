<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries_details', function (Blueprint $table) {
            $table->id();
            $table->double('amount'); //cantidad que entra al almacen
            $table->double('price'); //precio de compra

            //llaves foraneas
            $table->unsignedBigInteger('entrie_id'); //id de la entrada
            $table->unsignedBigInteger('product_id'); //id del producto
            $table->unsignedBigInteger('employee_id'); //id del trabajador


               //creacion de llaves foraneas 
               $table->foreign('entrie_id')->references('id')->on('entries');
               $table->foreign('product_id')->references('id')->on('products');
               $table->foreign('employee_id')->references('id')->on('employees');

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
        Schema::dropIfExists('entries_details');
    }
};
