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
            $table->string('name');
            $table->string('type');
            $table->float('price', 10, 2);
            $table->string('location_country');
            $table->string('manufacturing_country');
            $table->integer('stock');
            $table->string('image');
            $table->float('destruction_power', 10, 2);
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
