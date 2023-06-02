<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\SupplierProduct;
use App\Models\SupplierProductAttributes;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalSupplierProduct extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $supplier_product_id;

    public $supplier_id;

    // SupplierProduct Model Values
    public $supplier_product_category_id;

    public $country_id;

    public $brand_id;

    public $manufacturer_id;

    public $name;

    public $description;

    public $min_oq;

    public $max_oq;

    public $edt;

    public $avb_stock;

    public $model;

    public $item_type;

    public $sku;

    public $on_sale = false;

    public $images = [];

    public $price;

    public $min_price;

    public $max_price;

    // SupplierProductAttributes Model Values
    public $supplier_product_id_spa;

    public $name_spa = [];

    public $value_spa = [];

    // Model Custom Values
    public $min_max_oq;

    public $inputs = [];

    public $i = 1;

    public $isUploaded = false;

    protected $temporaryUploadDirectory = 'storage/livewire-tmp';

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
            abort_if(Gate::denies('supplier_product_add'), 403);

            return;
        }
        abort_if(Gate::denies('supplier_product_edit'), 403);
        $data = SupplierProduct::findOrFail($this->supplier_product_id);
        $this->supplier_id = $data->supplier_id;
        $this->supplier_product_category_id = $data->supplier_product_category_id;
        $this->country_id = $data->country_id;
        $this->brand_id = $data->brand_id;
        $this->manufacturer_id = $data->manufacturer_id;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->min_max_oq = $data->min_oq.'-'.$data->max_oq;
        $this->edt = $data->edt;
        $this->avb_stock = $data->avb_stock;
        $this->model = $data->model;
        $this->item_type = $data->item_type;
        $this->sku = $data->sku;
        $this->on_sale = $data->on_sale;
        $this->images = $data->images;
        if (! is_null($data->price)) {
            $this->price = $data->price;
        } else {
            $this->price = $data->min_price.'-'.$data->max_price;
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
        'supplier_product_category_id' => 'required',
        'country_id' => 'required',
        'brand_id' => 'required',
        'manufacturer_id' => 'required',
        'name' => 'required',
        'description' => '',
        'min_max_oq' => 'required',
        'edt' => 'required',
        'avb_stock' => 'required',
        'model' => 'required',
        'item_type' => 'required',
        'sku' => '',
        'on_sale' => 'required',
        'images' => 'required',
        'price' => 'required',
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

        if (! empty($this->supplier_product_id)) {
            if (! empty($this->images) && gettype($this->images) != 'string') {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImage = [];
                foreach ($images as $key => $image) {
                    $multiImage[$key] = $image->store('supplier_projects', 'public');
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
            if (! empty($this->images) && gettype($this->images) != 'string') {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImage = [];
                foreach ($images as $key => $image) {
                    $multiImage[$key] = $image->store('supplier_products', 'public');
                }
                $validatedData['images'] = $multiImage;
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
            'title' => 'Are you Sure?',
            'description' => 'To delete the Image?',
            'icon' => 'error',
            'accept' => [
                'label' => 'Yes, delete it',
                'method' => 'delete',
                'params' => ['supplier_product_id' => $supplier_product_id, 'key' => $key],
            ],
            'reject' => [
                'label' => 'No, cancel',
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

        $this->emit('refreshLivewireDatatable');
        $this->closeModal();

        $this->notification()->success($title = 'Supplier Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-supplier-product');
    }
}
