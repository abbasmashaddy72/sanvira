<?php

namespace App\Livewire\Backend;

use App\Models\Slider;
use WireUi\Traits\Actions;
use LivewireUI\Modal\ModalComponent;

class ModalDeleteSlider extends ModalComponent
{
    use Actions;

    public $name;

    public $slider_id;

    public function mount()
    {
        $data = Slider::findOrFail($this->slider_id);
        $this->name = $data->name;
    }

    public function delete()
    {
        $record = Slider::findOrFail($this->slider_id);
        $record->delete();

        $this->notification()->success($name = 'Slider Deleted Successfully!');

        $this->dispatch('pg:eventRefresh-default');

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.backend.modal-delete-slider');
    }
}
