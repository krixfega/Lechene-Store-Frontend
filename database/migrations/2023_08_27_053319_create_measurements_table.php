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
        Schema::create('measurements', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('neck')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('frontArc')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('topLength')->nullable();
            $table->string('trouserLength')->nullable();
            $table->string('armHole')->nullable();
            $table->string('roundSleeve')->nullable();
            $table->string('thigh')->nullable();
            $table->string('knee')->nullable();
            $table->string('crotch')->nullable();
            $table->string('upperBust')->nullable();
            $table->string('bust')->nullable();
            $table->string('N_N')->nullable();
            $table->string('underBust')->nullable();
            $table->string('bustPoint')->nullable();
            $table->string('halfLength')->nullable();
            $table->string('halfLengthBack')->nullable();
            $table->string('highWaist')->nullable();
            $table->string('shoulderToknee')->nullable();
            $table->string('shoulderToHip')->nullable();
            $table->string('fullLength')->nullable();
            $table->string('dressLength')->nullable();
            $table->string('sleeveLength')->nullable();
            $table->string('calf')->nullable();
            $table->string('chest')->nullable();
            $table->string('stomach')->nullable();
            $table->string('topHip')->nullable();
            $table->string('biceps')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('waistToKnee')->nullable();
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('measurements');
    }
};
