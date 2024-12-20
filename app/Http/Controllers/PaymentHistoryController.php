<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    /**
     * Tampilkan halaman riwayat pembayaran.
     */
       public function index(Request $request)
        {
            // Ambil status filter dari query parameter (jika ada)
            $status = $request->query('status', 'semua');  // default 'semua'

            // Ambil user yang sedang login
            $user = auth()->user();

            // Filter order berdasarkan status dan user yang sedang login
            if ($status === 'selesai') {
                $orders = Order::where('user_id', $user->id) // Hanya ambil order yang dimiliki oleh user
                            ->where('status', 'pending') // Filter order dengan status 'selesai'
                            ->with('products') // Load the products related to the order
                            ->get();
            } elseif ($status === 'dibatalkan') {
                $orders = Order::where('user_id', $user->id) // Hanya ambil order yang dimiliki oleh user
                            ->where('status', 'cancel') // Filter order dengan status 'dibatalkan'
                            ->with('products') // Load the products related to the order
                            ->get();
            } else {
                // Jika status 'semua', ambil semua order yang dimiliki oleh user
                $orders = Order::where('user_id', $user->id) // Filter berdasarkan user_id
                            ->with('products') // Load the products related to the order
                            ->get();
            }

            // Group orders based on the date and time of creation (created_at)
            $groupedOrders = $orders->groupBy(function ($order) {
                return $order->created_at->format('Y-m-d H:i'); // Format the date and time as YYYY-MM-DD HH:MM
            });

            // Pass pesan jika tidak ada order
            $noOrdersMessage = $orders->isEmpty() ? 'Kamu tidak memiliki riwayat order pada status ini.' : null;

            return view('payment.history', compact('groupedOrders', 'noOrdersMessage'));
        }

}