<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\Rfq;
use LivewireUI\Modal\ModalComponent;

class RfqModal extends ModalComponent
{
    public $rfqProductLists;

    public function mount()
    {
        $this->rfqProductLists = Rfq::where('user_id', auth()->id())->with('supplierProducts')->get();
    }

    public function render()
    {
        return view('livewire.frontend.modal.rfq-modal');
    }
}
