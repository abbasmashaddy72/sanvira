<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\Cart;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class CartModal extends ModalComponent
{
    use Actions;

    public $cartProductLists;

    public $cartProducts = [];

    public function mount()
    {
        $this->cartProductLists = Cart::where('user_id', auth()->id())->with('supplierProducts')->get();
        $this->cartProducts = Cart::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
    }

    public function removeFromCart($productId)
    {
        Cart::where('supplier_product_id', $productId)->where('user_id', auth()->id())->delete();
        if (($key = array_search($productId, $this->cartProducts)) !== false) {
            unset($this->cartProducts[$key]);
        }

        $this->notification()->error($title = 'Product Removed from Cart');
        $this->emit('updateCart');
        $this->closeModal();
    }

    public function updateCart($productId, $quantity)
    {
        Cart::where('supplier_product_id', $productId)->where('user_id', auth()->id())->update([
            'quantity' => $quantity,
        ]);

        $this->notification()->success($title = 'Product Quantity Updated in Cart');
        $this->emit('updateCart');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.frontend.modal.cart-modal');
    }
}
