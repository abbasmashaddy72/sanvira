<?php

namespace App\Livewire\Backend;

use App\Models\Quotation;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class FormQuotation extends ModalComponent
{
    use Actions;

    // Set Data
    public $quotation_id;

    public $status_enum = [];

    // Model Keys
    public $enquiry_id;

    public $status;

    public function mount()
    {
        $this->status_enum = explode(',', Quotation::$enumCasts['status']);
        if (empty($this->quotation_id)) {
            abort_if(Gate::denies('quotation_add'), 403);

            return;
        }
        abort_if(Gate::denies('quotation_edit'), 403);

        $data = Quotation::findOrFail($this->quotation_id);
        $this->enquiry_id = $data->enquiry_id;
        $this->status = $data->status;
    }

    protected $rules = [
        'enquiry_id' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->quotation_id)) {
            Quotation::where('id', $this->quotation_id)->update($validatedData);

            $this->notification()->success($name = 'Quotation Updated Successfully!');
        } else {
            Quotation::create($validatedData);

            $this->notification()->success($name = 'Quotation Saved Successfully!');
        }

        $this->redirect(route('admin.quotation'));
    }

    public function render()
    {
        return view('livewire.backend.form-quotation');
    }
}
