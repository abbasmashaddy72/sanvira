<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierCertificate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierCertificate extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_certificate_id, $supplier_id;
    // Model Values
    public $title, $attachment, $type;

    public function mount()
    {
        if (empty($this->supplier_certificate_id)) {
            return;
        }
        $data = SupplierCertificate::findOrFail($this->supplier_certificate_id);
        $this->supplier_id = $data->supplier_id;
        $this->title = $data->title;
        $this->attachment = $data->attachment;
        $this->type = $data->type;
    }

    protected $rules = [
        'title' => '',
        'attachment' => '',
        'type' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['supplier_id'] = $this->supplier_id;

        if (!empty($this->supplier_certificate_id)) {
            if (!empty($this->attachment) && gettype($this->attachment) != 'string') {
                $validatedData['attachment'] = $this->attachment->store('supplier_certificates', 'public');
            }
            SupplierCertificate::where('id', $this->supplier_certificate_id)->update($validatedData);

            $this->notification()->success($title = 'Supplier Certificate Updated Successfully!');
        } else {
            if (!empty($this->attachment) && gettype($this->attachment) != 'string') {
                $validatedData['attachment'] = $this->attachment->store('supplier_certificates', 'public');
            }
            SupplierCertificate::create($validatedData);

            $this->notification()->success($title = 'Supplier Certificate Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-certificate');
    }
}
