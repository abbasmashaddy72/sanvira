<?php

namespace App\Livewire\Backend;

use App\Models\Slider;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class ModalSlider extends ModalComponent
{
    use WithFileUploads;

    // Model Values
    public $name;

    public $image;

    public $url;

    // Set Values
    public $imageIsUploaded = false;

    protected $rules = [
        'name' => 'required',
        'image' => 'required',
        'url' => 'required',
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

        if (gettype($this->image) != 'string') {
            $validatedData['image'] = $this->image->store('sliders', 'public');
        }

        Slider::create($validatedData);

        $this->dispatch('pg:eventRefresh-default');

        $this->closeModal();
    }

    public function render()
    {
        abort_if(Gate::denies('slider_add'), 403);

        return view('livewire.backend.modal-slider');
    }
}
