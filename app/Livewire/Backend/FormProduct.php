<?php

namespace App\Livewire\Backend;

use App\Models\Product;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\ProductVariation;
use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Gate;

class FormProduct extends Component
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $product_id;

    // Product Model Values
    public $title;
    public $model;
    public $category_id;
    public $edt;
    public $on_sale = false;
    public $images = [];
    public $data_sheets = [];
    public $description;

    // ProductAttributes Model Values
    public $name_pa = [];
    public $value_pa = [];

    // ProductVariation Model Values
    public $country_id_pv = [];
    public $vendor_id_pv = [];
    public $brand_id_pv = [];
    public $avb_stock_pv = [];
    public $sku_pv = [];
    public $barcode_pv = [];
    public $quantity_type_pv = [];
    public $color_pv = [];
    public $item_type_pv = [];
    public $measurement_units_pv = [];
    public $weight_units_pv = [];
    public $length_pv = [];
    public $breadth_pv = [];
    public $width_pv = [];
    public $diameter_pv = [];
    public $weight_pv = [];
    public $min_price_pv = [];
    public $max_price_pv = [];
    public $min_order_quantity_pv = [];
    public $max_order_quantity_pv = [];
    public $max_discount_pv = [];
    public $max_discount_unit_pv = [];
    public $tax_percentage_pv = [];
    public $measurement_units = [];

    // ProductAttributes Model Custom Values
    public $inputs_pa = [];
    public $i_pa = 1;

    // ProductVariation Model Custom Values
    public $inputs_pv = [];
    public $i_pv = 1;

    // Custom Values
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
        $this->category_id = null;
    }

    public function mount()
    {
        if (empty($this->product_id) && is_null($this->product_id)) {
            abort_if(Gate::denies('product_add'), 403);

            return;
        }
        abort_if(Gate::denies('product_edit'), 403);
        $data = Product::with('Category')->findOrFail($this->product_id);
        $this->category_id = $data->category_id;
        $this->title = $data->title;
        $this->description = $data->description;
        $this->edt = $data->edt;
        $this->model = $data->model;
        $this->on_sale = $data->on_sale;
        $this->images = $data->images;
        $this->data_sheets = $data->data_sheets;
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
            $this->country_id_pv[] = $value->country_id;
            $this->brand_id_pv[] = $value->brand_id;
            $this->vendor_id_pv[] = $value->vendor_id;
            $this->avb_stock_pv[] = $value->avb_stock;
            $this->sku_pv[] = $value->sku;
            $this->barcode_pv[] = $value->barcode;
            $this->length_pv[] = $value->length;
            $this->breadth_pv[] = $value->breadth;
            $this->width_pv[] = $value->width;
            $this->diameter_pv[] = $value->diameter;
            $this->measurement_units_pv[] = $value->measurement_units;
            $this->weight_pv[] = $value->weight;
            $this->weight_units_pv[] = $value->weight_units;
            $this->quantity_type_pv[] = $value->quantity_type;
            $this->color_pv[] = $value->color;
            $this->item_type_pv[] = $value->item_type;
            $this->max_discount_pv[] = $value->max_discount;
            $this->max_discount_unit_pv[] = $value->max_discount_unit;
            $this->tax_percentage_pv[] = $value->tax_percentage;
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
        'title' => 'required',
        'description' => '',
        'edt' => 'required',
        'model' => 'required',
        'on_sale' => 'required',
        'images' => 'required|array|min:4',
        'data_sheets' => '',
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
                ProductAttributes::create([
                    'product_id' => $this->product_id,
                    'name' => $this->name_pa[$key],
                    'value' => $this->value_pa[$key]
                ]);
            }
            ProductVariation::where('product_id', $this->product_id)->delete();
            foreach ($this->max_discount_pv as $key => $value) {
                ProductVariation::create([
                    'product_id' => $this->product_id,
                    'country_id' => $this->country_id_pv[$key],
                    'brand_id' => $this->brand_id_pv[$key],
                    'vendor_id' => $this->vendor_id_pv[$key],
                    'avb_stock' => $this->avb_stock_pv[$key],
                    'sku' => $this->sku_pv[$key],
                    'barcode' => $this->barcode_pv[$key],
                    'length' => $this->length_pv[$key],
                    'breadth' => $this->breadth_pv[$key],
                    'width' => $this->width_pv[$key],
                    'diameter' => $this->diameter_pv[$key],
                    'measurement_units' => $this->measurement_units_pv[$key],
                    'weight' => $this->weight_pv[$key],
                    'weight_units' => $this->weight_units_pv[$key],
                    'quantity_type' => $this->quantity_type_pv[$key],
                    'color' => $this->color_pv[$key],
                    'item_type' => $this->item_type_pv[$key],
                    'max_discount' => $this->max_discount_pv[$key],
                    'max_discount_unit' => $this->max_discount_unit_pv[$key],
                    'tax_percentage' => $this->tax_percentage_pv[$key],
                    'min_price' => $this->min_price_pv[$key],
                    'max_price' => $this->max_price_pv[$key],
                    'min_order_quantity' => $this->min_order_quantity_pv[$key],
                    'max_order_quantity' => $this->max_order_quantity_pv[$key],
                ]);
            }
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
            $product = Product::create($validatedData);
            foreach ($this->name_pa as $key => $value) {
                ProductAttributes::create(['product_id' => $product->id, 'name' => $this->name_pa[$key], 'value' => $this->value_pa[$key]]);
            }
            foreach ($this->min_price_pv as $key => $value) {
                ProductVariation::create([
                    'product_id' => $product->id,
                    'country_id' => $this->country_id_pv[$key],
                    'brand_id' => $this->brand_id_pv[$key],
                    'vendor_id' => $this->vendor_id_pv[$key],
                    'avb_stock' => $this->avb_stock_pv[$key],
                    'sku' => $this->sku_pv[$key],
                    'barcode' => $this->barcode_pv[$key],
                    'length' => $this->length_pv[$key],
                    'breadth' => $this->breadth_pv[$key],
                    'width' => $this->width_pv[$key],
                    'diameter' => $this->diameter_pv[$key],
                    'measurement_units' => $this->measurement_units_pv[$key],
                    'weight' => $this->weight_pv[$key],
                    'weight_units' => $this->weight_units_pv[$key],
                    'quantity_type' => $this->quantity_type_pv[$key],
                    'color' => $this->color_pv[$key],
                    'item_type' => $this->item_type_pv[$key],
                    'max_discount' => $this->max_discount_pv[$key],
                    'max_discount_unit' => $this->max_discount_unit_pv[$key],
                    'tax_percentage' => $this->tax_percentage_pv[$key],
                    'min_price' => $this->min_price_pv[$key],
                    'max_price' => $this->max_price_pv[$key],
                    'min_order_quantity' => $this->min_order_quantity_pv[$key],
                    'max_order_quantity' => $this->max_order_quantity_pv[$key],
                ]);
            }
        }

        $this->redirect(route('admin.product'));

        if (!empty($this->product_id)) {
            $this->notification()->success($title = 'Product Updated Successfully!');
        } else {
            $this->notification()->success($title = 'Product Saved Successfully!');
        }
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

        $this->closeModal();

        $this->notification()->success($title = 'Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.form-product');
    }
}
