<?php

namespace App\Http\Livewire\Backend\Forms;

use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class ModalContractor extends ModalComponent
{
    public function render()
    {
        return view('livewire.backend.forms.modal-contractor');
    }
}
