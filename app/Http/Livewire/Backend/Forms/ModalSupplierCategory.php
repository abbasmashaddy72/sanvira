<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProductCategory;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierCategory extends ModalComponent
{
    use Actions;
    // Set Data
    public $supplier_category_id, $type;
    // Model Values
    public $name, $image, $parent_id;

    public function mount()
    {
        if (empty($this->supplier_category_id)) {
            return;
        }
        $data = SupplierProductCategory::findOrFail($this->supplier_category_id);
        $this->name = $data->name;
        $this->image = $data->image;
        $this->parent_id = $data->parent_id;
    }

    protected $rules = [
        'name' => '',
        'image' => '',
        'parent_id' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->supplier_category_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_product_category', 'public');
            }
            SupplierProductCategory::where('id', $this->supplier_category_id)->update($validatedData);

            $this->notification()->success($title = 'SupplierProductCategory Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_product_category', 'public');
            }
            SupplierProductCategory::create($validatedData);

            $this->notification()->success($title = 'SupplierProductCategory Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-category');
    }
}
