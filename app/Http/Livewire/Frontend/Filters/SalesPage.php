<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\SupplierProduct;
use Livewire\Component;
use Livewire\WithPagination;

class SalesPage extends Component
{
    use WithPagination;

    // Custom Set Values
    public $sales_id;

    public function render()
    {
        $on_sale_products = SupplierProduct::where('on_sale', 1)->orderByRaw("id = $this->sales_id DESC")->paginate(6);

        return view('livewire.frontend.filters.sales-page', compact('on_sale_products'));
    }
}
