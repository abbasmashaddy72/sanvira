<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\Rfq;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class RfqModal extends ModalComponent
{
    use Actions;

    public $rfqProductLists;

    public $rfqProducts = [];

    public function mount()
    {
        $this->rfqProductLists = Rfq::where('user_id', auth()->id())->with('products')->get();
        $this->rfqProducts = Rfq::where('user_id', auth()->id())->pluck('product_id')->toArray();
    }

    public function removeFromRfq($productId)
    {
        Rfq::where('product_id', $productId)->where('user_id', auth()->id())->delete();
        if (($key = array_search($productId, $this->rfqProducts)) !== false) {
            unset($this->rfqProducts[$key]);
        }

        $this->notification()->error($title = 'Product Removed from RFQ');
        $this->emit('updateRfq');
        $this->closeModal();
    }

    public function updateRfq($productId, $quantity)
    {
        Rfq::where('product_id', $productId)->where('user_id', auth()->id())->update([
            'quantity' => $quantity,
        ]);

        $this->notification()->success($title = 'Product Quantity Updated in Rfq');
        $this->emit('updateRfq');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.frontend.modal.rfq-modal');
    }
}
