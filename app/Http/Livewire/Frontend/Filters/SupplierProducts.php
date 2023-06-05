<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class SupplierProducts extends Component
{
    use Actions;
    use WithPagination;

    // Sales Page Values
    public $sales_id;

    // Category Based Product Page Values
    public $product_category;

    // Profile Page Values
    public $profile_id;

    // Custom Values
    public $type;

    public $page_title;

    public $applyFilter = false;

    // 1st Filter Options
    public $min_oq;

    public $max_oq;

    public $min_price;

    public $max_price;

    public $min_edt;

    public $max_edt;

    public $brand_id = [];

    public $manufacturer_id = [];

    public $supplier_product_category_id = [];

    public $country_id = [];

    // 2nd Filter Options
    public $setButton = 'relevance';

    // 3rd Filter Options
    public $availableLetters;

    public $alphabet = 'A';

    public function mount()
    {
        if ($this->type == 'Category Page') {
            $this->page_title = $this->product_category->name;
        } else {
            $this->page_title = $this->page_title ?? $this->type;
        }
        if (!empty($this->product_category)) {
            $this->supplier_product_category_id = $this->product_category->id;
        }
        if ($this->type == 'All Category Page') {
            $this->availableLetters = SupplierProductCategory::where('parent_id', 0)->pluck('name')->map(function ($name) {
                return substr($name, 0, 1);
            })->unique()->toArray();
        }
    }

    public function applyAlp($item)
    {
        $this->alphabet = $item;
        $this->applyFilter = true;
    }

    public function apply()
    {
        $this->applyFilter = true;
    }

    public function applyButton($value)
    {
        $this->setButton = $value;
        $this->applyFilter = true;
    }

    public function clearFilters()
    {
        $this->min_oq = null;
        $this->max_oq = null;
        $this->min_price = null;
        $this->max_price = null;
        $this->min_edt = null;
        $this->max_edt = null;
        $this->brand_id = [];
        $this->manufacturer_id = [];
        $this->supplier_product_category_id = [];
        $this->country_id = [];
        $this->setButton = 'relevance';
        $this->applyFilter = false;
    }

    public function render()
    {
        if (!empty($this->alphabet) && $this->applyFilter == true) {
            $sub_product_category = SupplierProductCategory::where('parent_id', 0)->withCount('products')->where('name', 'like', $this->alphabet . '%')->get();
        } else {
            $sub_product_category = [];
        }

        if ($this->applyFilter == true) {
            $supplier_products = SupplierProduct::with(['brands', 'manufacturers', 'supplierProductCategory', 'country']);

            if ($this->type == 'On Sale' || $this->setButton == 'onSale') {
                $supplier_products->where('on_sale', 1);
            }
            if ($this->type == 'Profile Page') {
                $supplier_products->where('supplier_id', $this->profile_id);
            }
            if ($this->type == 'Category Page') {
                $supplier_products->where('supplier_product_category_id', $this->product_category->id);
            }
            if ($this->setButton == 'lowToHigh') {
                $supplier_products->orderBy('price', 'ASC')->orderBy('min_price', 'ASC');
            }
            if ($this->setButton == 'highToLow') {
                $supplier_products->orderBy('price', 'DESC')->orderBy('min_price', 'DESC');
            }
            if ($this->min_oq != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('min_oq', '>=', $this->min_oq);
            }
            if ($this->max_oq != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('max_oq', '<=', $this->max_oq);
            }
            if ($this->min_price != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('price', '>=', $this->min_price);
            }
            if ($this->max_price != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('price', '<=', $this->max_price);
            }
            if ($this->min_price != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('min_price', '>=', $this->min_price);
            }
            if ($this->max_price != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('max_price', '<=', $this->max_price);
            }
            if ($this->min_edt != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('edt', '>=', $this->min_edt);
            }
            if ($this->max_edt != null) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhere' : 'where'}('edt', '<=', $this->max_edt);
            }
            if (count($this->brand_id) > 0) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhereIn' : 'whereIn'}('brand_id', $this->brand_id);
            }
            if (count($this->manufacturer_id) > 0) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhereIn' : 'whereIn'}('manufacturer_id', $this->manufacturer_id);
            }
            if (count($this->supplier_product_category_id) > 0) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhereIn' : 'whereIn'}('supplier_product_category_id', $this->supplier_product_category_id);
            }
            if (count($this->country_id) > 0) {
                $supplier_products->{$this->type == 'All Products' ? 'orWhereIn' : 'whereIn'}('country_id', $this->country_id);
            }
            $supplier_products = $supplier_products->paginate(12);
        } else {
            if ($this->type == 'On Sale' && $this->applyFilter != true) {
                $supplier_products = SupplierProduct::with(['brands', 'manufacturers', 'supplierProductCategory', 'country'])->where('on_sale', 1)->orderByRaw("id = $this->sales_id DESC")->paginate(12);
            }

            if ($this->type == 'All Products' && $this->applyFilter != true) {
                $supplier_products = SupplierProduct::with(['brands', 'manufacturers', 'supplierProductCategory', 'country'])->paginate(12);
            }

            if ($this->type == 'Profile Page' && $this->applyFilter != true) {
                $supplier_products = SupplierProduct::with(['brands', 'manufacturers', 'supplierProductCategory', 'country'])->where('supplier_id', $this->profile_id)->paginate(12);
            }

            if ($this->type == 'All Category Page' && $this->applyFilter != true) {
                $supplier_products = [];
                $sub_product_category = SupplierProductCategory::where('parent_id', 0)->withCount('products')->get();
            }

            if ($this->type == 'Category Page' && $this->applyFilter != true) {
                $sub_product_category = SupplierProductCategory::where('parent_id', $this->product_category->id)->withCount('products')->get();
                $supplier_products = SupplierProduct::with(['brands', 'manufacturers', 'supplierProductCategory', 'country'])->where('supplier_product_category_id', $this->product_category->id)->paginate(12);
            }
        }

        $agent = new Agent;

        return view('livewire.frontend.filters.supplier-products', compact([
            'supplier_products',
            'sub_product_category',
            'agent',
        ]));
    }
}
