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
    public $delivery_note_id;

    public $status;

    // Custom Data
    public $data;
    public $productData;
    public $client_prices = [];

    public function mount()
    {
        $this->status_enum = explode(',', Invoice::$enumCasts['status']);
        if (empty($this->invoice_id)) {
            abort_if(Gate::denies('invoice_add'), 403);

            return;
        }
        abort_if(Gate::denies('invoice_edit'), 403);

        $this->data = Invoice::findOrFail($this->invoice_id);
        $this->status = $this->data->status;

        // Accessing the products relationship with pivot data
        $this->productData = $this->data->products()->get();

        // Initialize $client_prices array with client prices from $productData
        $this->client_prices = collect($this->productData)
            ->pluck('pivot.client_price', 'id')
            ->map(function ($clientPrice) {
                return $clientPrice ?: ''; // Set to empty string if client_price is null
            })
            ->toArray();
    }

    protected $rules = [
        'delivery_note_id' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // Assuming $invoice is an instance of the Invoice model
        $invoice = Invoice::findOrFail($this->invoice_id);

        // Optionally, you can update Invoice status to 'Submitted' as well
        $invoice->update(['status' => $this->status]);

        $this->notification()->success($title = 'Invoice Submitted Successfully');

        $this->redirect(route('admin.invoice'));
    }

    public function render()
    {
        return view('livewire.backend.form-invoice');
    }
}
