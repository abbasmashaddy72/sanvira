<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProduct;
use App\Models\SupplierProductAttributes;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierProduct extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $supplier_product_id, $supplier_id;
    // SupplierProduct Model Values
    public $supplier_product_category_id, $name, $description, $min_oq, $max_oq, $edt, $avb_stock, $manufacturer, $brand, $model, $item_type, $sku, $on_sale = false, $image;
    // SupplierProductAttributes Model Values
    public $supplier_product_id_spa, $name_spa = [], $value_spa = [];
    // Model Custom Values
    public $min_max_oq, $inputs = [], $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount()
    {
        if (!empty($this->supplier_product_id)) {
            $data = SupplierProduct::findOrFail($this->supplier_product_id);
            $this->supplier_id = $data->supplier_id;
            $this->supplier_product_category_id = $data->supplier_product_category_id;
            $this->name = $data->name;
            $this->description = $data->description;
            $this->min_max_oq = $data->min_oq . '-' . $data->max_oq;
            $this->edt = $data->edt;
            $this->avb_stock = $data->avb_stock;
            $this->manufacturer = $data->manufacturer;
            $this->brand = $data->brand;
            $this->model = $data->model;
            $this->item_type = $data->item_type;
            $this->sku = $data->sku;
            $this->on_sale = $data->on_sale;
            $this->image = $data->image;
            $data_spa = SupplierProductAttributes::where('supplier_product_id', $this->supplier_product_id)->get();
            foreach ($data_spa as $key => $value) {
                $this->name_spa[] = $value->name;
                $this->value_spa[] = $value->value;
                if ($key != 0) {
                    $this->inputs[] = $key;
                }
            }
            $this->i = $data_spa->count();
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

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['supplier_id'] = $this->supplier_id;
        $min_max_oq_data = explode('-', $validatedData['min_max_oq']);
        unset($validatedData['min_max_oq']);
        $validatedData['min_oq'] = $min_max_oq_data[0];
        $validatedData['max_oq'] = $min_max_oq_data[1];

        if (!empty($this->supplier_product_id)) {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_products', 'public');
            }
            SupplierProduct::where('id', $this->supplier_product_id)->update($validatedData);
            SupplierProductAttributes::where('supplier_product_id', $this->supplier_product_id)->delete();
            foreach ($this->name_spa as $key => $value) {
                SupplierProductAttributes::create(['supplier_product_id' => $this->supplier_product_id, 'name' => $this->name_spa[$key], 'value' => $this->value_spa[$key]]);
            }

            $this->notification()->success($title = 'Supplier Product Updated Successfully!');
        } else {
            if (!empty($this->image) && gettype($this->image) != 'string') {
                $validatedData['image'] = $this->image->store('supplier_products', 'public');
            }
            $supplierProduct = SupplierProduct::create($validatedData);
            foreach ($this->name_spa as $key => $value) {
                SupplierProductAttributes::create(['supplier_product_id' => $supplierProduct->id, 'name' => $this->name_spa[$key], 'value' => $this->value_spa[$key]]);
            }

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
