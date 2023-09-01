<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Role;
use App\Models\Supplier;
use App\Models\SupplierTeam;
use App\Models\SupplierTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ModalSupplier extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $supplier_id;

    // Model Values
    public $user_id;

    public $company_name;

    public $company_email;

    public $company_address;

    public $company_number;

    public $company_locality;

    public $tagline;

    public $logo;

    public $doe;

    public $license;

    public $type;

    public $website_url;

    public $description;

    public $terms_conditions;

    public $agree;

    public $verification = false;

    public $contact_person_name;

    public $contact_person_email;

    public $contact_person_number;

    public $contact_person_poc;

    public $logoIsUploaded = false;

    public function mount()
    {
        if (empty($this->supplier_id)) {
            abort_if(Gate::denies('supplier_add'), 403);

            return;
        }
        abort_if(Gate::denies('supplier_edit'), 403);
        $data = Supplier::with('manager')->findOrFail($this->supplier_id);
        $this->user_id = $data->user_id;
        $this->company_name = $data->company_name;
        $this->company_email = $data->company_email;
        $this->company_address = $data->company_address;
        $this->company_number = $data->company_number;
        $this->company_locality = $data->company_locality;
        $this->tagline = $data->tagline;
        $this->logo = $data->logo;
        $this->doe = $data->doe;
        $this->license = $data->license;
        $this->type = $data->type;
        $this->website_url = $data->website_url;
        $this->description = $data->description;
        $this->terms_conditions = $data->terms_conditions;
        $this->agree = $data->agree;
        $this->verification = $data->verification;
        $this->contact_person_name = $data->manager->name;
        $this->contact_person_email = $data->manager->email;
        $this->contact_person_number = $data->manager->phone;
        $this->contact_person_poc = $data->manager->poc;
    }

    protected $rules = [
        'company_name' => 'required',
        'company_email' => '',
        'company_address' => 'required',
        'company_number' => '',
        'company_locality' => 'required',
        'tagline' => '',
        'logo' => '',
        'doe' => 'required',
        'license' => 'required',
        'type' => 'required',
        'website_url' => '',
        'description' => '',
        'terms_conditions' => '',
        'verification' => '',
        'contact_person_name' => 'required',
        'contact_person_email' => 'required',
        'contact_person_number' => 'required',
        'contact_person_poc' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if (gettype($this->logo) != 'string') {
            $this->logoIsUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->supplier_id)) {
            $contact_person_name = $validatedData['contact_person_name'];
            $contact_person_email = $validatedData['contact_person_email'];
            $contact_person_number = $validatedData['contact_person_number'];
            $contact_person_poc = $validatedData['contact_person_poc'];
            unset($validatedData['contact_person_name']);
            unset($validatedData['contact_person_email']);
            unset($validatedData['contact_person_number']);
            unset($validatedData['contact_person_poc']);

            $user = User::where('id', $this->user_id)->update([
                'name' => $contact_person_name,
                'email' => $contact_person_email,
            ]);

            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier', 'public');
            }

            $validatedData['user_id'] = $this->user_id;
            $validatedData['type'] = $this->type ?? 'Supplier';
            $validatedData['agree'] = 1;

            $supplier = Supplier::where('id', $this->supplier_id)->update($validatedData);

            SupplierTeam::where('user_id', $this->user_id)->update([
                'supplier_id' => $this->supplier_id,
                'user_id' => $this->user_id,
                'name' => $contact_person_name,
                'email' => $contact_person_email,
                'phone' => $contact_person_number,
                'poc' => $contact_person_poc,
            ]);

            $this->notification()->success($title = 'Supplier Updated Successfully!');
        } else {
            $contact_person_name = $validatedData['contact_person_name'];
            $contact_person_email = $validatedData['contact_person_email'];
            $contact_person_number = $validatedData['contact_person_number'];
            $contact_person_poc = $validatedData['contact_person_poc'];
            unset($validatedData['contact_person_name']);
            unset($validatedData['contact_person_email']);
            unset($validatedData['contact_person_number']);
            unset($validatedData['contact_person_poc']);

            $user = User::create([
                'name' => $contact_person_name,
                'email' => $contact_person_email,
                'password' => Hash::make(explode(' ', $contact_person_name)[0] . '@' . substr($contact_person_number, -3)),
            ]);

            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier', 'public');
            }

            $validatedData['user_id'] = $user->id;
            $validatedData['type'] = 'Supplier';
            $validatedData['agree'] = 1;

            $supplier = Supplier::create($validatedData);

            SupplierTeam::create([
                'supplier_id' => $supplier->id,
                'user_id' => $user->id,
                'name' => $contact_person_name,
                'email' => $contact_person_email,
                'phone' => $contact_person_number,
                'poc' => $contact_person_poc,
                'image' => null,
            ]);

            $user->roles()->attach(Role::where('name', 'Supplier')->pluck('id'));

            $this->notification()->success($title = 'Supplier Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier');
    }
}
