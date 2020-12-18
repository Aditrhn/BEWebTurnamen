<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Join;
use App\Model\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function notification(Request $req)
    {
        $payload = $req->getContent();
        $notification = \json_decode($payload);
        // \dd($notification);
        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVERKEY'));
        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }
        $this->initPaymentGateway();
        $notif = new Notification();
        // \dd($notif);
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        // \dd($order_id);
        $fraud = null;
        if (!empty($notif->fraud_status)) {
            $fraud = $notif->fraud_status;
        }
        $join = Join::where('code_order_id', $order_id)->first();
        if ($transaction == 'capture') {
            //for credit card, we need to check wheter transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction = Payment::CHALLENGE;
                    $join->payment_due = $notif->transaction_time;
                    $join->payment_type = $type;
                    $join->payment_note = 'Transaction is flagged as potential fraud, but cannot be determined precisely.
                    You can Accept or Deny the transaction from MAP account. ';
                    $join->save();
                } else {
                    $transaction = Payment::SUCCESS;
                    $join->payment_due = $notif->transaction_time;
                    $join->payment_type = $type;
                    $join->payment_note = 'Transaction is safe to proceed. It is not considered as a fraud.';
                    $join->status = Join::SUCCESS;
                    $join->save();
                }
            }
        } else if ($transaction == 'settlement') {
            $transaction = Payment::SETTLEMENT;
            $join->payment_due = $notif->transaction_time;
            $join->payment_type = $type;
            $join->payment_note = 'The transaction is successfully settled. Funds have been credited to your account.';
            $join->status = Join::SUCCESS;
            $join->save();
        } else if ($transaction == 'pending') {
            $transaction = Payment::PENDING;
            $join->payment_due = $notif->transaction_time;
            $join->payment_type = $type;
            $join->payment_note = 'The transaction is created and is waiting to be paid by the customer at the payment providers like Direct debit, Bank Transfer, E-wallets, and so on.';
            $join->save();
        } else if ($transaction == 'deny') {
            $transaction = Payment::DENY;
            $join->payment_due = $notif->transaction_time;
            $join->payment_type = $type;
            $join->payment_note = 'The credentials used for payment are rejected by the payment provider or Midtrans Fraud Detection System (FDS)';
            $join->save();
        } else if ($transaction == 'expire') {
            $transaction = Payment::EXPIRE;
            $join->payment_due = $notif->transaction_time;
            $join->payment_type = $type;
            $join->payment_note = 'Transaction is not available for processing, because the payment was delayed.';
            $join->save();
        } else if ($transaction == 'cancel') {
            $transaction = Payment::CANCEL;
            $join->payment_due = $notif->transaction_time;
            $join->payment_type = $type;
            $join->payment_note = 'The transaction is canceled. It can be triggered by you.';
            $join->save();
        }

        $payment_midtrans = new Payment;
        $payment_midtrans->order_id = $order_id;
        $payment_midtrans->transaction_id = $notif->transaction_id;
        $payment_midtrans->transaction_status = $transaction;
        $payment_midtrans->transaction_time = $notif->transaction_time;
        $payment_midtrans->status_message = $notif->status_message;
        $payment_midtrans->status_code = $notif->status_code;
        $payment_midtrans->gross_amount = $notif->gross_amount;
        $payment_midtrans->payment_type = $type;
        $payment_midtrans->fraud_status = $fraud;
        $payment_midtrans->signature_key = $notif->signature_key;
        $merchant_id = null;
        if (!empty($notif->merchant_id)) {
            $merchant_id = $notif->merchant_id;
        }
        $payment_midtrans->merchant_id = $merchant_id;
        $masked_card = null;
        if (!empty($notif->masked_card)) {
            $masked_card = $notif->masked_card;
        }
        $payment_midtrans->masked_card = $masked_card;
        $eci = null;
        if (!empty($notif->eci)) {
            $eci = $notif->eci;
        }
        $payment_midtrans->eci = $eci;
        $currency = null;
        if (!empty($notif->currency)) {
            $currency = $notif->currency;
        }
        $payment_midtrans->currency = $currency;
        $channel_response_message = null;
        if (!empty($notif->channel_response_message)) {
            $channel_response_message = $notif->channel_response_message;
        }
        $payment_midtrans->channel_response_message = $channel_response_message;
        $channel_response_code = null;
        if (!empty($notif->channel_response_code)) {
            $channel_response_code = $notif->channel_response_code;
        }
        $payment_midtrans->channel_response_code = $channel_response_code;
        $card_type = null;
        if (!empty($notif->card_type)) {
            $card_type = $notif->card_type;
        }
        $payment_midtrans->card_type = $card_type;
        $bank = null;
        if (!empty($notif->bank)) {
            $bank = $notif->bank;
        }
        $payment_midtrans->bank = $bank;
        $approval_code = null;
        if (!empty($notif->approval_code)) {
            $approval_code = $notif->approval_code;
        }
        $payment_midtrans->approval_code = $approval_code;
        $permata_va_number = null;
        if (!empty($notif->permata_va_number)) {
            $permata_va_number = $notif->permata_va_number;
        }
        $payment_midtrans->permata_va_number = $permata_va_number;
        $vaNumber = null;
        $vaVendor = null;
        if (!empty($notif->va_numbers[0])) {
            $vaVendor = $notif->va_numbers[0]->bank;
            $vaNumber = $notif->va_numbers[0]->va_number;
        }
        $payment_midtrans->va_bank = $vaVendor;
        $payment_midtrans->va_number = $vaNumber;
        $mandiri_bill_key = null;
        if (!empty($notif->bill_key)) {
            $mandiri_bill_key = $notif->bill_key;
        }
        $payment_midtrans->mandiri_bill_key = $mandiri_bill_key;
        $mandiri_biller_code = null;
        if (!empty($notif->biller_code)) {
            $mandiri_biller_code = $notif->biller_code;
        }
        $payment_midtrans->mandiri_biller_code = $mandiri_biller_code;
        $payment_code = null;
        if (!empty($notif->payment_code)) {
            $payment_code = $notif->payment_code;
        }
        $payment_midtrans->payment_code = $payment_code;
        $store = null;
        if (!empty($notif->store)) {
            $store = $notif->store;
        }
        $payment_midtrans->store = $store;
        // return \response(['message' => $payment_midtrans], 200);
        $payment_midtrans->save();
        $message = 'Payment status is : ' . $transaction;
        $response = [
            'code ' => 200,
            'message' => $message,
        ];
        return \response($response, 200);
    }
    public function completed(Request $request)
    {
        if (Auth::guard('player')->check()) {
            // \dd('test');
            // \dd($request->all());
            $join = Join::where('code_order_id', $request->order_id)->first();
            // \dd($join);
            return \view('tournament.completed', \compact('join'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
