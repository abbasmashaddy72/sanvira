<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\BrandTransaction;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalBrandTransaction extends ModalComponent
{
    use Actions, WithFileUploads;

    // Set Data
    public $brand_transaction_id, $name;
    // Model Values
    public $brand_id, $account_type, $transaction_type, $amount, $start_date, $end_days, $image, $status;

    public function mount()
    {
        if (!empty($this->brand_transaction_id)) {
            $data = BrandTransaction::with('brands')->findOrFail($this->brand_transaction_id);
            $this->brand_id = $data->brand_id;
            $this->account_type = $data->account_type;
            $this->transaction_type = $data->transaction_type;
            $this->amount = $data->amount;
            $this->start_date = $data->start_date;
            $this->end_days = $data->end_days;
            $this->image = $data->image;
            $this->status = $data->status;
            $this->name = $data->brands->name;
        }
    }

    protected $rules = [
        'brand_id' => '',
        'account_type' => '',
        'transaction_type' => '',
        'amount' => '',
        'start_date' => '',
        'end_days' => '',
        'image' => '',
        'status' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->brand_transaction_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('brand_transactions', 'public');
            }
            BrandTransaction::where('id', $this->brand_transaction_id)->update($validatedData);

            $this->notification()->success($name = 'Brand Transaction Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('brand_transactions', 'public');
            }
            BrandTransaction::create($validatedData);

            $this->notification()->success($name = 'Brand Transaction Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-brand-transaction');
    }
}
