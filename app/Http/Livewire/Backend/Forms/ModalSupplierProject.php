<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProject;
use LivewireUI\Modal\ModalComponent;

class ModalSupplierProject extends ModalComponent
{
    // Set Data
    public $supplier_project_id;
    // Model Values
    public $supplier_id, $name, $country, $city, $description, $year_range, $images, $feedback;

    public function mount()
    {
        if (!empty($this->supplier_project_id)) {
            $data = SupplierProject::findOrFail($this->supplier_project_id);
            $this->supplier_id = $data->supplier_id;
            $this->name = $data->name;
            $this->country = $data->country;
            $this->city = $data->city;
            $this->description = $data->description;
            $this->year_range = $data->year_range;
            $this->images = $data->images;
            $this->feedback = $data->feedback;
        }
    }

    protected $rules = [
        'name' => '',
        'country' => '',
        'city' => '',
        'description' => '',
        'year_range' => '',
        'images' => '',
        'feedback' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->supplier_project_id)) {
            SupplierProject::where('id', $this->supplier_project_id)->update($validatedData);

            $this->notification()->success($title = 'Project Updated Successfully!');
        } else {
            SupplierProject::create($validatedData);

            $this->notification()->success($title = 'Project Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-project');
    }
}
