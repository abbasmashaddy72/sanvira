<?php

namespace App\Http\Livewire\Frontend\Counter;

use App\Models\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['updateCart' => 'render'];

    public function render()
    {
        $cartCount = Cart::where('user_id', auth()->id())->count();

        return view('livewire.frontend.counter.cart-counter', compact('cartCount'));
    }
}
