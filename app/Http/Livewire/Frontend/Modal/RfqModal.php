<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\Rfq;
use App\Models\Order;
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
        $this->emit('updatedRfq');
        $this->emit('rfqUpdated');
        $this->closeModal();
    }

    public function updateRfq($productId, $quantity)
    {
        Rfq::where('product_id', $productId)->where('user_id', auth()->id())->update([
            'quantity' => $quantity,
        ]);

        $this->notification()->success($title = 'Product Quantity Updated in Rfq');
        $this->emit('updatedRfq');
        $this->closeModal();
    }

    public function add()
    {
        $rfqs = Rfq::where('user_id', auth()->id())->get();
        foreach ($rfqs as $rfq) {
            Order::create([
                'rfq_id' => $rfq->id,
                'rfq_submission_date' => now(),
            ]);
            $rfq->update([
                'status' => 'Submitted',
            ]);
        }

        $this->notification()->success($title = 'RFQ Submitted Successfully');
        $this->emit('updatedRfq');
        $this->emit('rfqUpdated');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.frontend.modal.rfq-modal');
    }
}
