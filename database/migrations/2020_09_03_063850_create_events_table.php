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
            $table->enum('status', ['1', '0'])->default('1');
            $table->unsignedInteger('participant');
            $table->string('banner_url')->nullable();
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0)->nullable();
            $table->string('description');
            $table->integer('fee')->default(0);
            $table->integer('prize_pool')->nullable();
            $table->string('rules');
            $table->string('img')->nullable();
            $table->enum('bracket_type', ['1', '2'])->default('1');
            $table->enum('comeback', ['0', '1'])->default('0');
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
