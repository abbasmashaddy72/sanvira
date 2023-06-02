<?php

namespace App\Http\Livewire\Backend\Forms;

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

    // Model Values
    public $name;

    public $image;

    public $imageIsUploaded = false;

    public function mount()
    {
        if (empty($this->brand_id)) {
            abort_if(Gate::denies('brand_add'), 403);

            return;
        }
        abort_if(Gate::denies('brand_edit'), 403);
        $data = Brand::findOrFail($this->brand_id);
        $this->name = $data->name;
        $this->image = $data->image;
    }

    protected $rules = [
        'name' => 'required',
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

        if (! empty($this->brand_id)) {
            if (! empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('brands', 'public');
            }
            Brand::where('id', $this->brand_id)->update($validatedData);

            $this->notification()->success($name = 'Brand Updated Successfully!');
        } else {
            if (! empty($this->image) && gettype($this->image) != 'string') {
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
