<?php

namespace App\Livewire\Frontend\Filters;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductVariation;
use Livewire\Component;
use WireUi\Traits\Actions;
use Jenssegers\Agent\Agent;
use Livewire\WithPagination;

class Products extends Component
{
    use Actions;
    use WithPagination;

    // Sales Page Values
    public $sales_id;

    // Category Based Product Page Values
    public $category;

    // Custom Values
    public $type;

    public $page_title;

    public $applyFilter = false;

    // 1st Filter Options

    public $brand_id = [];

    public $category_id = [];

    public $country_id = [];

    // 2nd Filter Options
    public $setButton = 'relevance';

    public $search;

    // Add to RFQ
    public $overlayVisible = false;

    public $selectedProductId;

    public $variation_brand_id;
    public $variation_size_id;
    public $variation_weight_id;
    public $variation_diameter_id;
    public $variation_quantity_type_id;
    public $variation_color_id;
    public $variation_item_type_id;

    public function openOverlay($productId)
    {
        $this->selectedProductId = $productId;
        // $this->selectedProductId = $productId;
        // Fetch product data based on $productId and assign it to $this->selectedProduct
        // Example: $this->selectedProduct = Product::find($productId);

        // Once the product data is assigned, show the overlay
        $this->overlayVisible = true;
    }

    public function closeOverlay()
    {
        $this->overlayVisible = false;
        // Reset any necessary data if needed
    }

    public function mount()
    {
        $this->page_title = $this->page_title ?? $this->type;
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
        $this->brand_id = [];
        $this->category_id = [];
        $this->country_id = [];
        $this->setButton = 'relevance';
        $this->applyFilter = false;
    }

    public function addToRfq($itemId)
    {
        // Fetch the selected variation values
        $selectedVariations = [
            'brand_id' => $this->variation_brand_id,
            'size_id' => $this->variation_size_id,
            'weight_id' => $this->variation_weight_id,
            'diameter_id' => $this->variation_diameter_id,
            'quantity_type_id' => $this->variation_quantity_type_id,
            'color_id' => $this->variation_color_id,
            'item_type_id' => $this->variation_item_type_id,
        ];

        dd($selectedVariations);
        $this->closeOverlay();

        // Here, you can process and store the data as per your application's requirement
        // For example, save it in the database
        // Example: ProductVariation::create(['product_id' => $itemId, 'selected_variations' => json_encode($selectedVariations)]);

        // You can also emit an event or perform any other necessary logic

        // To reset the selected variations after adding to RFQ
        $this->reset([
            'variation_brand_id',
            'variation_size_id',
            'variation_weight_id',
            'variation_diameter_id',
            'variation_quantity_type_id',
            'variation_color_id',
            'variation_item_type_id',
        ]);
    }

    public function render()
    {
        // Initial query setup
        $productsQuery = Product::with(['variations', 'variations.brand', 'category', 'variations.country', 'productViews']);

        // Search filter
        if ($this->search) {
            $productsQuery->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%'); // Replace 'name' with the column you want to search
            });
        }
        if ($this->applyFilter === true) {
            if ($this->type === 'On Sale' || $this->setButton === 'onSale') {
                $productsQuery->where('on_sale', 1);
            }

            if (count($this->brand_id) > 0) {
                $productsQuery->whereHas('variations.brand', function ($query) {
                    $query->whereIn('brand_id', $this->brand_id);
                });
            }

            if (count($this->category_id) > 0) {
                $productsQuery->whereIn('category_id', $this->category_id);
            }

            if (count($this->country_id) > 0) {
                $productsQuery->whereHas('variations.country', function ($query) {
                    $query->whereIn('country_id', $this->country_id);
                });
            }

            $products = $productsQuery->paginate(12);
        } else {
            if ($this->type === 'On Sale') {
                $productsQuery->where('on_sale', 1)->orderByRaw("id = {$this->sales_id} DESC");
            } elseif ($this->type === 'All Products') {
                // No additional filters needed
            } elseif ($this->type === 'Product Details Similar Products') {
                $productsQuery->where('category_id', $this->category_id)->paginate(5);
            }
        }

        $products = $productsQuery->paginate(12);

        $agent = new Agent;
        return view('livewire.frontend.filters.products', compact([
            'products',
            'agent',
        ]));
    }
}
