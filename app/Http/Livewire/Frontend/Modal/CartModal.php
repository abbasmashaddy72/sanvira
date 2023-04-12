<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\Cart;
use LivewireUI\Modal\ModalComponent;

class CartModal extends ModalComponent
{
    public $cartProductLists;

    public function mount()
    {
        $this->cartProductLists = Cart::where('user_id', auth()->id())->with('supplierProducts')->get();
    }

    public function render()
    {
        return view('livewire.frontend.modal.cart-modal');
    }
}
