<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProductCategory;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierCategory extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_category_id, $type;
    // Model Values
    public $name, $image, $parent_id;
    public $imageIsUploaded = false;

    public function mount()
    {
        if (empty($this->supplier_category_id)) {
            abort_if(Gate::denies('supplier_category_add'), 403);
            return;
        }
        abort_if(Gate::denies('supplier_category_edit'), 403);
        $data = SupplierProductCategory::findOrFail($this->supplier_category_id);
        $this->name = $data->name;
        $this->image = $data->image;
        $this->parent_id = $data->parent_id;
        if ($this->parent_id == 0) {
            $this->type = "Main Category";
        } else {
            $this->type = "Sub Category";
        }
    }

    protected $rules = [
        'name' => 'required',
        'image' => 'required',
        'parent_id' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if (gettype($this->image) != 'string') {
            $this->imageIsUploaded = true;
        }
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
