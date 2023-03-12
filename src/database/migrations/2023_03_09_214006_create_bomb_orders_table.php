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
        Schema::create('bomb_orders', function (Blueprint $table) {
            $table->id();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('bomb_id')->references('id')->on('bombs')->onDelete('cascade');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bomb_orders');
    }
};
