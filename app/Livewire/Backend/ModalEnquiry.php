<?php

namespace App\Livewire\Backend;

use App\Models\Enquiry;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class ModalEnquiry extends ModalComponent
{
    use Actions;

    // Set Data
    public $enquiry_id;

    public $status_enum = [];

    // Model Values
    public $rfq_id;

    public $user_id;

    public $submission_time;

    public $status;

    public function mount()
    {
        $this->status_enum = explode(',', Enquiry::$enumCasts['status']);
        if (empty($this->enquiry_id)) {
            abort_if(Gate::denies('brand_add'), 403);

            return;
        }
        abort_if(Gate::denies('brand_edit'), 403);

        $data = Enquiry::findOrFail($this->enquiry_id);
        $this->rfq_id = $data->rfq_id;
        $this->user_id = $data->user_id;
        $this->submission_time = $data->submission_time;
        $this->status = $data->status;
    }

    protected $rules = [
        'rfq_id' => 'required',
        'user_id' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->enquiry_id)) {
            Enquiry::where('id', $this->enquiry_id)->update($validatedData);

            $this->notification()->success($name = 'Enquiry Updated Successfully!');
        } else {
            Enquiry::create($validatedData);

            $this->notification()->success($name = 'Enquiry Saved Successfully!');
        }

        $this->dispatch('pg:eventRefresh-default');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.modal-enquiry');
    }
}