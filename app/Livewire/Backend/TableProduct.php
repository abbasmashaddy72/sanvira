<?php

namespace App\Livewire\Backend;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class TableProduct extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Product::query()->with(['category']);
    }

    public function relationSearch(): array
    {
        return [
            'category' => [
                'name'
            ]
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('category_id', function (Product $model) {
                return e($model->category->name);
            })
            ->addColumn('title')

            /** Example of custom column using a closure **/
            ->addColumn('title_lower', fn (Product $model) => strtolower(e($model->title)))

            ->addColumn('slug')
            ->addColumn('edt')
            ->addColumn('model')
            ->addColumn('on_sale')
            ->addColumn('created_at_formatted', fn (Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Category Name', 'category_id'),
            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Edt', 'edt')
                ->sortable()
                ->searchable(),

            Column::make('Model', 'model')
                ->sortable()
                ->searchable(),

            Column::make('On sale', 'on_sale')
                ->toggleable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('title')->operators(['contains']),
            Filter::inputText('edt')->operators(['contains']),
            Filter::inputText('model')->operators(['contains']),
            Filter::inputText('barcode')->operators(['contains']),
            Filter::boolean('on_sale'),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Product $row): array
    {
        return [
            Button::add('edit')
                ->wire()
                ->slot('Edit')
                ->class('btn btn-primary')
                ->route('admin.product_edit', ['id' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
