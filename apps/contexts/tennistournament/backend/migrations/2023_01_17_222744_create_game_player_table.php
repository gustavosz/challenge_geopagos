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
        Schema::create('game_player', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_winner')->default(false);
            $table->unsignedBigInteger('game_id');

            $table->foreign('game_id')->references('id')->on('games');
            $table->foreignUuid('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_player');
    }
};
