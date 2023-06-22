<?php

namespace App\Http\Livewire\Backend\Filters;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;

class SupplierRegularReport extends Component
{
    use WithPagination;

    // Filter Values
    public $typeProducts = false;
    public $typeCategories = false;
    public $typeBrands = false;
    public $typeManufacturers = false;
    public $typeNoData = true;

    protected $listeners = ['checkSelect' => 'apply'];

    public function apply($value)
    {
        if (!empty($value)) {
            if ($value == 'Products') {
                $this->typeProducts = true;
                $this->typeCategories = false;
                $this->typeBrands = false;
                $this->typeManufacturers = false;
                $this->typeNoData = false;
            }
            if ($value == 'Categories') {
                $this->typeProducts = false;
                $this->typeCategories = true;
                $this->typeBrands = false;
                $this->typeManufacturers = false;
                $this->typeNoData = false;
            }
            if ($value == 'Brands') {
                $this->typeProducts = false;
                $this->typeCategories = false;
                $this->typeBrands = true;
                $this->typeManufacturers = false;
                $this->typeNoData = false;
            }
            if ($value == 'Manufacturers') {
                $this->typeProducts = false;
                $this->typeCategories = false;
                $this->typeBrands = false;
                $this->typeManufacturers = true;
                $this->typeNoData = false;
            }
        } else {
            $this->typeProducts = false;
            $this->typeCategories = false;
            $this->typeBrands = false;
            $this->typeManufacturers = false;
            $this->typeNoData = true;
        }
    }

    public function render()
    {
        $supplier_id = Supplier::where('user_id', auth()->user()->id)->value('id');

        return view('livewire.backend.filters.supplier-regular-report', compact('supplier_id'));
    }
}
