<?php

namespace App\Livewire\Backend;

use App\Models\Enquiry;
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

final class TableEnquiry extends PowerGridComponent
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
        return Enquiry::query()->latest()->with('rfq', 'buyer', 'staff');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('rfq_id', function (Enquiry $model) {
                return e($model->rfq->rfq_no);
            })
            ->addColumn('buyer_id', function (Enquiry $model) {
                return e($model->buyer->name);
            })
            ->addColumn('staff_id', function (Enquiry $model) {
                return e($model->staff->name);
            })
            ->addColumn('enquiry_no')

            /** Example of custom column using a closure **/
            ->addColumn('enquiry_no_lower', fn (Enquiry $model) => strtolower(e($model->enquiry_no)))

            ->addColumn('rfq_submission_date_time_formatted', fn (Enquiry $model) => Carbon::parse($model->rfq_submission_date_time)->format('d/m/Y H:i:s'))
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (Enquiry $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Rfq No.', 'rfq_id'),
            Column::make('Buyer Name', 'buyer_id'),
            Column::make('Staff Name', 'staff_id'),
            Column::make('Enquiry no', 'enquiry_no')
                ->sortable()
                ->searchable(),

            Column::make('Rfq submission date time', 'rfq_submission_date_time_formatted', 'rfq_submission_date_time')
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
            Filter::inputText('enquiry_no')->operators(['contains']),
            Filter::datetimepicker('rfq_submission_date_time'),
            Filter::inputText('status')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Enquiry $row): array
    {
        return [
            Button::add('edit')
                ->wire()
                ->slot('Edit')
                ->class('btn btn-primary')
                ->route('admin.enquiry_edit', ['id' => $row->id])
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
