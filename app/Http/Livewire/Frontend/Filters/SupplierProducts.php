<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\SupplierProduct;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierProducts extends Component
{
    use WithPagination;

    public function render()
    {
        $supplier_products = SupplierProduct::paginate(6);

        return view('livewire.frontend.filters.supplier-products', compact('supplier_products'));
    }
}
