<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_games', function (Blueprint $table) {
            $table->foreignId('players_id')->constrained('players');
            $table->foreignId('games_id')->constrained('games');
        });

        Schema::table('rosters', function (Blueprint $table) {
            $table->foreignId('events_id')->constrained('events');
            $table->foreignId('teams_id')->constrained('teams');
            $table->foreignId('players_id')->constrained('players');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users');
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->foreignId('teams_id')->nullable()->constrained('teams');
            $table->foreignId('players_id')->nullable()->constrained('players');
        });
        Schema::table('teams', function (Blueprint $table) {
            $table->foreignId('games_id')->constrained('games');
            $table->foreignId('capt_id')->references('players_id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
