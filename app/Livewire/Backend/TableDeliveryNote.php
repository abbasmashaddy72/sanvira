<?php

namespace App\Livewire\Backend;

use App\Models\DeliveryNote;
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

final class TableDeliveryNote extends PowerGridComponent
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
        return DeliveryNote::query()->with('order', 'buyer', 'staff');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('order_id', function (DeliveryNote $model) {
                return e($model->order->order_no);
            })
            ->addColumn('buyer_id', function (DeliveryNote $model) {
                return e($model->buyer->name);
            })
            ->addColumn('staff_id', function (DeliveryNote $model) {
                return e($model->staff->name);
            })
            ->addColumn('delivery_note_no')

            /** Example of custom column using a closure **/
            ->addColumn('delivery_note_no_lower', fn (DeliveryNote $model) => strtolower(e($model->delivery_note_no)))

            ->addColumn('order_submission_date_time_formatted', fn (DeliveryNote $model) => Carbon::parse($model->order_submission_date_time)->format('d/m/Y H:i:s'))
            ->addColumn('delivery_notes_attachment')
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (DeliveryNote $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Order Name', 'order_id'),
            Column::make('Buyer Name', 'buyer_id'),
            Column::make('Staff Name', 'staff_id'),
            Column::make('Delivery note no', 'delivery_note_no')
                ->sortable()
                ->searchable(),

            Column::make('Order submission date time', 'order_submission_date_time_formatted', 'order_submission_date_time')
                ->sortable(),

            Column::make('Delivery notes attachment', 'delivery_notes_attachment')
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
            Filter::inputText('delivery_note_no')->operators(['contains']),
            Filter::datetimepicker('order_submission_date_time'),
            Filter::inputText('delivery_notes_attachment')->operators(['contains']),
            Filter::inputText('status')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\DeliveryNote $row): array
    {
        return [
            Button::add('edit')
                ->wire()
                ->slot('Edit')
                ->class('btn btn-primary')
                ->route('admin.delivery_note_edit', ['id' => $row->id])
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
