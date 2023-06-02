<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierTestimonial;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierTestimonial extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $supplier_testimonial_id;

    public $supplier_id;

    // Model Values
    public $name;

    public $logo;

    public $message;

    public $year;

    public $rating;

    public $logoIsUploaded = false;

    public function mount()
    {
        if (empty($this->supplier_testimonial_id)) {
            abort_if(Gate::denies('supplier_testimonial_add'), 403);

            return;
        }
        abort_if(Gate::denies('supplier_testimonial_edit'), 403);
        $data = SupplierTestimonial::findOrFail($this->supplier_testimonial_id);
        $this->supplier_id = $data->supplier_id;
        $this->name = $data->name;
        $this->logo = $data->logo;
        $this->message = $data->message;
        $this->year = $data->year;
        $this->rating = $data->rating;
    }

    protected $rules = [
        'name' => 'required',
        'logo' => '',
        'message' => 'required',
        'year' => 'required',
        'rating' => 'required',
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
        $validatedData['supplier_id'] = $this->supplier_id;

        if (! empty($this->supplier_testimonial_id)) {
            if (! empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier_team_member', 'public');
            }
            SupplierTestimonial::where('id', $this->supplier_testimonial_id)->update($validatedData);

            $this->notification()->success($title = 'Supplier Team Member Updated Successfully!');
        } else {
            if (! empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier_team_member', 'public');
            }
            SupplierTestimonial::create($validatedData);

            $this->notification()->success($title = 'Supplier Team Member Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-testimonial');
    }
}
