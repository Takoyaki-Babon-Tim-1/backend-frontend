<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AddToCart;

class Cart extends Component
{
    public $cartItems;
    public $totalPrice;

    public function mount($cartItems)
    {
        $this->cartItems = $cartItems;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalPrice = $this->cartItems->sum(function ($item) {
            return $item->product->total * $item->quantity;
        });
    }

    public function increaseQuantity($cartId)
    {
        $cartItem = $this->cartItems->find($cartId);
        $cartItem->quantity += 1;
        $cartItem->save();
        $this->calculateTotal();
    }

    public function decreaseQuantity($cartId)
    {
        $cartItem = $this->cartItems->find($cartId);

        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
            $this->calculateTotal();
        } else {
            $this->removeItem($cartId);
        }
    }

    public function removeItem($cartId)
    {
        $cartItem = $this->cartItems->find($cartId);
        $cartItem->delete();
        $this->cartItems = $this->cartItems->filter(fn($item) => $item->id !== $cartId);
        $this->calculateTotal();
    }

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}
