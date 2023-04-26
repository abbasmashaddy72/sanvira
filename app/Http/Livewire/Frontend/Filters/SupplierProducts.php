<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Cart;
use App\Models\Rfq;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Livewire\Component;
use Livewire\WithPagination;
use RalphJSmit\Livewire\Urls\Facades\Url;
use WireUi\Traits\Actions;

class SupplierProducts extends Component
{
    use Actions, WithPagination;

    // Sales Page Values
    public $sales_id;
    // Category Based Product Page Values
    public $product_category;
    // Profile Page Values
    public $profile_id;
    // Custom Values
    public $cartProducts = [], $rfqProducts = [], $quantity = [], $type, $page_title;

    public function mount()
    {
        $this->cartProducts = Cart::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
        $this->rfqProducts = Rfq::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
        if ($this->type == 'Category Page') {
            $this->page_title = $this->product_category->name;
        } else {
            $this->page_title = $this->page_title ?? $this->type;
        }
    }

    public function render()
    {
        if ($this->type == 'On Sale') {
            $supplier_products = SupplierProduct::where('on_sale', 1)->orderByRaw("id = $this->sales_id DESC")->paginate(6);
            $supplier_products_count = SupplierProduct::where('on_sale', 1)->orderByRaw("id = $this->sales_id DESC")->count();
            $sub_product_category = [];
        } elseif ($this->type == 'All Products') {
            $supplier_products = SupplierProduct::paginate(6);
            $supplier_products_count = SupplierProduct::count();
            $sub_product_category = [];
        } elseif ($this->type == 'Profile Page') {
            $supplier_products = SupplierProduct::where('supplier_id', $this->profile_id)->paginate(6);
            $supplier_products_count = SupplierProduct::where('supplier_id', $this->profile_id)->count();
            $sub_product_category = [];
        } elseif ($this->product_category != null && $this->product_category->parent_id != 0) {
            $sub_product_category = SupplierProductCategory::where('parent_id', $this->product_category->id)->withCount('products')->get();
            $supplier_products = SupplierProduct::where('supplier_product_category_id', $this->product_category->id)->paginate(6);
            $supplier_products_count = SupplierProduct::where('supplier_product_category_id', $this->product_category->id)->count();
        } else {
            $sub_product_category = SupplierProductCategory::where('parent_id', 0)->withCount('products')->get();
            $supplier_products_count = 0;
            $supplier_products = [];
        }

        return view('livewire.frontend.filters.supplier-products', compact([
            'supplier_products',
            'supplier_products_count',
            'sub_product_category',
        ]));
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
