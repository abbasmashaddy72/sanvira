<?php

namespace App\Livewire\Backend;

use App\Models\Product;
use App\Models\ProductAttributes;
use App\Models\ProductVariation;
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

    public $weight_unit = 'kg';

    public $on_sale = false;

    public $images = [];

    public $data_sheets = [];

    public $verification;

    // ProductAttributes Model Values
    public $name_pa = [];

    public $value_pa = [];

    // Model Custom Values
    public $inputs_pa = [];

    public $i_pa = 1;

    // Model ProductVariation Values
    public $min_price_pv;

    public $max_price_pv;

    public $min_order_quantity_pv;

    public $max_order_quantity_pv;

    // Model Custom Values
    public $inputs_pv = [];

    public $i_pv = 1;

    public $isUploaded = false;

    public $isDataSheetsUploaded = false;

    protected $temporaryUploadDirectory = 'storage/livewire-tmp';

    public $sub_category;

    public $main_category_id;

    protected $listeners = ['setUnits'];

    public function add_pa($i_pa)
    {
        $i_pa = $i_pa + 1;
        $this->i_pa = $i_pa;
        array_push($this->inputs_pa, $i_pa);
    }

    public function remove_pa($i_pa)
    {
        unset($this->inputs_pa[$i_pa]);
    }

    public function add_pv($i_pv)
    {
        $i_pv = $i_pv + 1;
        $this->i_pv = $i_pv;
        array_push($this->inputs_pv, $i_pv);
    }

    public function remove_pv($i_pv)
    {
        unset($this->inputs_pv[$i_pv]);
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
        $this->weight_unit = $data->weight_unit;
        $this->on_sale = $data->on_sale;
        $this->images = $data->images;
        $this->data_sheets = $data->data_sheets;
        $this->verification = $data->verification;
        $this->main_category_id = $data->category->parent_id;
        $this->sub_category = true;
        $data_pa = ProductAttributes::where('product_id', $this->product_id)->get();
        foreach ($data_pa as $key => $value) {
            $this->name_pa[] = $value->name;
            $this->value_pa[] = $value->value;
            if ($key != 0) {
                $this->inputs_pa[] = $key;
            }
        }
        $this->i_pa = $data_pa->count();
        $data_pv = ProductVariation::where('product_id', $this->product_id)->get();
        foreach ($data_pv as $key => $value) {
            $this->min_price_pv[] = $value->min_price;
            $this->max_price_pv[] = $value->max_price;
            $this->min_order_quantity_pv[] = $value->min_order_quantity;
            $this->max_order_quantity_pv[] = $value->max_order_quantity;
            if ($key != 0) {
                $this->inputs_pv[] = $key;
            }
        }
        $this->i_pv = $data_pv->count();
    }

    protected $rules = [
        'category_id' => 'required',
        'country_id' => 'required',
        'brand_id' => 'required',
        'vendor_id' => 'required',
        'title' => 'required',
        'description' => '',
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
        'weight_unit' => '',
        'on_sale' => 'required',
        'images' => 'required|array|min:4',
        'data_sheets' => '',
        'min_price' => '',
        'max_price' => '',
        'min_order_quantity' => '',
        'max_order_quantity' => '',
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
            foreach ($this->name_pa as $key => $value) {
                ProductAttributes::create(['product_id' => $this->product_id, 'name' => $this->name_pa[$key], 'value' => $this->value_pa[$key]]);
            }
            ProductVariation::where('product_id', $this->product_id)->delete();
            foreach ($this->min_price_pv as $key => $value) {
                ProductVariation::create([
                    'product_id' => $this->product_id,
                    'min_price_pv' => $this->min_price_pv[$key],
                    'max_price_pv' => $this->max_price_pv[$key],
                    'min_order_quantity_pv' => $this->min_order_quantity_pv[$key],
                    'max_order_quantity_pv' => $this->max_order_quantity_pv[$key]
                ]);
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
            foreach ($this->name_pa as $key => $value) {
                ProductAttributes::create(['product_id' => $Product->id, 'name' => $this->name_pa[$key], 'value' => $this->value_pa[$key]]);
            }
            foreach ($this->min_price_pv as $key => $value) {
                ProductVariation::create([
                    'product_id' => $Product->id,
                    'min_price_pv' => $this->min_price_pv[$key],
                    'max_price_pv' => $this->max_price_pv[$key],
                    'min_order_quantity_pv' => $this->min_order_quantity_pv[$key],
                    'max_order_quantity_pv' => $this->max_order_quantity_pv[$key]
                ]);
            }
            $this->notification()->success($title = 'Product Saved Successfully!');
        }

        $this->dispatchatch('refreshLivewireDatatable');

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

        $this->dispatchatch('refreshLivewireDatatable');
        $this->closeModal();

        $this->notification()->success($title = 'Product Image Deleted Successfully!');
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function render()
    {
        return view('livewire.backend.modal-product');
    }
}
