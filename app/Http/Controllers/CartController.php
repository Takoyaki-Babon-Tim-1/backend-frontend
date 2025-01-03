<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = AddToCart::where('user_id', $user->id)->get();

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->total * $item->quantity;
        }
        $cartItems = AddToCart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    public function add(Request $request, $productId)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($productId);

        // Check if the product is already in the cart for the user
        $cart = AddToCart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        // Update the quantity if the product is already in the cart
        if ($cart) {
            $cart->quantity += $request->input('quantity', 1);
            $cart->save();
        } else {
            // Otherwise, create a new cart entry
            AddToCart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        // Redirect based on the 'from' parameter
        if ($request->input('from') === 'detail') {
            // Redirect back to the detail page using the product's slug
            return redirect()->route('front.detail', ['product' => $product->slug])
                ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        } else {
            // Redirect back to the index page
            return redirect()->route('front.index')
                ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
    }




    public function update(Request $request, $cartId)
    {
        $cart = AddToCart::where('user_id', Auth::id())->findOrFail($cartId);
        $cart->quantity = $request->input('quantity');
        $cart->save();

        if ($request->quantity > 0) {
            $cart->update(['quantity' => $request->quantity]);
        } else {
            return $this->destroy($cartId);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($cartId)
    {
        $cart = AddToCart::where('user_id', Auth::id())->findOrFail($cartId);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}