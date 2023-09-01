<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProject;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierProject extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $supplier_project_id;

    // Model Values
    public $supplier_id;

    public $name;

    public $country_id;

    public $city;

    public $description;

    public $year_range;

    public $images = [];

    public $feedback;

    // Model Custom Values
    public $isUploaded = false;

    public function mount()
    {
        if (empty($this->supplier_project_id)) {
            abort_if(Gate::denies('supplier_project_add'), 403);

            return;
        }
        abort_if(Gate::denies('supplier_project_edit'), 403);
        $data = SupplierProject::findOrFail($this->supplier_project_id);
        $this->supplier_id = $data->supplier_id;
        $this->name = $data->name;
        $this->country_id = $data->country_id;
        $this->city = $data->city;
        $this->description = $data->description;
        $this->year_range = $data->year_range;
        $this->images = $data->images;
        $this->feedback = $data->feedback;
    }

    protected $rules = [
        'name' => 'required',
        'country_id' => 'required',
        'city' => 'required',
        'description' => '',
        'year_range' => 'required',
        'images' => '',
        'feedback' => 'required',
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
                    $multiImage[$key] = $image->store('supplier_projects', 'public');
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
                    $multiImage[$key] = $image->store('supplier_projects', 'public');
                }
                $validatedData['images'] = $multiImage;
            }
            $validatedData['supplier_id'] = $this->supplier_id;
            SupplierProject::create($validatedData);

            $this->notification()->success($title = 'Project Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function deleteImage($supplier_project_id, $key)
    {
        $this->dialog()->confirm([
            'title' => 'Are you Sure?',
            'description' => 'To delete the Image?',
            'icon' => 'error',
            'accept' => [
                'label' => 'Yes, delete it',
                'method' => 'delete',
                'params' => ['supplier_project_id' => $supplier_project_id, 'key' => $key],
            ],
            'reject' => [
                'label' => 'No, cancel',
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

        $this->emit('refreshLivewireDatatable');
        $this->closeModal();

        $this->notification()->success($title = 'Supplier Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-project');
    }
}
