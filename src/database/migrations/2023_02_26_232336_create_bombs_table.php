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
        Schema::create('bombs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('type');
            $table->integer('price');
            $table->text('location_country');
            $table->text('manufacturing_country');
            $table->integer('stock');
            $table->text('image');
            $table->integer('destruction_power');
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
        Schema::dropIfExists('bombs');
    }
};
