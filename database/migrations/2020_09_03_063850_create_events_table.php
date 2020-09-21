<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status');
            $table->unsignedInteger('winner_id')->nullable();
            $table->unsignedInteger('participant');
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0)->nullable();
            $table->integer('fee')->default(0);
            $table->integer('prize_pool');
            $table->string('description');
            $table->string('rules');
            $table->integer('bracket_size');
            $table->string('bracket_type');
            $table->dateTime('registration_open');
            $table->dateTime('registration_close');
            $table->string('form_message');
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
        Schema::dropIfExists('events');

    }
}
