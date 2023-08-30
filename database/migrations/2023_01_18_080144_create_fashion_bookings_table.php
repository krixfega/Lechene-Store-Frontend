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
        Schema::create('fashion_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('fabrics_id');
            $table->string('booking_no');
            $table->string('fullName');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('email');
            $table->string('gender');
            $table->string('qty');
            $table->integer('income');
            $table->string('pickupDate');
            $table->string('bookingStatus')->default('pending');
            $table->mediumText('desc')->nullable();
            $table->timestamps();
            $table->foreign('fabrics_id')
            ->references('id')
            ->on('fibrics')
            ->onDelete('cascade');
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('fashion_bookings');
    }
};
