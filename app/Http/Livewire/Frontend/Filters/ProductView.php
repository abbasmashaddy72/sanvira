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

    public function addToRfq($productId)
    {
        // Create an RFQ
        $rfq = new Rfq;
        $rfq->user_id = auth()->id();
        $rfq->save();

        // Attach products to the RFQ
        $rfq->products()->attach([
            $productId => ['quantity' => $this->quantity[$productId]],
        ]);

        $this->rfqProducts[] = $productId;

        $this->notification()->success($title = 'Product Added to RFQ');
        $this->emit('updatedRfq');
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
    }

    public function render()
    {
        return view('livewire.frontend.filters.product-view');
    }
}
