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
            $table->unsignedInteger('participant')->nullable();
            $table->string('banner_url')->nullable();
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0)->nullable();
            $table->string('description');
            $table->integer('fee')->default(0);
            $table->integer('prize_pool')->nullable();
            $table->string('rules')->nullable();
            $table->enum('bracket_type', ['1','2'])->default('1');
            $table->dateTime('registration_open')->nullable();
            $table->dateTime('registration_close')->nullable();
            $table->string('form_message')->nullable();
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
