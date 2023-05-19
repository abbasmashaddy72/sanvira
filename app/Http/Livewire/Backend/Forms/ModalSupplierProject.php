<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProject;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierProject extends ModalComponent
{
    use Actions, WithFileUploads;

    // Set Data
    public $supplier_project_id;
    // Model Values
    public $supplier_id, $name, $country, $city, $description, $year_range, $images = [], $feedback;
    // Model Custom Values
    public $isUploaded = false;

    public function mount()
    {
        if (empty($this->supplier_project_id)) {
            return;
        }
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
        if (gettype($this->images) != 'string') {
            $this->isUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->supplier_project_id)) {
            if (!empty($this->images) && gettype($this->images) != 'string') {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImage = [];
                foreach ($images as $key => $image) {
                    $multiImage[$key] = $image->store('supplier_products', 'public');
                }
                $validatedData['images'] = $multiImage;
            }
            SupplierProject::where('id', $this->supplier_project_id)->update($validatedData);

            $this->notification()->success($title = 'Project Updated Successfully!');
        } else {
            if (!empty($this->images) && gettype($this->images) != 'string') {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImage = [];
                foreach ($images as $key => $image) {
                    $multiImage[$key] = $image->store('supplier_products', 'public');
                }
                $validatedData['images'] = $multiImage;
            }
            SupplierProject::create($validatedData);

            $this->notification()->success($title = 'Project Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function deleteImage($supplier_project_id, $key)
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'To delete the Image?',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
                'params' => ['supplier_project_id' => $supplier_project_id, 'key' => $key],
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function delete($params)
    {
        $currentImages = SupplierProject::where('id', $params['supplier_project_id'])->pluck('images')->first();
        $toRemoveImages = [$currentImages[$params['key']]];

        $updatedImages = collect($currentImages)->reject(function ($value) use ($toRemoveImages) {
            return in_array($value, $toRemoveImages);
        });
        SupplierProject::where('id', $params['supplier_project_id'])->update(['images' => $updatedImages]);

        $this->notification()->success($title = 'Supplier Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-project');
    }
}
