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
        Schema::create('player', function (Blueprint $table) {
            $table->id();

            // Player Details
            $table->string('name');
            $table->string('team'); // Supposed ID
            $table->string('nationality');
            $table->string('picture');
            $table->string('role'); // 0 - EXP, 1 - Jungler, 2 - Mid, 3 - Gold, 4 - Roamer
            $table->integer('kda')->default(0);
            $table->integer('dpm')->default(0);
            $table->integer('gpm')->default(0);
            
            // Point Calculation
            $table->integer('league');
            $table->integer('status')->default(1); // 0 - eliminated,
            $table->integer('bonus_point')->default(0);
            $table->integer('kda_point')->default(0);
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player');
    }
};
