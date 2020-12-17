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
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->enum('status', [1, 0])->default(0);
            $table->datetime('join_date')->nullable();
            $table->datetime('payment_due')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->datetime('cancelled_at')->nullable(); //payment dibatalkan kapan?
            $table->text('cancellation_note')->nullable(); //payment dibatalkan kenpa?
            $table->string('code_order_id'); //   "order_id": "Postman-1578568851",
            $table->string('gross_amount'); //   "gross_amount": "10000.00",
            $table->string('payment_type')->nullable(); //   "payment_type": "credit_card",
            $table->string('payment_duration')->nullable();
            $table->string('payment_note')->nullable(); //for transaction status
            $table->string('_token')->nullable();
            $table->string('redirect_url')->nullable();
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
