<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Models\Order;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [FrontController::class, 'index'])->name('front.index');




Route::middleware('guestOrVerified')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('front.index');
    Route::get('/product/{product:slug}', [FrontController::class, 'detailProduct'])->name('front.detail');
    // SEE ALL DISCOUNT
    Route::get('/discount', [FrontController::class, 'index'])->name('discount');
    // Kategori
    Route::get('/category/{category:slug}', [FrontController::class, 'showCategory'])->name('front.category');
    // Search
    Route::get('/search', [FrontController::class, 'search'])->name('front.search');



});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-profile', [CustomerController::class, 'index'])->name('customer.profile');
    Route::get('/my-profile/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update-profile', [CustomerController::class, 'updateProfile'])->name('customer.update');
    Route::post('/update-password', [CustomerController::class, 'updatePassword'])->name('password.update');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/order/{id}/view', function ($id) {
        $order = Order::with('products')->findOrFail($id);
        return view('components.view-order', compact('order'));
    })->name('order.view');

    Route::post('/product/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cartId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::match(['get', 'post'], '/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    // RIWAYAT
    Route::get('/history', [PaymentHistoryController::class, 'history'])->name('payment.history');
   

   


});

  // Tambahkan route untuk halaman FAQ, Kebijakan Privasi, dan Kebijakan Layanan
Route::view('/faq', 'faq')->name('faq');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
Route::view('/terms-of-service', 'terms-of-service')->name('terms.of.service');

Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
require __DIR__ . '/auth.php';

// email
Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);