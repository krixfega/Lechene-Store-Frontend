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

      

       

          Schema::create('products_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        }); 
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('products_categories_id');
           
            $table->string('size');
            $table->string('qty');
            $table->string('cost_price');
            $table->string('selling_price');
            $table->string('discounted_price');
            $table->longText('details');
          $table->foreign('products_categories_id')
            ->references('id')
            ->on('products_categories')
            ->onDelete('cascade');
          

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
        Schema::dropIfExists('products_categories');
        
        
    }
};
