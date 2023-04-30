<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierTeam;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierTeamMember extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_team_member_id, $supplier_id;
    // Model Values
    public $name, $image, $designation;

    public function mount()
    {
        if (!empty($this->supplier_team_member_id)) {
            $data = SupplierTeam::findOrFail($this->supplier_team_member_id);
            $this->supplier_id = $data->supplier_id;
            $this->name = $data->name;
            $this->image = $data->image;
            $this->designation = $data->designation;
        }
    }

    protected $rules = [
        'name' => '',
        'image' => '',
        'designation' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['supplier_id'] = $this->supplier_id;

        if (!empty($this->supplier_team_member_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_team_member', 'public');
            }
            SupplierTeam::where('id', $this->supplier_team_member_id)->update($validatedData);

            $this->notification()->success($title = 'Supplier Team Member Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_team_member', 'public');
            }
            SupplierTeam::create($validatedData);

            $this->notification()->success($title = 'Supplier Team Member Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-team-member');
    }
}
