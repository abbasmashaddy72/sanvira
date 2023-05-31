<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalManufacturer extends ModalComponent
{
    use Actions;
    // Set Data
    public $manufacturer_id;
    // Model Values
    public $name;

    public function mount()
    {
        if (empty($this->manufacturer_id)) {
            abort_if(Gate::denies('manufacturer_add'), 403);
            return;
        }
        abort_if(Gate::denies('manufacturer_edit'), 403);
        $data = Manufacturer::findOrFail($this->manufacturer_id);
        $this->name = $data->name;
    }

    protected $rules = [
        'name' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->manufacturer_id)) {
            Manufacturer::where('id', $this->manufacturer_id)->update($validatedData);

            $this->notification()->success($name = 'Manufacturer Updated Successfully!');
        } else {
            Manufacturer::create($validatedData);

            $this->notification()->success($name = 'Manufacturer Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-manufacturer');
    }
}
