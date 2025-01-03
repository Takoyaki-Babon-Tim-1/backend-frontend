<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    /**
     * Tampilkan halaman riwayat pembayaran.
     */
    public function history(Request $request)
    {
        $user = auth()->user();
        $status = $request->get('status'); 

        $orders = Order::with(['products'])
            ->where('user_id', $user->id)
            ->when($status === 'success', function ($query) {
                return $query->where('status', 'success');
            })
            ->when($status === 'cancel', function ($query) {
                return $query->whereIn('status', ['cancel', 'deny', 'expire']);
            })
            ->latest()
            ->get();

        return view('payment.history', compact('orders'));
    }
}
