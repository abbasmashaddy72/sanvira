<?php

namespace App\Livewire\Backend;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalRole extends ModalComponent
{
    use Actions;

    // Set Data
    public $role_id;

    // Model Values
    public $name;

    public $slug;

    // Custom
    public $permissions_array = [];

    public function mount()
    {
        if (empty($this->role_id)) {
            abort_if(Gate::denies('role_add'), 403);

            return;
        }
        abort_if(Gate::denies('role_edit'), 403);
        $data = Role::findOrFail($this->role_id);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->permissions_array = $this->permissions_array = $data->permissions->pluck('id')->toArray();
    }

    protected $rules = [
        'name' => 'required',
        'slug' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->role_id)) {
            $role = Role::where('id', $this->role_id)->first();

            Role::where('id', $this->role_id)->update($validatedData);

            $role->permissions()->sync($this->permissions_array);

            $this->notification()->success($title = 'Role Updated Successfully!');
        } else {
            $validatedData['slug'] = str_replace(' ', '_', strtolower($validatedData['name']));
            $role = Role::create($validatedData);

            $role->permissions()->sync($this->permissions_array);

            $this->notification()->success($title = 'Role Saved Successfully!');
        }

        $this->dispatchatch('refreshLivewireDatatable');

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function render()
    {
        $permissions = Permission::all()->toArray();

        return view('livewire.backend.modal-role', compact('permissions'));
    }
}
