<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams');
            $table->unsignedBigInteger('event_id');
            $table->enum('status', [1, 0])->default(0);
            $table->datetime('join_date');
            $table->datetime('payment_due');
            $table->integer('gross_amount')->default(0);
            $table->unsignedBigInteger('aprroved_by')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->datetime('cancelled_at')->nullable();
            $table->text('cancellation_note')->nullable();
            $table->string('phone')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('aprroved_by')->references('id')->on('teams');
            $table->foreign('cancelled_by')->references('id')->on('teams');
            $table->softDeletes();
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
        Schema::dropIfExists('joins');
    }
}
