<?php

namespace App\Http\Livewire\Frontend\Form;

use App\Models\Brand;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Livewire\Component;

class Search extends Component
{
    // Custom Values
    public $query;

    public $type;

    public $supplierProductsList;

    public $supplierList;

    public $categoriesList;

    public $brandList;

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
        $this->supplierProductsList = SupplierProduct::where('title', 'like', $this->query . '%')->get();
        $this->supplierList = Supplier::where('company_name', 'like', $this->query . '%')->get();
        $this->categoriesList = SupplierProductCategory::where('name', 'like', $this->query . '%')->get();
        $this->brandList = Brand::where('name', 'like', $this->query . '%')->get();
    }

    public function render()
    {
        return view('livewire.frontend.form.search');
    }
}
