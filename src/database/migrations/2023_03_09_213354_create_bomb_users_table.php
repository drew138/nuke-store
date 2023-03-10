<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bomb_users', function (Blueprint $table) {
            $table->id();
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('bomb')->references('id')->on('bombs');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bomb_users');
    }
};
