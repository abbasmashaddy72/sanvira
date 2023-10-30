<?php

namespace App\Livewire\Backend;

use App\Models\Brand;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalBrand extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $brand_id;

    public $account_type_enum = [];

    // Model Values
    public $name;

    public $account_type;

    public $image;

    public $imageIsUploaded = false;

    public function mount()
    {
        $this->account_type_enum = explode(',', Brand::$enumCasts['account_type']);
        if (empty($this->brand_id)) {
            abort_if(Gate::denies('brand_add'), 403);

            return;
        }
        abort_if(Gate::denies('brand_edit'), 403);

        $data = Brand::findOrFail($this->brand_id);
        $this->name = $data->name;
        $this->account_type = $data->account_type;
        $this->image = $data->image;
    }

    protected $rules = [
        'name' => 'required',
        'account_type' => 'required',
        'image' => 'required',
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

        if (!empty($this->brand_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('brands', 'public');
            }
            Brand::where('id', $this->brand_id)->update($validatedData);

            $this->notification()->success($name = 'Brand Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('brands', 'public');
            }
            Brand::create($validatedData);

            $this->notification()->success($name = 'Brand Saved Successfully!');
        }

        $this->dispatch('pg:eventRefresh-default');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.modal-brand');
    }
}
