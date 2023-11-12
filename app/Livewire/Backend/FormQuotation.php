<?php

namespace App\Livewire\Backend;

use App\Models\Order;
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

    // Custom Data
    public $data;
    public $productData;
    public $client_prices = [];

    public function mount()
    {
        $this->status_enum = explode(',', Quotation::$enumCasts['status']);
        if (empty($this->quotation_id)) {
            abort_if(Gate::denies('quotation_add'), 403);

            return;
        }
        abort_if(Gate::denies('quotation_edit'), 403);

        $this->data = Quotation::with('enquiry', 'buyer')->findOrFail($this->quotation_id);
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
        'enquiry_id' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // Assuming $quotation is an instance of the Quotation model
        $quotation = Quotation::findOrFail($this->quotation_id);
        // Get all products attached to the Quotation with their pivot data
        $quotationProducts = $quotation->products;

        // Extract the pivot data for each product
        $productData = $quotationProducts->map(function ($product) {
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
                'client_price' => $this->client_prices[$product->pivot->id] ?? null,
            ];
        });

        // Create or retrieve an Order
        $order = Order::where('buyer_id', auth()->user()->id)
            ->where('status', 'Open')
            ->first();

        if (!$order) {
            // If no pending Order exists, create a new Order
            $order = Order::create([
                'quotation_id' => $quotation->id,
                'buyer_id' => auth()->user()->id,
                'staff_id' => auth()->user()->id,
                'order_no' => generateTableNumber('orders', 'order_no'),
                'quotation_submission_date_time' => now(),
                'status' => 'Open',
            ]);
        }

        // Attach the products to the Quotation using the pivot table
        $order->products()->syncWithoutDetaching($productData);

        // Optionally, you can update Quotation status to 'Submitted' as well
        $quotation->update(['status' => $this->status]);

        $this->notification()->success($title = 'Quotation Submitted Successfully');

        $this->redirect(route('admin.quotation'));
    }

    public function render()
    {
        return view('livewire.backend.form-quotation');
    }
}
