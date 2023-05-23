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
    public $supplier_product_category_id, $country_id, $brand_id, $manufacturer_id, $name, $description, $min_oq, $max_oq, $edt, $avb_stock, $model, $item_type, $sku, $on_sale = false, $images = [], $price, $min_price, $max_price;
    // SupplierProductAttributes Model Values
    public $supplier_product_id_spa, $name_spa = [], $value_spa = [];
    // Model Custom Values
    public $min_max_oq, $inputs = [], $i = 1, $isUploaded = false;

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
        if (empty($this->supplier_product_id)) {
            return;
        }
        $data = SupplierProduct::findOrFail($this->supplier_product_id);
        $this->supplier_id = $data->supplier_id;
        $this->supplier_product_category_id = $data->supplier_product_category_id;
        $this->country_id = $data->country_id;
        $this->brand_id = $data->brand_id;
        $this->manufacturer_id = $data->manufacturer_id;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->min_max_oq = $data->min_oq . '-' . $data->max_oq;
        $this->edt = $data->edt;
        $this->avb_stock = $data->avb_stock;
        $this->model = $data->model;
        $this->item_type = $data->item_type;
        $this->sku = $data->sku;
        $this->on_sale = $data->on_sale;
        $this->images = $data->images;
        if (!is_null($data->price)) {
            $this->price = $data->price;
        } else {
            $this->price = $data->min_price . '-' . $data->max_price;
        }
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

    protected $rules = [
        'supplier_id' => '',
        'supplier_product_category_id' => '',
        'country_id' => '',
        'brand_id' => '',
        'manufacturer_id' => '',
        'name' => '',
        'description' => '',
        'min_max_oq' => '',
        'edt' => '',
        'avb_stock' => '',
        'model' => '',
        'item_type' => '',
        'sku' => '',
        'on_sale' => '',
        'images' => '',
        'price' => '',
        'min_price' => '',
        'max_price' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if (gettype($this->images) != 'array') {
            $this->isUploaded = true;
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['supplier_id'] = $this->supplier_id;
        $min_max_oq_data = explode('-', $validatedData['min_max_oq']);
        unset($validatedData['min_max_oq']);
        $validatedData['min_oq'] = $min_max_oq_data[0];
        $validatedData['max_oq'] = $min_max_oq_data[1];

        $price_data = explode('-', $validatedData['price']);
        unset($validatedData['price']);
        if (count($price_data) > 1) {
            $validatedData['min_price'] = $price_data[0];
            $validatedData['max_price'] = $price_data[1];
            $validatedData['price'] = null;
        } else {
            $validatedData['min_price'] = null;
            $validatedData['max_price'] = null;
            $validatedData['price'] = $price_data[0];
        }

        if (!empty($this->supplier_product_id)) {
            if (!empty($this->images) && $this->images != $this->images) {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImage = [];
                foreach ($images as $key => $image) {
                    $multiImage[$key] = $image->store('supplier_products', 'public');
                }
                $validatedData['images'] = $multiImage;
            }
            SupplierProduct::where('id', $this->supplier_product_id)->update($validatedData);
            SupplierProductAttributes::where('supplier_product_id', $this->supplier_product_id)->delete();
            foreach ($this->name_spa as $key => $value) {
                SupplierProductAttributes::create(['supplier_product_id' => $this->supplier_product_id, 'name' => $this->name_spa[$key], 'value' => $this->value_spa[$key]]);
            }

            $this->notification()->success($title = 'Supplier Product Updated Successfully!');
        } else {
            if (!empty($this->images) && $this->images != $this->images) {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImage = [];
                foreach ($images as $key => $image) {
                    $multiImage[$key] = $image->store('supplier_products', 'public');
                }
                $validatedData['image'] = $multiImage;
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

    public function deleteImage($supplier_product_id, $key)
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'To delete the Image?',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
                'params' => ['supplier_product_id' => $supplier_product_id, 'key' => $key],
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function delete($params)
    {
        $currentImages = SupplierProduct::where('id', $params['supplier_product_id'])->pluck('images')->first();
        $toRemoveImages = [$currentImages[$params['key']]];

        $updatedImages = collect($currentImages)->reject(function ($value) use ($toRemoveImages) {
            return in_array($value, $toRemoveImages);
        });
        SupplierProduct::where('id', $params['supplier_product_id'])->update(['images' => $updatedImages]);

        $this->notification()->success($title = 'Supplier Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-product');
    }
}
