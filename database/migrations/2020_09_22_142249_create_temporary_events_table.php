<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('games_id');
            $table->enum('status', ['0','1'])->default('0');
            $table->unsignedInteger('participant');
            $table->string('banner_url')->nullable();
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0)->nullable();
            $table->string('description');
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
        Schema::dropIfExists('temporary_event');
    }
}
