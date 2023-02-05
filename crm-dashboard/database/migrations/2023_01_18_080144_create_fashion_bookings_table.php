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
         $table->unsignedBigInteger('fabrics_id');
         $table->string('booking_no');
            $table->string('fullname');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('email');
            $table->string('gender');
            $table->string('qty');
            $table->integer('income');
            $table->string('pickupDate');
            $table->string('booking_status')->default('pending');
            $table->mediumText('comment')->nullable();
            $table->string('order')->nullable();
            $table->string('bustFrontArc')->nullable();
            $table->string('corsetLength')->nullable();
            $table->string('Length3_4')->nullable();
            $table->string('bustBackArc')->nullable();
            $table->string('shortSleeveElbow')->nullable();
            $table->string('shortSleeveRoundElbow')->nullable();
            $table->string('shortSleeveFullSleeveLength')->nullable();
            $table->string('neck')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('OffShoulder')->nullable();
            $table->string('upperBust')->nullable();
            $table->string('bust')->nullable();
            $table->string('underBust')->nullable();
            $table->string('bustPoint')->nullable();
            $table->string('N_N')->nullable();
            $table->string('acrossF_B')->nullable();
            $table->string('halfLengthF_B')->nullable();
            $table->string('topLength')->nullable();
            $table->string('waist_highwaist')->nullable();
            $table->string('hip_hipLength')->nullable();
            $table->string('thigh_knee_ankle')->nullable();
            $table->string('kneeCircumfrence')->nullable();
            $table->string('shoulderToHip_knee')->nullable();
            $table->string('waistToknee')->nullable();
            $table->string('armhole_hicep')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('roundSleeve')->nullable();
            $table->string('wrist')->nullable();
            $table->string('trouserLength')->nullable();
            $table->string('fullLength')->nullable();
            $table->string('dressLength')->nullable();
            $table->string('shirt_Trouser')->nullable();
            $table->string('Length')->nullable();
            $table->string('RoundKnee')->nullable();
            $table->string('KneeLength')->nullable();
            $table->string('waist_hips')->nullable();
            $table->string('thigh')->nullable();
            $table->string('ankle')->nullable();
            $table->string('crotchF_B')->nullable();
            $table->timestamps();
            $table->foreign('fabrics_id')
            ->references('id')
            ->on('fibrics')
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
