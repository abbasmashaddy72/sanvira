<?php

namespace App\Livewire\Backend;

use App\Models\Invoice;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class FormInvoice extends ModalComponent
{
    use Actions;

    // Set Data
    public $invoice_id;

    public $status_enum = [];

    // Model Keys
    public $order_id;

    public $status;

    public function mount()
    {
        $this->status_enum = explode(',', Invoice::$enumCasts['status']);
        if (empty($this->invoice_id)) {
            abort_if(Gate::denies('invoice_add'), 403);

            return;
        }
        abort_if(Gate::denies('invoice_edit'), 403);

        $data = Invoice::findOrFail($this->invoice_id);
        $this->order_id = $data->order_id;
        $this->status = $data->status;
    }

    protected $rules = [
        'order_id' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->invoice_id)) {
            Invoice::where('id', $this->invoice_id)->update($validatedData);

            $this->notification()->success($name = 'Invoice Updated Successfully!');
        } else {
            Invoice::create($validatedData);

            $this->notification()->success($name = 'Invoice Saved Successfully!');
        }

        $this->redirect(route('admin.invoice'));
    }

    public function render()
    {
        return view('livewire.backend.form-invoice');
    }
}
