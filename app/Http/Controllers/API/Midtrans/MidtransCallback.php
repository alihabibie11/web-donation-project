<?php

namespace App\Http\Controllers\API\Midtrans;

use Midtrans\Config;
use Midtrans\Notification;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Program;
use App\Models\Transaction;

class MidtransCallback extends Controller
{
    public function callback()
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Get Transaction ID dari order id mt
        $order = explode('-', $order_id); //['KD','ID','PROGRAM_ID', 'RANDOM+DATE']

        // Cari transaksi berdasarkan ID
        $transaction = Donation::with('program')->findOrFail($order[1]);

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status = 'PENDING';
                } else {
                    $transaction->status = 'SUCCESS';
                    $counted_dana = ['dana_terkumpul' => $transaction->jumlah + $transaction->program->dana_terkumpul];
                    $transaction->program()->update($counted_dana);
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status = 'SUCCESS';
            $counted_dana = ['dana_terkumpul' => $transaction->jumlah + $transaction->program->dana_terkumpul];
            $transaction->program()->update($counted_dana);
        } else if ($status == 'pending') {
            $transaction->status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        // $add_dana = new Program([
        //     'dana_terkumpul' => $transaction->program->dana_terkumpul + $transaction->jumlah
        // ]);
        $transaction->save();

        // Return response
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success'
            ]
        ]);
    }
}
