<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Product;
use App\Models\Category;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Products extends Component
{
    use Actions;
    use WithPagination;

    // Sales Page Values
    public $sales_id;

    // Category Based Product Page Values
    public $category;

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

    public $category_id = [];

    public $country_id = [];

    // 2nd Filter Options
    public $setButton = 'relevance';

    // 3rd Filter Options
    public $availableLetters;

    public $alphabet = 'A';

    public function mount()
    {
        if ($this->type === 'Category Page') {
            $this->page_title = $this->category->name;
        } else {
            $this->page_title = $this->page_title ?? $this->type;
        }
        if (!empty($this->category)) {
            reset($this->category); // Get the first element of the array
            if (gettype($this->category) == 'array') {
                $this->category_id = $this->category[0]->id;
            } else {
                $this->category_id = $this->category->id;
            }
        }
        if ($this->type !== 'All Category Page') {
            return;
        }
        $this->availableLetters = Category::where('parent_id', 0)->pluck('name')->map(function ($name) {
            return substr($name, 0, 1);
        })->unique()->sort()->toArray();

        if (is_numeric(reset($this->availableLetters))) {
            $this->alphabet = '#';
        } else {
            $this->alphabet = reset($this->availableLetters);
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
        $this->category_id = [];
        $this->country_id = [];
        $this->setButton = 'relevance';
        $this->applyFilter = false;
    }

    public function render()
    {
        if (!empty($this->alphabet) && $this->applyFilter === true) {
            if ($this->alphabet === '#') {
                $sub_category = Category::where('parent_id', 0)->withCount('products')->where('name', 'REGEXP', '^[0-9]')->get();
            } else {
                $sub_category = Category::where('parent_id', 0)->withCount('products')->where('name', 'like', $this->alphabet . '%')->get();
            }
        } else {
            $sub_category = [];
        }

        if ($this->applyFilter === true) {
            $products = Product::with(['brands', 'category', 'country', 'productViews']);

            if ($this->type === 'On Sale' || $this->setButton === 'onSale') {
                $products->where('on_sale', 1);
            }
            if ($this->type === 'Category Page') {
                $products->where('category_id', $this->category->id);
            }
            if ($this->setButton === 'lowToHigh') {
                $products->orderBy('price', 'ASC')->orderBy('min_price', 'ASC');
            }
            if ($this->setButton === 'highToLow') {
                $products->orderBy('price', 'DESC')->orderBy('min_price', 'DESC');
            }
            if ($this->min_oq !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('min_oq', '>=', $this->min_oq);
            }
            if ($this->max_oq !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('max_oq', '<=', $this->max_oq);
            }
            if ($this->min_price !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('price', '>=', $this->min_price);
            }
            if ($this->max_price !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('price', '<=', $this->max_price);
            }
            if ($this->min_price !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('min_price', '>=', $this->min_price);
            }
            if ($this->max_price !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('max_price', '<=', $this->max_price);
            }
            if ($this->min_edt !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('edt', '>=', $this->min_edt);
            }
            if ($this->max_edt !== null) {
                $products->{$this->type === 'All Products' ? 'orWhere' : 'where'}('edt', '<=', $this->max_edt);
            }
            if (count($this->brand_id) > 0) {
                $products->{$this->type === 'All Products' ? 'orWhereIn' : 'whereIn'}('brand_id', $this->brand_id);
            }
            if (count($this->category_id) > 0) {
                $products->{$this->type === 'All Products' ? 'orWhereIn' : 'whereIn'}('category_id', $this->category_id);
            }
            if (count($this->country_id) > 0) {
                $products->{$this->type === 'All Products' ? 'orWhereIn' : 'whereIn'}('country_id', $this->country_id);
            }
            $products = $products->paginate(12);
        } else {
            if ($this->type === 'On Sale' && $this->applyFilter !== true) {
                $products = Product::with(['brands', 'category', 'country', 'productViews'])->where('on_sale', 1)->orderByRaw("id = {$this->sales_id} DESC")->paginate(12);
            }

            if ($this->type === 'All Products' && $this->applyFilter !== true) {
                $products = Product::with(['brands', 'category', 'country', 'productViews'])->paginate(12);
            }

            if ($this->type === 'All Category Page' && $this->applyFilter !== true) {
                $products = [];
                $sub_category = Category::where('parent_id', 0)->withCount('products')->get();
            }

            if ($this->type === 'Category Page' && $this->applyFilter !== true) {
                $sub_category = Category::where('parent_id', $this->category->id)->withCount('products')->get();
                $products = Product::with(['brands', 'category', 'country', 'productViews'])->where('category_id', $this->category->id)->paginate(12);
            }

            if ($this->type === 'Product Details Similar Products' && $this->applyFilter !== true) {
                $sub_category = [];
                $products = Product::with(['brands', 'category', 'country', 'productViews'])->where('category_id', $this->category_id)->paginate(5);
            }
        }

        $agent = new Agent;
        return view('livewire.frontend.filters.products', compact([
            'products',
            'sub_category',
            'agent',
        ]));
    }
}
