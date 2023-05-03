<?php

namespace App\Http\Livewire\Frontend\Counter;

use App\Models\Rfq;
use Livewire\Component;

class RfqCounter extends Component
{
    public $rfqProducts;
    protected $listeners = ['updateRfq' => 'render'];

    public function mount()
    {
        $this->rfqProducts = Rfq::where('user_id', auth()->id())->pluck('supplier_product_id')->toArray();
    }

    public function render()
    {
        $rfqCount = Rfq::where('user_id', auth()->id())->count();

        return view('livewire.frontend.counter.rfq-counter', compact('rfqCount'));
    }
}
