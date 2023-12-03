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
        Schema::create('myteam', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('game');
            $table->string('EXP Laner')->nullable();
            $table->string('Jungler')->nullable();
            $table->string('Mid Laner')->nullable();
            $table->string('Gold Laner')->nullable();
            $table->string('Roamer')->nullable();
            $table->string('Reserve_1')->nullable();
            $table->string('Reserve_2')->nullable();
            $table->string('Reserve_3')->nullable();
            $table->string('Reserve_4')->nullable();
            $table->string('Reserve_5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myteam');
    }
};
