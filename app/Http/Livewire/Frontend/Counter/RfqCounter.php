<?php

namespace App\Http\Livewire\Frontend\Counter;

use App\Models\Rfq;
use Livewire\Component;

class RfqCounter extends Component
{
    protected $listeners = ['updatedRfq' => 'render'];

    public function render()
    {
        $rfqs = Rfq::where('status', 'Pending')->where('user_id', auth()->id())->withCount('products')->get();
        $totalProductCount = $rfqs->sum('products_count');

        return view('livewire.frontend.counter.rfq-counter', compact('totalProductCount'));
    }
}
