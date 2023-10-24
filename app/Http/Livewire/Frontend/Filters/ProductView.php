<?php

namespace App\Http\Livewire\Frontend\Filters;

use App\Models\Rfq;
use Livewire\Component;
use WireUi\Traits\Actions;

class ProductView extends Component
{
    use Actions;

    public $type;

    public $item;

    public $rfqProducts = [];

    public $quantity = [];

    protected $listeners = ['rfqUpdated' => 'render'];

    public function mount()
    {
        $this->rfqProducts = Rfq::where('user_id', auth()->id())->pluck('product_id')->toArray();
    }

    public function addToRfq($productId)
    {
        Rfq::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'quantity' => $this->quantity[$productId],
        ]);
        $this->rfqProducts[] = $productId;

        $this->notification()->success($title = 'Product Added to RFQ');
        $this->emit('updateRfq');
    }

    public function removeFromRfq($productId)
    {
        Rfq::where('product_id', $productId)->where('user_id', auth()->id())->delete();
        if (($key = array_search($productId, $this->rfqProducts)) !== false) {
            unset($this->rfqProducts[$key]);
        }

        $this->notification()->error($title = 'Product Removed from RFQ');
        $this->emit('updateRfq');
    }

    public function render()
    {
        return view('livewire.frontend.filters.product-view');
    }
}
