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
        Schema::create('player_tournament', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('player_id')->references('id')->on('players');
            $table->foreignUuid('tournament_id')->references('id')->on('tournaments');
            $table->boolean('is_winner')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_tournament');
    }
};