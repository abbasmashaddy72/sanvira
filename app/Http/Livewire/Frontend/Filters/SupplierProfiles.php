<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierProfiles extends Component
{
    use WithPagination;

    // Custom Values
    public $applyFilter = false;
    // Custom Filter Values
    public $brand_id = [], $manufacturer_id = [], $supplier_product_category_id = [];

    public function apply()
    {
        $this->applyFilter = true;
    }

    public function clearFilters()
    {
        $this->brand_id = [];
        $this->manufacturer_id = [];
        $this->supplier_product_category_id = [];
        $this->applyFilter = false;
    }

    public function render()
    {
        if ($this->applyFilter == true) {
            $brand_id = $this->brand_id;
            $manufacturer_id = $this->manufacturer_id;
            $supplier_product_category_id = $this->supplier_product_category_id;

            $suppliers = Supplier::withCount('products')->whereHas('products', function ($query) use ($brand_id, $manufacturer_id, $supplier_product_category_id) {
                $query->whereIn('brand_id', $brand_id)
                    ->orWhereIn('manufacturer_id', $manufacturer_id)
                    ->orWhereIn('supplier_product_category_id', $supplier_product_category_id);
            })->paginate(16);
        } else {
            $suppliers = Supplier::withCount('products')->paginate(16);
        }

        return view('livewire.frontend.filters.supplier-profiles', compact([
            'suppliers',
        ]));
    }
}
