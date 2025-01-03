<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    /**
     * Tampilkan halaman riwayat pembayaran.
     */
    public function history()
    {
        $user = auth()->user();


        $orders = Order::with(['products'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('payment.history', compact('orders'));
    }
}
