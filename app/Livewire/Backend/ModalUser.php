<?php

namespace App\Livewire\Backend;

use App\Models\Role;
use App\Models\User;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class ModalUser extends ModalComponent
{
    use Actions;

    use WithFileUploads;

    // Set Data
    public $user_id;

    // Model Values
    public $name;

    public $email;

    public $password;

    public $mobile;

    public $street_no;

    public $locality;

    public $landmark;

    public $city_id;

    public $zip_code;

    public $subscription;

    public $image;

    // Custom Values
    public $role;

    public $imageIsUploaded = false;

    public function mount()
    {
        if (empty($this->user_id)) {
            abort_if(Gate::denies('user_add'), 403);

            return;
        }
        abort_if(Gate::denies('user_edit'), 403);
        $data = User::findOrFail($this->user_id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->mobile = $data->mobile;
        $this->street_no = $data->street_no;
        $this->locality = $data->locality;
        $this->landmark = $data->landmark;
        $this->city_id = $data->city_id;
        $this->zip_code = $data->zip_code;
        $this->subscription = $data->subscription;
        $this->image = $data->image;
        $this->password = $data->password;
        if (!empty($data->roles->first()->name)) {
            $this->role = Role::where('name', $data->roles->first()->name)->pluck('id');
        }
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'mobile' => '',
        'street_no' => '',
        'locality' => '',
        'landmark' => '',
        'city_id' => '',
        'zip_code' => '',
        'subscription' => '',
        'image' => '',
        'role' => 'required',
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

        if (!empty($this->user_id)) {
            if ($this->password != $validatedData['password']) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('users', 'public');
            }

            $role = $validatedData['role'];
            unset($validatedData['role']);

            User::where('id', $this->user_id)->update($validatedData);

            User::find($this->user_id)->roles()->sync($role);

            $this->notification()->success($title = 'User Updated Successfully!');
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('users', 'public');
            }

            $role = $validatedData['role'];
            unset($validatedData['role']);

            $user = User::create($validatedData);

            User::find($user->id)->roles()->attach([$role]);

            $this->notification()->success($title = 'User Saved Successfully!');
        }

        $this->dispatch('pg:eventRefresh-default');

        $this->closeModal();
    }

    public function render()
    {
        $roles = Role::get();

        return view('livewire.backend.modal-user', compact('roles'));
    }
}
