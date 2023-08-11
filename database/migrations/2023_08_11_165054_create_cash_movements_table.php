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
        Schema::create('cash_movements', function (Blueprint $table) {
            $table->id();
            $table->integer('cash');
            $table->unsignedBigInteger('cash_movement_type_id')->nullable();
            $table->foreign('cash_movement_type_id')->references('id')->on('cash_movement_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_movements', function (Blueprint $table) {
            $table->dropForeign('cash_movement_type_id');
        });
        Schema::dropIfExists('cash_movements');
    }
};
