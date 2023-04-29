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
    // Filter Options
    public $min_oq, $max_oq, $min_edt, $max_edt, $brand_name, $brand = [], $manufacturer_name, $manufacturer = [];

    public function mount()
    {
        $this->cartProducts = Cart::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
        $this->rfqProducts = Rfq::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
        if ($this->type == 'Category Page') {
            $this->page_title = $this->product_category->name;
        } else {
            $this->page_title = $this->page_title ?? $this->type;
        }
        $this->brand_name = SupplierProduct::distinct('brand')->pluck('brand');
        $this->manufacturer_name = SupplierProduct::distinct('manufacturer')->pluck('manufacturer');
    }

    public function render()
    {
        if ($this->type == 'On Sale') {
            $supplier_products = SupplierProduct::where('on_sale', 1)->orderByRaw("id = $this->sales_id DESC")->paginate(6);
            $sub_product_category = [];
        }

        if ($this->type == 'All Products') {
            $supplier_products = SupplierProduct::paginate(6);
            $sub_product_category = [];
        }

        if ($this->type == 'Profile Page') {
            $supplier_products = SupplierProduct::where('supplier_id', $this->profile_id)->paginate(6);
            $sub_product_category = [];
        }

        if ($this->type == 'All Category Page') {
            $sub_product_category = SupplierProductCategory::where('parent_id', 0)->withCount('products')->get();
            $supplier_products = [];
        }
        if ($this->type == 'Category Page') {
            $sub_product_category = SupplierProductCategory::where('parent_id', $this->product_category->id)->withCount('products')->get();
            $supplier_products = SupplierProduct::where('supplier_product_category_id', $this->product_category->id)->paginate(6);
        }

        if (!empty($this->min_oq) && !empty($this->max_oq) && !empty($this->min_edt) && !empty($this->max_edt) && !empty($this->brand) && !empty($this->manufacturer)) {
            $supplier_products = SupplierProduct::where('on_sale', 1)
                ->where('min_oq', '>=', $this->min_oq)
                ->where('max_oq', '<=', $this->max_oq)
                ->where('edt', '>=', $this->min_edt)
                ->where('edt', '<=', $this->max_edt)
                ->whereIn('brand', array_keys(array_filter($this->brand)))
                ->whereIn('manufacturer', array_keys(array_filter($this->manufacturer)))->paginate(6);
            $sub_product_category = [];
        }

        return view('livewire.frontend.filters.supplier-products', compact([
            'supplier_products',
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
