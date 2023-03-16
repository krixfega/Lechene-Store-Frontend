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
        Schema::create('fibrics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('typeOrColors');
            $table->string('category');
            $table->string('qty');
            $table->string('selling_price');
            $table->string('cost_price');
            $table->mediumText('details');
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
        Schema::dropIfExists('fibrics');
    }
};
