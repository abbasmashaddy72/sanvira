<?php

namespace App\Livewire\Backend\Forms;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalCategory extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $category_id;

    public $type;

    // Model Values
    public $name;

    public $image;

    public $parent_id;

    public $imageIsUploaded = false;

    public function mount()
    {
        if (empty($this->category_id)) {
            abort_if(Gate::denies('category_add'), 403);

            return;
        }
        abort_if(Gate::denies('category_edit'), 403);
        $data = Category::findOrFail($this->category_id);
        $this->name = $data->name;
        $this->image = $data->image;
        $this->parent_id = $data->parent_id;
        if ($this->parent_id == 0) {
            $this->type = 'Main Category';
        } else {
            $this->type = 'Sub Category';
        }
    }

    protected $rules = [
        'name' => 'required',
        'image' => 'required',
        'parent_id' => '',
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

        if (!empty($this->category_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('category', 'public');
            }
            Category::where('id', $this->category_id)->update($validatedData);

            $this->notification()->success($title = 'Category Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('category', 'public');
            }
            Category::create($validatedData);

            $this->notification()->success($title = 'Category Saved Successfully!');
        }

        $this->dispatchatch('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-category');
    }
}
