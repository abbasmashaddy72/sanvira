<?php

namespace App\Livewire\Backend;

use App\Models\Order;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class FormOrder extends ModalComponent
{
    use Actions;

    public $name = 'Order';

    // Set Data
    public $order_id;

    // Model Keys
    public $status;

    public function mount()
    {
        if (empty($this->order_id)) {
            abort_if(Gate::denies('brand_add'), 403);

            return;
        }
        abort_if(Gate::denies('brand_edit'), 403);
        $data = Order::findOrFail($this->order_id);
        $this->status = $data->status;
    }

    protected $rules = [
        'status' => 'required',
    ];

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->order_id)) {
            Order::where('id', $this->order_id)->update($validatedData);

            $this->notification()->success($name = 'Order Updated Successfully!');
        } else {
            Order::create($validatedData);

            $this->notification()->success($name = 'Order Saved Successfully!');
        }

        $this->redirect(route('admin.order'));
    }

    public function render()
    {
        return view('livewire.backend.form-order');
    }
}
