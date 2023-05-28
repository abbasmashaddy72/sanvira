<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierTestimonial;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierTestimonial extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_testimonial_id, $supplier_id;
    // Model Values
    public $name, $logo, $message, $year, $rating;

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
        'name' => '',
        'logo' => '',
        'message' => '',
        'year' => '',
        'rating' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['supplier_id'] = $this->supplier_id;

        if (!empty($this->supplier_testimonial_id)) {
            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('supplier_team_member', 'public');
            }
            SupplierTestimonial::where('id', $this->supplier_testimonial_id)->update($validatedData);

            $this->notification()->success($title = 'Supplier Team Member Updated Successfully!');
        } else {
            if (!empty($this->logo) && gettype($this->logo) != 'string') {
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
