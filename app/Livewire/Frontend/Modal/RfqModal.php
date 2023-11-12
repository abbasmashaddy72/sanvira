<?php

namespace App\Livewire\Frontend\Modal;

use App\Models\Rfq;
use App\Models\Order;
use App\Models\Enquiry;
use WireUi\Traits\Actions;
use LivewireUI\Modal\ModalComponent;

class RfqModal extends ModalComponent
{
    use Actions;

    public $rfqProductLists;

    public $rfqProducts = [];

    public function mount()
    {
        $this->rfqProductLists = Rfq::where('status', 'Pending')->where('user_id', auth()->id())->with('products')->get();
        $this->rfqProducts = Rfq::where('status', 'Pending')->where('user_id', auth()->id())
            ->whereHas('products', function ($query) {
                $query->select('products.id'); // Specify 'products.id' to avoid ambiguity
            })
            ->with(['products' => function ($query) {
                $query->select('products.id'); // Specify 'products.id' to avoid ambiguity
            }])
            ->get()
            ->flatMap(function ($rfq) {
                return $rfq->products;
            })
            ->pluck('id')
            ->unique()
            ->toArray();
    }

    public function removeFromRfq($productId)
    {
        $rfqs = Rfq::where('user_id', auth()->id())->get();
        foreach ($rfqs as $rfq) {
            $rfq->products()->detach($productId);
        }
        if (($key = array_search($productId, $this->rfqProducts)) !== false) {
            unset($this->rfqProducts[$key]);
        }

        $this->notification()->error($title = 'Product Removed from RFQ');
        $this->dispatch('updatedRfq');
        $this->dispatch('rfqUpdated');
        $this->closeModal();
    }

    public function updateRfq($productId, $quantity)
    {
        Rfq::where('product_id', $productId)->where('user_id', auth()->id())->update([
            'quantity' => $quantity,
        ]);

        $this->notification()->success($title = 'Product Quantity Updated in Rfq');
        $this->dispatch('updatedRfq');
        $this->closeModal();
    }

    public function add()
    {
        // Assuming $rfq is an instance of the RFQ model
        $rfq = Rfq::where('user_id', auth()->id())->where('status', 'pending')->first();
        // Get all products attached to the RFQ with their pivot data
        $rfqProducts = $rfq->products;

        // Extract the pivot data for each product
        $productData = $rfqProducts->map(function ($product) {
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
                'client_price' => $product->pivot->client_price,
            ];
        });

        // Create or retrieve an Enquiry
        $enquiry = Enquiry::where('buyer_id', auth()->user()->id)
            ->where('status', 'Open')
            ->first();

        if (!$enquiry) {
            // If no pending Enquiry exists, create a new Enquiry
            $enquiry = Enquiry::create([
                'rfq_id' => $rfq->id,
                'buyer_id' => auth()->user()->id,
                'staff_id' => auth()->user()->id,
                'enquiry_no' => generateTableNumber('enquiries', 'enquiry_no'),
                'rfq_submission_date_time' => now(),
                'status' => 'Open',
            ]);
        }

        // Attach the products to the Enquiry using the pivot table
        $enquiry->products()->syncWithoutDetaching($productData);

        // Optionally, you can update Enquiry status to 'Submitted' as well
        $rfq->update(['status' => 'Submitted']);

        $this->notification()->success($title = 'RFQ Submitted Successfully');
        $this->dispatch('updatedRfq');
        $this->dispatch('rfqUpdated');
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render()
    {
        return view('livewire.frontend.modal.rfq-modal');
    }
}
