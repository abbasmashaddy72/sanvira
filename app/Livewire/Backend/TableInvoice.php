<?php

namespace App\Livewire\Backend;

use App\Models\Invoice;
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

final class TableInvoice extends PowerGridComponent
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
        return Invoice::query()->with('order');
    }

    public function relationSearch(): array
    {
        return [
            'order' => ['order_no']
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('order_id', function (Invoice $model) {
                return e($model->order->order_no);
            })
            ->addColumn('invoice_no')

            /** Example of custom column using a closure **/
            ->addColumn('invoice_no_lower', fn (Invoice $model) => strtolower(e($model->invoice_no)))

            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (Invoice $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Order No.', 'order_id'),
            Column::make('Invoice no', 'invoice_no')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('order_no')->operators(['contains']),
            Filter::inputText('invoice_no')->operators(['contains']),
            Filter::inputText('status')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Invoice $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('btn btn-primary')
                ->openModal('backend.modal-invoice', ['invoice_id' => $row->id])
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
