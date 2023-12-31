<?php

namespace App\Livewire\Frontend\Filters;

use App\Models\Rfq;
use App\Models\Product;
use Livewire\Component;
use WireUi\Traits\Actions;
use Jenssegers\Agent\Agent;
use Livewire\WithPagination;

class Products extends Component
{
    use Actions;
    use WithPagination;

    // Sales Page Keys
    public $sales_id;

    // Category Based Product Page Keys
    public $category;

    // Custom Keys
    public $type;

    public $page_title;

    public $applyFilter = false;

    // 1st Filter Options

    public $category_id = [];

    public $country_id = [];

    // 2nd Filter Options
    public $setButton = 'relevance';

    public $search;

    // Add to RFQ
    public $overlayVisible = false;

    public $selectedProductId;

    public $variations = [];

    public $sizes = [];
    public $weights = [];
    public $diameters = [];
    public $quantities = [];
    public $colors = [];
    public $itemTypes = [];

    public $variation_size_id;
    public $variation_weight_id;
    public $variation_diameter_id;
    public $variation_quantity_type_id;
    public $variation_color_id;
    public $variation_item_type_id;
    public $quantity;

    public $rfqProducts = [];

    protected $listeners = ['rfqUpdated' => 'render'];

    public function openOverlay($productId)
    {
        $this->selectedProductId = $productId;
        $this->clearVariations();
        $this->variations = []; // Reset the variations
        $this->loadProductVariations();
        $this->overlayVisible = true;
    }

    public function closeOverlay()
    {
        $this->overlayVisible = false;
        $this->variations = []; // Reset the variations
    }

    public function clearVariations()
    {
        $this->variation_size_id = null;
        $this->variation_weight_id = null;
        $this->variation_diameter_id = null;
        $this->variation_quantity_type_id = null;
        $this->variation_color_id = null;
        $this->variation_item_type_id = null;
    }

    protected function loadProductVariations()
    {
        $product = Product::with(['variations'])
            ->findOrFail($this->selectedProductId);

        $this->variations = $product->variations;

        $this->extractVariationDetails();
    }

    protected function extractVariationDetails()
    {
        $this->sizes = [];
        $this->weights = [];
        $this->diameters = [];
        $this->quantities = [];
        $this->colors = [];
        $this->itemTypes = [];

        foreach ($this->variations as $variation) {
            if ($variation->length && $variation->breadth && $variation->width && $variation->measurement_units) {
                $size = round($variation->length) . ' x ' . round($variation->breadth) . ' x ' . round($variation->width) . ' ' . $variation->measurement_units;
                if (!in_array($size, $this->sizes)) {
                    $this->sizes[] = $size;
                }
            }
            if ($variation->weight && $variation->weight_units) {
                $weight = $variation->weight . ' ' . $variation->weight_units;
                if (!in_array($weight, $this->weights)) {
                    $this->weights[] = $weight;
                }
            }

            if ($variation->diameter && $variation->measurement_units) {
                $diameter = $variation->diameter . ' ' . $variation->measurement_units;
                if (!in_array($diameter, $this->diameters)) {
                    $this->diameters[] = $diameter;
                }
            }

            foreach (explode(';', $variation->quantity_type) as $quantity) {
                if (!in_array($quantity, $this->quantities)) {
                    $this->quantities[] = $quantity;
                }
            }

            foreach (explode(';', $variation->color) as $color) {
                if (!in_array($color, $this->colors)) {
                    $this->colors[] = $color;
                }
            }

            foreach (explode(';', $variation->item_type) as $type) {
                if (!in_array($type, $this->itemTypes)) {
                    $this->itemTypes[] = $type;
                }
            }
        }
    }

    public function mount()
    {
        $this->page_title = $this->page_title ?? $this->type;

        $this->rfqProducts = Rfq::where('status', 'Pending')->where('user_id', auth()->id())
            ->whereHas('products', function ($query) {
                $query->select('products.id'); // Specify 'products.id' to avoid ambiguity
            })
            ->with(['products' => function ($query) {
                $query->select('products.id'); // Specify 'products.id' to avoid ambiguity
            }])
            ->get()
            ->flatMap(function ($rfq) {
                return $rfq->products;
            })
            ->pluck('id')
            ->unique()
            ->toArray();
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
        $this->category_id = [];
        $this->country_id = [];
        $this->setButton = 'relevance';
        $this->applyFilter = false;
    }

    public function addToRfq($itemId)
    {
        // Fetch the selected variation Keys
        $selectedVariations = [
            $itemId => [
                'size' => $this->variation_size_id,
                'weight' => $this->variation_weight_id,
                'diameter' => $this->variation_diameter_id,
                'quantity_type' => $this->variation_quantity_type_id,
                'color' => $this->variation_color_id,
                'item_type' => $this->variation_item_type_id,
                'quantity' => $this->quantity,
            ]
        ];

        // Get the user's pending RFQ if it exists
        $pendingRfq = Rfq::where('user_id', auth()->user()->id)
            ->where('status', 'Pending')
            ->first();

        if ($pendingRfq) {
            // If a pending RFQ exists, attach products to the existing RFQ
            $pendingRfq->products()->attach($selectedVariations);
        } else {
            // If no pending RFQ exists, create a new RFQ
            $newRfq = Rfq::create([
                'user_id' => auth()->user()->id,
                'rfq_no' => generateTableNumber('rfqs', 'rfq_no'),
                'status' => 'Pending',
            ]);

            // Attach products to the new RFQ using the pivot table
            $newRfq->products()->attach($selectedVariations);
        }

        $this->rfqProducts[] = $itemId;
        $this->dispatch('updatedRfq');

        $this->notification()->success($name = 'RFQ Saved Successfully!');

        $this->closeOverlay();

        // To reset the selected variations after adding to RFQ
        $this->reset([
            'variation_size_id',
            'variation_weight_id',
            'variation_diameter_id',
            'variation_quantity_type_id',
            'variation_color_id',
            'variation_item_type_id',
            'quantity',
        ]);
    }

    public function render()
    {
        // Initial query setup
        $productsQuery = Product::with(['variations', 'category', 'variations.country', 'productViews']);

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
