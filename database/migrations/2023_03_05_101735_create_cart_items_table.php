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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->unsignedbigInteger('carts_id');
            $table->integer('total_price');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('products_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
                  $table->foreign('carts_id')
                        ->references('id')
                        ->on('carts')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
