<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchFormData extends Component
{
    use WithPagination;

    public $data;
    public $supplierProductsList, $supplierList, $categoriesList, $brandList;

    public function render()
    {
        $this->supplierProductsList = SupplierProduct::where('name', 'like', '%' . $this->data . '%')->get();
        $this->supplierList = Supplier::where('company_name', 'like', '%' . $this->data . '%')->get();
        $this->categoriesList = SupplierProductCategory::where('name', 'like', '%' . $this->data . '%')->get();
        $this->brandList = SupplierProduct::where('brand', 'like', '%' . $this->data . '%')->get();

        return view('livewire.frontend.filters.search-form-data');
    }
}
