<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Vendor;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalVendor extends ModalComponent
{
    use Actions;

    // Set Data
    public $vendor_id;

    // Model Values
    public $name;

    public function mount()
    {
        if (empty($this->vendor_id)) {
            abort_if(Gate::denies('vendor_add'), 403);

            return;
        }
        abort_if(Gate::denies('vendor_edit'), 403);
        $data = Vendor::findOrFail($this->vendor_id);
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

        if (!empty($this->vendor_id)) {
            Vendor::where('id', $this->vendor_id)->update($validatedData);

            $this->notification()->success($name = 'vendor Updated Successfully!');
        } else {
            Vendor::create($validatedData);

            $this->notification()->success($name = 'vendor Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-vendor');
    }
}
