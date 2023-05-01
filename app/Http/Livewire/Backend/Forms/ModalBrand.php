<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Brand;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalBrand extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $brand_id;
    // Model Values
    public $name, $image;

    public function mount()
    {
        if (!empty($this->brand_id)) {
            $data = Brand::findOrFail($this->brand_id);
            $this->name = $data->name;
            $this->image = $data->image;
        }
    }

    protected $rules = [
        'name' => '',
        'image' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-brand');
    }
}
