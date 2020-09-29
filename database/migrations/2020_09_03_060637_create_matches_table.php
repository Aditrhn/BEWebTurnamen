<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('round_number');
            $table->unsignedInteger('match_number');
            $table->unsignedInteger('team_a')->nullable();
            $table->unsignedInteger('team_b')->nullable();
            $table->unsignedInteger('score_a')->nullable();
            $table->unsignedInteger('score_b')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
