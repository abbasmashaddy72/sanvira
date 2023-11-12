<?php

namespace App\Livewire\Backend;

use App\Models\Order;
use WireUi\Traits\Actions;
use App\Models\DeliveryNote;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class FormOrder extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    public $name = 'Order';

    // Set Data
    public $order_id;

    public $status_enum = [];

    // Model Keys
    public $status;
    public $purchase_order_pdf;

    // Custom Data
    public $data;
    public $productData;
    public $client_prices = [];

    public function mount()
    {
        $this->status_enum = explode(',', Order::$enumCasts['status']);
        if (empty($this->order_id)) {
            abort_if(Gate::denies('order_add'), 403);

            return;
        }
        abort_if(Gate::denies('order_edit'), 403);
        $this->data = Order::with('buyer', 'products')->findOrFail($this->order_id);
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
        'purchase_order_pdf' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // $validatedData = $this->validate();

        // Assuming $order is an instance of the Order model
        $order = Order::findOrFail($this->order_id);
        // Get all products attached to the Order with their pivot data
        $orderProducts = $order->products;

        // Extract the pivot data for each product
        $productData = $orderProducts->map(function ($product) {
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

        // Create or retrieve an DeliveryNote
        $delivery_note = DeliveryNote::where('buyer_id', auth()->user()->id)
            ->where('status', 'Open')
            ->first();

        if (!$delivery_note) {
            // If no pending DeliveryNote exists, create a new DeliveryNote
            $delivery_note = DeliveryNote::create([
                'order_id' => $order->id,
                'buyer_id' => auth()->user()->id,
                'staff_id' => auth()->user()->id,
                'delivery_note_no' => generateTableNumber('delivery_notes', 'delivery_note_no'),
                'order_submission_date_time' => now(),
                'status' => 'Open',
            ]);
        }

        // Attach the products to the order using the pivot table
        $delivery_note->products()->syncWithoutDetaching($productData);

        if (!empty($this->purchase_order_pdf) && gettype($this->purchase_order_pdf) != 'string') {
            // New PDF provided, store it
            $validatedData['purchase_order_pdf'] = $this->purchase_order_pdf->store('purchase_order_pdf', 'public');

            // Update the order only if a new PDF is provided
            $order->update([
                'status' => $validatedData['status'],
                'purchase_order_pdf' => $validatedData['purchase_order_pdf']
            ]);
        } else {
            // No new PDF provided, only update the status
            $order->update([
                'status' => $this->status,
            ]);
        }


        $this->notification()->success($title = 'Order Submitted Successfully');

        $this->redirect(route('admin.orders'));
    }

    public function render()
    {
        return view('livewire.backend.form-order');
    }
}
