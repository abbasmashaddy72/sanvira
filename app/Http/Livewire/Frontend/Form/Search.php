<?php

namespace App\Http\Livewire\Frontend\Form;

use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Livewire\Component;

class Search extends Component
{
    // Custom Values
    public $type;
    public $query;
    public $supplierProductsList, $supplierList, $categoriesList, $brandList;

    public function mount()
    {
        $this->resetData();
    }

    public function resetData()
    {
        $this->query = '';
        $this->supplierProductsList = [];
    }

    public function updatedQuery()
    {
        $this->supplierProductsList = SupplierProduct::where('name', 'like', '%' . $this->query . '%')->get()->toArray();
        $this->supplierList = Supplier::where('company_name', 'like', '%' . $this->query . '%')->get()->toArray();
        $this->categoriesList = SupplierProductCategory::where('name', 'like', '%' . $this->query . '%')->get()->toArray();
        $this->brandList = SupplierProduct::where('brand', 'like', '%' . $this->query . '%')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.frontend.form.search');
    }
}
