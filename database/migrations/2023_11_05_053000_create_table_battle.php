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
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->integer('league_id');
            $table->longText('brief_info');
            $table->longText('instructions');
            $table->integer('transfer_rule')->default(0);

            $table->longText('reserve_rule');
            $table->integer('reserve_isOn')->default(0);
            $table->integer('reserve_limit')->default(0);

            $table->longText('player_rule');
            $table->integer('player_isOn')->default(0);
            $table->integer('player_limit')->default(0);
            $table->longText('scoring');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game');
    }
};
