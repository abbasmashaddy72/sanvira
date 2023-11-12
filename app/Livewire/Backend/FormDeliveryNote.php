<?php

namespace App\Livewire\Backend;

use App\Models\Invoice;
use WireUi\Traits\Actions;
use App\Models\DeliveryNote;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class FormDeliveryNote extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $delivery_note_id;

    public $status_enum = [];

    // Model Keys
    public $order_id;

    public $delivery_notes_attachment;

    public $status;

    // Custom Data
    public $data;
    public $productData;
    public $client_prices = [];

    public function mount()
    {
        $this->status_enum = explode(',', DeliveryNote::$enumCasts['status']);
        if (empty($this->delivery_note_id)) {
            abort_if(Gate::denies('delivery_note_add'), 403);

            return;
        }
        abort_if(Gate::denies('delivery_note_edit'), 403);
        $this->data = DeliveryNote::with('buyer', 'products')->findOrFail($this->delivery_note_id);
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
        'delivery_notes_attachment' => '',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        // Assuming $deliveryNote is an instance of the DeliveryNote model
        $deliveryNote = DeliveryNote::findOrFail($this->delivery_note_id);
        // Get all products attached to the DeliveryNote with their pivot data
        $deliveryNoteProducts = $deliveryNote->products;

        // Extract the pivot data for each product
        $productData = $deliveryNoteProducts->map(function ($product) {
            return [
                'product_id' => $product->id,
                'brand_id' => $product->pivot->brand_id,
                'size' => $product->pivot->size,
                'weight' => $product->pivot->weight,
                'diameter' => $product->pivot->diameter,
                'quantity_type' => $product->pivot->quantity_type,
                'color' => $product->pivot->color,
                'item_type' => $product->pivot->item_type,
                'quantity' => $product->pivot->quantity,
                'our_price' => $product->pivot->our_price,
                'client_price' => $this->client_prices[$product->pivot->product_id] ?? null,
            ];
        });

        // Create or retrieve an Invoice
        $invoice = Invoice::where('buyer_id', auth()->user()->id)
            ->where('status', 'Open')
            ->first();

        if (!$invoice) {
            // If no pending Invoice exists, create a new Invoice
            $invoice = Invoice::create([
                'delivery_note_id' => $deliveryNote->id,
                'buyer_id' => auth()->user()->id,
                'staff_id' => auth()->user()->id,
                'invoice_no' => generateTableNumber('invoices', 'invoice_no'),
                'delivery_note_submission_date_time' => now(),
                'status' => 'Open',
            ]);
        }

        // Attach the products to the DeliveryNote using the pivot table
        $invoice->products()->syncWithoutDetaching($productData);

        if (!empty($this->delivery_notes_attachment) && gettype($this->delivery_notes_attachment) != 'string') {
            // New attachment provided, store it
            $validatedData['delivery_notes_attachment'] = $this->delivery_notes_attachment->store('delivery_notes_attachment', 'public');

            // Update the delivery note only if a new attachment is provided
            $deliveryNote->update([
                'status' => $validatedData['status'],
                'delivery_notes_attachment' => $validatedData['delivery_notes_attachment']
            ]);
        } else {
            // No new attachment provided, only update the status
            $deliveryNote->update([
                'status' => $validatedData['status'],
            ]);
        }

        $this->notification()->success($title = 'Delivery Note Submitted Successfully');

        $this->redirect(route('admin.delivery_note'));
    }

    public function render()
    {
        return view('livewire.backend.form-delivery-note');
    }
}
