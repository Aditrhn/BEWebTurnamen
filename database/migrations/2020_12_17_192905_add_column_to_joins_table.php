<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('joins', function (Blueprint $table) {
            $table->string('gross_amount')->nullable()->change();
            $table->string('code_order_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_note')->nullable();
            $table->string('_token')->nullable();
            $table->string('redirect_url')->nullable();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->renameColumn('bill_key', 'mandiri_bill_key')->nullable();
            $table->renameColumn('biller_code', 'mandiri_biller_code')->nullable();
            $table->dropForeign(['order_id']);
            $table->string('code_order_id')->nullable();
            $table->string('gross_amount')->change(); //   "gross_amount": "10000.00",
            $table->string('signature_key')->nullable();
            $table->string('merchant_id')->nullable(); //   "merchant_id": "M004123",
            $table->string('masked_card')->nullable(); //   "masked_card": "481111-1114",
            $table->string('eci')->nullable(); //   "eci": "05",
            $table->string('currency')->nullable(); //   "currency": "IDR",
            $table->string('channel_response_message')->nullable(); //   "channel_response_message": "Approved",
            $table->string('channel_response_code')->nullable(); //   "channel_response_code": "00",
            $table->string('card_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('approval_code')->nullable();
            $table->string('permata_va_number')->nullable();
            $table->string('va_bank')->nullable();
            $table->string('payment_code')->nullable(); //   "payment_code": "25709650945026",
            $table->string('store')->nullable(); //   "store": "indomaret"
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
