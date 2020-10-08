<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relationship extends Migration
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
            $table->foreignId('admin_id')->nullable()->constrained('games');
            $table->foreignId('game_id')->nullable()->constrained('games');
            $table->foreignId('winner_id')->nullable()->constrained('teams');
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->foreignId('teams_id')->nullable()->constrained('teams');
            $table->foreignId('players_id')->nullable()->constrained('players');
        });
        Schema::table('teams', function (Blueprint $table) {
            $table->foreignId('games_id')->constrained('games');
        });
        // Schema::table('payments')
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
