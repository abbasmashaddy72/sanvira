<?php

namespace App\Livewire\Backend;

use App\Models\Order;
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

final class TableOrder extends PowerGridComponent
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
        return Order::query()->with('quotation');
    }

    public function relationSearch(): array
    {
        return [
            'quotation' => ['quotation_no']
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('quotation_id', function (Order $model) {
                return e($model->quotation->quotation_no);
            })
            ->addColumn('order_no')

            /** Example of custom column using a closure **/
            ->addColumn('order_no_lower', fn (Order $model) => strtolower(e($model->order_no)))

            ->addColumn('purchase_order_pdf')
            ->addColumn('rfq_submission_date_formatted', fn (Order $model) => Carbon::parse($model->rfq_submission_date)->format('d/m/Y H:i:s'))
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (Order $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Quotation id', 'quotation_id'),
            Column::make('Order no', 'order_no')
                ->sortable()
                ->searchable(),

            Column::make('Purchase order pdf', 'purchase_order_pdf')
                ->toggleable(),

            Column::make('Rfq submission date', 'rfq_submission_date_formatted', 'rfq_submission_date')
                ->sortable(),

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
            Filter::datetimepicker('rfq_submission_date'),
            Filter::boolean('purchase_order_pdf'),
            Filter::inputText('status')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Order $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('btn btn-primary')
                ->openModal('backend.modal-order', ['order_id' => $row->id])
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
