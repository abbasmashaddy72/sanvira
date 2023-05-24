<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierTransaction;
use LivewireUI\Modal\ModalComponent;

class ModalSupplierTransaction extends ModalComponent
{
    // Set Data
    public $supplier_transaction_id, $name;
    // Model Values
    public $supplier_id, $account_type, $transaction_type, $amount, $start_date, $end_days, $image, $status;

    public function mount()
    {
        if (!empty($this->supplier_transaction_id)) {
            $data = SupplierTransaction::with('suppliers')->findOrFail($this->supplier_transaction_id);
            $this->supplier_id = $data->supplier_id;
            $this->account_type = $data->account_type;
            $this->transaction_type = $data->transaction_type;
            $this->amount = $data->amount;
            $this->start_date = $data->start_date;
            $this->end_days = $data->end_days;
            $this->image = $data->image;
            $this->status = $data->status;
            $this->name = $data->suppliers->company_name;
        }
    }

    protected $rules = [
        'supplier_id' => '',
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

        if (!empty($this->supplier_transaction_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_transactions', 'public');
            }
            SupplierTransaction::where('id', $this->supplier_transaction_id)->update($validatedData);

            $this->notification()->success($name = 'Supplier Transaction Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_transactions', 'public');
            }
            SupplierTransaction::create($validatedData);

            $this->notification()->success($name = 'Supplier Transaction Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-transaction');
    }
}
