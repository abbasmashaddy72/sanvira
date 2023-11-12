<?php

namespace App\Livewire\Backend;

use App\Models\ShippingAddress;
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

final class TableShippingAddress extends PowerGridComponent
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
        return ShippingAddress::query()->latest();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('user_id')
            ->addColumn('city_id')
            ->addColumn('company_name')

            /** Example of custom column using a closure **/
            ->addColumn('company_name_lower', fn (ShippingAddress $model) => strtolower(e($model->company_name)))

            ->addColumn('street_no')
            ->addColumn('locality')
            ->addColumn('landmark')
            ->addColumn('zip_code')
            ->addColumn('created_at_formatted', fn (ShippingAddress $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('User Name', 'user_id'),
            Column::make('City Name', 'city_id'),
            Column::make('Company name', 'company_name')
                ->sortable()
                ->searchable(),

            Column::make('Street no', 'street_no')
                ->sortable()
                ->searchable(),

            Column::make('Locality', 'locality')
                ->sortable()
                ->searchable(),

            Column::make('Landmark', 'landmark')
                ->sortable()
                ->searchable(),

            Column::make('Zip code', 'zip_code'),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('company_name')->operators(['contains']),
            Filter::inputText('street_no')->operators(['contains']),
            Filter::inputText('locality')->operators(['contains']),
            Filter::inputText('landmark')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\ShippingAddress $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('btn btn-primary')
                ->openModal('backend.modal-shipping-address', ['shipping_address_id' => $row->id])
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
