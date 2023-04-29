<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Supplier;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplier extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_id;
    // Model Values
    public $user_id, $company_name, $company_email, $company_address, $company_number, $company_locality, $tagline, $logo, $yoe, $website_url, $description, $terms_conditions, $contact_person_name, $contact_person_email, $contact_person_number;

    public function mount()
    {
        if (!empty($this->supplier_id)) {
            $data = Supplier::findOrFail($this->supplier_id);
            $this->user_id = $data->user_id;
            $this->company_name = $data->company_name;
            $this->company_email = $data->company_email;
            $this->company_address = $data->company_address;
            $this->company_number = $data->company_number;
            $this->company_locality = $data->company_locality;
            $this->tagline = $data->tagline;
            $this->logo = $data->logo;
            $this->yoe = $data->yoe;
            $this->website_url = $data->website_url;
            $this->description = $data->description;
            $this->terms_conditions = $data->terms_conditions;
            $this->contact_person_name = $data->contact_person_name;
            $this->contact_person_email = $data->contact_person_email;
            $this->contact_person_number = $data->contact_person_number;
        }
    }

    protected $rules = [
        'company_name' => '',
        'company_email' => '',
        'company_address' => '',
        'company_number' => '',
        'company_locality' => '',
        'tagline' => '',
        'logo' => '',
        'yoe' => '',
        'website_url' => '',
        'description' => '',
        'terms_conditions' => '',
        'contact_person_name' => '',
        'contact_person_email' => '',
        'contact_person_number' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->supplier_id)) {
            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier', 'public');
            }
            Supplier::where('id', $this->supplier_id)->update($validatedData);

            $this->notification()->success($title = 'Supplier Updated Successfully!');
        } else {
            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier', 'public');
            }
            Supplier::create($validatedData);

            $this->notification()->success($title = 'Supplier Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier');
    }
}
