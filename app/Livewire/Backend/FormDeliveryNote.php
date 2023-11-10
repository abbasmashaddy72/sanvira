<?php

namespace App\Livewire\Backend;

use WireUi\Traits\Actions;
use App\Models\DeliveryNote;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class FormDeliveryNote extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $delivery_note_id;

    public $status_enum = [];

    // Model Keys
    public $order_id;

    public $delivery_notes_attachment;

    public $status;

    public function mount()
    {
        $this->status_enum = explode(',', DeliveryNote::$enumCasts['status']);
        if (empty($this->delivery_note_id)) {
            abort_if(Gate::denies('delivery_note_add'), 403);

            return;
        }
        abort_if(Gate::denies('delivery_note_edit'), 403);
        $data = DeliveryNote::findOrFail($this->delivery_note_id);
        $this->order_id = $data->order_id;
        $this->delivery_notes_attachment = $data->delivery_notes_attachment;
        $this->status = $data->status;
    }

    protected $rules = [
        'order_id' => 'required',
        'delivery_notes_attachment' => '',
        'status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->delivery_note_id)) {
            if (!empty($this->delivery_notes_attachment) && gettype($this->delivery_notes_attachment) != 'string') {
                $validatedData['delivery_notes_attachment'] = $this->delivery_notes_attachment->store('delivery_note', 'public');
            }

            DeliveryNote::where('id', $this->delivery_note_id)->update($validatedData);

            $this->notification()->success($name = 'Delivery Note Updated Successfully!');
        } else {
            if (!empty($this->delivery_notes_attachment) && gettype($this->delivery_notes_attachment) != 'string') {
                $validatedData['delivery_notes_attachment'] = $this->delivery_notes_attachment->store('delivery_note', 'public');
            }

            DeliveryNote::create($validatedData);

            $this->notification()->success($name = 'Delivery Note Saved Successfully!');
        }

        $this->redirect(route('admin.delivery_note'));
    }

    public function render()
    {
        return view('livewire.backend.form-delivery-note');
    }
}
