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
        Schema::create('score', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('game_id')->default(1);
            $table->float('day1')->default(0);
            $table->float('day2')->default(0);
            $table->float('day3')->default(0);
            $table->float('day4')->default(0);
            $table->float('day5')->default(0);
            $table->float('day6')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score');
    }
};
