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
        Schema::create('outputs_details', function (Blueprint $table) {
            $table->id();

            $table->double('amount'); //cantidad que sale del almacen
            $table->double('sale_price'); //precio de venta de la salida

               //llaves foraneas
               $table->unsignedBigInteger('output_id'); //id de la salida
               $table->unsignedBigInteger('product_id'); //id del producto
               $table->unsignedBigInteger('client_id'); //id del cliente que adquiere la salida
               $table->unsignedBigInteger('employee_id'); //id del trabajador que registra la salida

               //creacion de llaves foraneas 
               $table->foreign('output_id')->references('id')->on('outputs');
               $table->foreign('product_id')->references('id')->on('products');
               $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('outputs_details');
    }
};
