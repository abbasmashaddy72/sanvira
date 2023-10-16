<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Product;
use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ModalProduct extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $product_id;

    // Product Model Values
    public $category_id;

    public $country_id;

    public $brand_id;

    public $vendor_id;

    public $title;

    public $description;

    public $min_oq;

    public $max_oq;

    public $edt;

    public $avb_stock;

    public $model;

    public $item_type;

    public $sku;

    public $barcode;

    public $own_sku;

    public $length;

    public $length_units = 'mm';

    public $breadth;

    public $breadth_units = 'mm';

    public $width;

    public $width_units = 'mm';

    public $weight;

    public $weight_units = 'kg';

    public $on_sale = false;

    public $images = [];

    public $data_sheets = [];

    public $price;

    public $min_price;

    public $max_price;

    public $verification;

    // ProductAttributes Model Values
    public $product_id_spa;

    public $name_spa = [];

    public $value_spa = [];

    // Model Custom Values
    public $min_max_oq;

    public $inputs = [];

    public $i = 1;

    public $isUploaded = false;

    public $isDataSheetsUploaded = false;

    protected $temporaryUploadDirectory = 'storage/livewire-tmp';

    public $sub_category;

    public $main_category_id;

    protected $listeners = ['setUnits'];

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

    public function UpdatedMainCategoryId()
    {
        $this->sub_category = true;
    }

    public function setUnits($value)
    {
        $this->length_units = $value;
        $this->breadth_units = $value;
        $this->width_units = $value;
    }

    public function mount()
    {
        if (empty($this->product_id)) {
            abort_if(Gate::denies('product_add'), 403);

            return;
        }
        abort_if(Gate::denies('product_edit'), 403);
        $data = Product::with('Category')->findOrFail($this->product_id);
        $this->category_id = $data->category_id;
        $this->country_id = $data->country_id;
        $this->brand_id = $data->brand_id;
        $this->vendor_id = $data->vendor_id;
        $this->title = $data->title;
        $this->description = $data->description;
        $this->min_max_oq = $data->min_oq . '-' . $data->max_oq;
        $this->edt = $data->edt;
        $this->avb_stock = $data->avb_stock;
        $this->model = $data->model;
        $this->item_type = $data->item_type;
        $this->sku = $data->sku;
        $this->barcode = $data->barcode;
        $this->own_sku = $data->own_sku;
        $this->length = $data->length;
        $this->length_units = $data->length_units;
        $this->breadth = $data->breadth;
        $this->breadth_units = $data->breadth_units;
        $this->width = $data->width;
        $this->width_units = $data->width_units;
        $this->weight = $data->weight;
        $this->weight_units = $data->weight_units;
        $this->on_sale = $data->on_sale;
        $this->images = $data->images;
        $this->data_sheets = $data->data_sheets;
        $this->verification = $data->verification;
        if (!is_null($data->price)) {
            $this->price = $data->price;
        } else {
            $this->price = $data->min_price . '-' . $data->max_price;
        }
        $this->main_category_id = $data->category->parent_id;
        $this->sub_category = true;
        $data_spa = ProductAttributes::where('product_id', $this->product_id)->get();
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
        'category_id' => 'required',
        'country_id' => 'required',
        'brand_id' => 'required',
        'vendor_id' => 'required',
        'title' => 'required',
        'description' => '',
        'min_max_oq' => 'required',
        'edt' => 'required',
        'avb_stock' => 'required',
        'model' => 'required',
        'item_type' => 'required',
        'sku' => '',
        'barcode' => '',
        'own_sku' => '',
        'length' => '',
        'length_units' => '',
        'breadth' => '',
        'breadth_units' => '',
        'width' => '',
        'width_units' => '',
        'weight' => '',
        'weight_units' => '',
        'on_sale' => 'required',
        'images' => 'required|array|min:4',
        'data_sheets' => '',
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
        if (gettype($this->data_sheets) != 'array') {
            $this->isDataSheetsUploaded = true;
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();
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

        if (!empty($this->product_id)) {
            if (!empty($this->images) && gettype($this->images) == 'array') {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImages = [];

                foreach ($images as $key => $image) {
                    if (is_object($image)) {
                        $multiImages[$key] = $image->store('product_images', 'public');
                    }
                }
                if ($this->images != $images) {
                    $validatedData['images'] = $multiImages;
                }
            }
            if (!empty($this->data_sheets) && gettype($this->data_sheets) == 'array') {
                $data_sheets = $validatedData['data_sheets'];
                unset($validatedData['data_sheets']);
                $multiDataSheets = [];

                foreach ($data_sheets as $key => $data_sheet) {
                    if (is_object($data_sheet)) {
                        $multiDataSheets[$key] = $data_sheet->store('product_data_sheets', 'public');
                    }
                }
                if ($this->data_sheets != $data_sheets) {
                    $validatedData['data_sheets'] = $multiDataSheets;
                }
            }
            Product::where('id', $this->product_id)->update($validatedData);
            ProductAttributes::where('product_id', $this->product_id)->delete();
            foreach ($this->name_spa as $key => $value) {
                ProductAttributes::create(['product_id' => $this->product_id, 'name' => $this->name_spa[$key], 'value' => $this->value_spa[$key]]);
            }

            $this->notification()->success($title = 'Product Updated Successfully!');
        } else {
            if (!empty($this->images) && gettype($this->images) == 'array') {
                $images = $validatedData['images'];
                unset($validatedData['images']);
                $multiImages = [];

                foreach ($images as $key => $image) {
                    if (is_object($image)) {
                        $multiImages[$key] = $image->store('product_images', 'public');
                    }
                }
                if ($this->images != $images) {
                    $validatedData['images'] = $multiImages;
                }
            }
            if (!empty($this->data_sheets) && gettype($this->data_sheets) == 'array') {
                $data_sheets = $validatedData['data_sheets'];
                unset($validatedData['data_sheets']);
                $multiDataSheets = [];

                foreach ($data_sheets as $key => $data_sheet) {
                    if (is_object($data_sheet)) {
                        $multiDataSheets[$key] = $data_sheet->store('product_data_sheets', 'public');
                    }
                }
                if ($this->data_sheets != $data_sheets) {
                    $validatedData['data_sheets'] = $multiDataSheets;
                }
            }
            $Product = Product::create($validatedData);
            foreach ($this->name_spa as $key => $value) {
                ProductAttributes::create(['product_id' => $Product->id, 'name' => $this->name_spa[$key], 'value' => $this->value_spa[$key]]);
            }

            $this->notification()->success($title = 'Product Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function deleteImage($product_id, $key)
    {
        $this->dialog()->confirm([
            'title' => 'Are you Sure?',
            'description' => 'To delete the Image?',
            'icon' => 'error',
            'accept' => [
                'label' => 'Yes, delete it',
                'method' => 'delete',
                'params' => ['product_id' => $product_id, 'key' => $key],
            ],
            'reject' => [
                'label' => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function delete($params)
    {
        $currentImages = Product::where('id', $params['product_id'])->pluck('images')->first();
        $toRemoveImages = [$currentImages[$params['key']]];

        $updatedImages = collect($currentImages)->reject(function ($value) use ($toRemoveImages) {
            return in_array($value, $toRemoveImages);
        });
        Product::where('id', $params['product_id'])->update(['images' => $updatedImages]);

        $this->emit('refreshLivewireDatatable');
        $this->closeModal();

        $this->notification()->success($title = 'Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-product');
    }
}
