<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnToJoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::enableForeignKeyConstraints();
        Schema::table('joins', function (Blueprint $table) {
            $table->dropForeign(['aprroved_by']);
            $table->dropForeign(['cancelled_by']);
            $table->dropColumn('aprroved_by');
            $table->dropColumn('cancelled_by');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('joins', function (Blueprint $table) {
            //
        });
    }
}
