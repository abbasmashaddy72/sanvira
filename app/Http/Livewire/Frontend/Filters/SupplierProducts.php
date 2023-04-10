<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Cart;
use App\Models\Rfq;
use App\Models\SupplierProduct;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class SupplierProducts extends Component
{
    use Actions, WithPagination;

    // Custom Values
    public $cartProducts = [], $rfqProducts = [], $quantity = [];

    public function mount()
    {
        $this->cartProducts = Cart::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
        $this->rfqProducts = Rfq::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
    }

    public function render()
    {
        $supplier_products = SupplierProduct::paginate(6);

        return view('livewire.frontend.filters.supplier-products', compact('supplier_products'));
    }

    public function addToCart($productId)
    {
        Cart::create([
            'supplier_product_id' => $productId,
            'user_id' => auth()->id(),
            'quantity' => $this->quantity[$productId]
        ]);
        $this->cartProducts[] = $productId;

        $this->notification()->success($title = 'Product Added to Cart');
        $this->emit('updateCart');
    }

    public function removeFromCart($productId)
    {
        Cart::where('supplier_product_id', $productId)->where('user_id', auth()->id())->delete();
        if (($key = array_search($productId, $this->cartProducts)) !== false) {
            unset($this->cartProducts[$key]);
        }

        $this->notification()->error($title = 'Product Removed from Cart');
        $this->emit('updateCart');
    }

    public function addToRfq($productId)
    {
        Rfq::create([
            'supplier_product_id' => $productId,
            'user_id' => auth()->id(),
            'quantity' => $this->quantity[$productId]
        ]);
        $this->rfqProducts[] = $productId;

        $this->notification()->success($title = 'Product Added to RFQ');
        $this->emit('updateRfq');
    }

    public function removeFromRfq($productId)
    {
        Rfq::where('supplier_product_id', $productId)->where('user_id', auth()->id())->delete();
        if (($key = array_search($productId, $this->rfqProducts)) !== false) {
            unset($this->rfqProducts[$key]);
        }

        $this->notification()->error($title = 'Product Removed from RFQ');
        $this->emit('updateRfq');
    }
}
