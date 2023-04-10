<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProduct;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierProduct extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_product_id, $supplier_id;
    // Model Values
    public $supplier_product_category_id, $name, $description, $min_max_oq, $edt, $avb_stock, $manufacturer, $brand, $model, $item_type, $sku, $on_sale, $image;

    public function mount()
    {
        if (!empty($this->supplier_product_id)) {
            $data = SupplierProduct::findOrFail($this->supplier_product_id);
            $this->supplier_id = $data->supplier_id;
            $this->supplier_product_category_id = $data->supplier_product_category_id;
            $this->name = $data->name;
            $this->description = $data->description;
            $this->min_max_oq = $data->min_max_oq;
            $this->edt = $data->edt;
            $this->avb_stock = $data->avb_stock;
            $this->manufacturer = $data->manufacturer;
            $this->brand = $data->brand;
            $this->model = $data->model;
            $this->item_type = $data->item_type;
            $this->sku = $data->sku;
            $this->on_sale = $data->on_sale;
            $this->image = $data->image;
        }
    }

    protected $rules = [
        'supplier_id' => '',
        'supplier_product_category_id' => '',
        'name' => '',
        'description' => '',
        'min_max_oq' => '',
        'edt' => '',
        'avb_stock' => '',
        'manufacturer' => '',
        'brand' => '',
        'model' => '',
        'item_type' => '',
        'sku' => '',
        'on_sale' => '',
        'image' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['supplier_id'] = $this->supplier_id;

        if (!empty($this->supplier_product_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_products', 'public');
            }
            SupplierProduct::where('id', $this->supplier_product_id)->update($validatedData);

            $this->notification()->success($title = 'Supplier Product Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_products', 'public');
            }
            SupplierProduct::create($validatedData);

            $this->notification()->success($title = 'Supplier Product Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-product');
    }
}
