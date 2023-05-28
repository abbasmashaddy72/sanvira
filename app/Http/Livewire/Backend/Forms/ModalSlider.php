<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Slider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class ModalSlider extends ModalComponent
{
    use WithFileUploads;
    // Model Values
    public $name, $image, $url;
    // Set Values
    public $isUploaded = false;

    protected $rules = [
        'name' => '',
        'image' => 'required',
        'url' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (gettype($this->image) != 'string') {
            $this->isUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (gettype($this->image) != 'string') {
            $validatedData['image'] = $this->image->store('sliders', 'public');
        }

        Slider::create($validatedData);

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        abort_if(Gate::denies('slider_add'), 403);

        return view('livewire.backend.forms.modal-slider');
    }
}
