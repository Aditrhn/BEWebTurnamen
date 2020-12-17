<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('signature_key')->nullable()->after('fraud_status');
            $table->string('merchant_id')->nullable()->after('signature_key');
            $table->string('masked_card')->nullable()->after('merchant_id');
            $table->string('eci')->nullable()->after('masked_card');
            $table->string('currency')->nullable()->after('eci');
            $table->string('channel_response_message')->nullable()->after('currency');
            $table->string('channel_response_code')->nullable()->after('channel_response_message');
            $table->string('card_type')->nullable()->after('channel_response_code');
            $table->string('bank')->nullable()->after('card_type');
            $table->string('approval_code')->nullable()->after('bank');
            $table->string('permata_va_number')->nullable()->after('approval_code');
            $table->string('va_bank')->nullable()->after('permata_va_number');
            $table->string('mandiri_bill_key')->nullable()->after('va_bank');
            $table->string('mandiri_biller_code')->nullable()->after('mandiri_bill_key');
            $table->string('payment_code')->nullable()->after('mandiri_biller_code');
            $table->string('store')->nullable()->after('payment_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
