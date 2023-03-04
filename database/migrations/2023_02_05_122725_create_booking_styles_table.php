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
        Schema::create('booking_styles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('fashion_bookings_id');
            $table->foreign('fashion_bookings_id')
                  ->references('id')
                  ->on('fashion_bookings')
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
        Schema::dropIfExists('booking_styles');
    }
};
