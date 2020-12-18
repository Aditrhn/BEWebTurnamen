<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnToJoinsAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('joins', function (Blueprint $table) {
            $table->string('approved_by')->nullable()->after('gross_amount');
            $table->string('cancelled_by')->nullable()->after('approved_at');
            $table->datetime('join_date')->nullable()->change();
            $table->datetime('payment_due')->nullable()->change();
            $table->string('payment_note', 255)->nullable()->change();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->string('order_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('joins_again', function (Blueprint $table) {
            //
        });
    }
}
