<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SubContractor;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSubContractor extends ModalComponent
{
    use Actions;
    // Set Data
    public $sub_contractor_id;
    // Model Values
    public $user_id, $name, $email, $address, $number, $locality, $description, $terms_conditions;

    public function mount()
    {
        if (empty($this->sub_contractor_id)) {
            abort_if(Gate::denies('sub_contractor_add'), 403);
            return;
        }
        abort_if(Gate::denies('sub_contractor_edit'), 403);
        $data = SubContractor::findOrFail($this->sub_contractor_id);
        $this->user_id = $data->user_id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->address = $data->address;
        $this->number = $data->number;
        $this->locality = $data->locality;
        $this->description = $data->description;
        $this->terms_conditions = $data->terms_conditions;
    }

    protected $rules = [
        'name' => '',
        'email' => '',
        'address' => '',
        'number' => '',
        'locality' => '',
        'description' => '',
        'terms_conditions' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->sub_contractor_id)) {
            SubContractor::where('id', $this->sub_contractor_id)->update($validatedData);

            $this->notification()->success($title = 'SubContractor Updated Successfully!');
        } else {
            SubContractor::create($validatedData);

            $this->notification()->success($title = 'SubContractor Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-sub-contractor');
    }
}
