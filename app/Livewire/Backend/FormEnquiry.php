<?php

namespace App\Livewire\Backend;

use App\Models\Enquiry;
use Livewire\Component;
use App\Models\Quotation;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;

class FormEnquiry extends Component
{
    use Actions;

    // Set Data
    public $enquiry_id;

    public $status_enum = [];

    // Model Keys
    public $rfq_id;

    public $user_id;

    public $rfq_submission_date_time;

    public $status;

    // Custom Data
    public $data;
    public $productData;
    public $client_prices = [];

    public function mount()
    {
        $this->status_enum = explode(',', Enquiry::$enumCasts['status']);
        if (empty($this->enquiry_id)) {
            abort_if(Gate::denies('enquiry_add'), 403);

            return;
        }
        abort_if(Gate::denies('enquiry_edit'), 403);

        $this->data = Enquiry::with('rfq', 'buyer')->findOrFail($this->enquiry_id);
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
        'rfq_id' => 'required',
        'user_id' => 'required',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // Assuming $enquiry is an instance of the Enquiry model
        $enquiry = Enquiry::findOrFail($this->enquiry_id);
        // Get all products attached to the Enquiry with their pivot data
        $enquiryProducts = $enquiry->products;

        // Extract the pivot data for each product
        $productData = $enquiryProducts->map(function ($product) {
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
        // Create or retrieve an Quotation
        $quotation = Quotation::where('buyer_id', auth()->user()->id)
            ->where('status', 'Open')
            ->first();

        if ($quotation) {

            // Attach the products to the Enquiry using the pivot table
            $quotation->products()->syncWithoutDetaching($productData);

            // Optionally, you can update Enquiry status to 'Submitted' as well
            $enquiry->update(['status' => $this->status]);

            $this->notification()->success($title = 'Enquiry Submitted Successfully');

            $this->redirect(route('admin.enquiry'));
            return;
        }
        // If no pending Quotation exists, create a new Quotation
        $quotation = Quotation::create([
            'enquiry_id' => $enquiry->id,
            'buyer_id' => auth()->user()->id,
            'staff_id' => auth()->user()->id,
            'quotation_no' => generateTableNumber('quotations', 'quotation_no'),
            'enquiry_submission_date_time' => now(),
            'status' => 'Open',
        ]);


        // Attach the products to the Enquiry using the pivot table
        $quotation->products()->syncWithoutDetaching($productData);

        // Optionally, you can update Enquiry status to 'Submitted' as well
        $enquiry->update(['status' => $this->status]);

        $this->notification()->success($title = 'Enquiry Submitted Successfully');

        $this->redirect(route('admin.enquiry'));
    }

    public function render()
    {
        return view('livewire.backend.form-enquiry');
    }
}
