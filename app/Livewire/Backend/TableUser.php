<?php

namespace App\Livewire\Backend;

use App\Models\User;
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

final class TableUser extends PowerGridComponent
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
        return User::query()->with('city');
    }

    public function relationSearch(): array
    {
        return [
            'city' => [
                'name'
            ]
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')

            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (User $model) => strtolower(e($model->name)))

            ->addColumn('email')
            ->addColumn('mobile')
            ->addColumn('street_no')
            ->addColumn('locality')
            ->addColumn('landmark')
            ->addColumn('city_id', function (User $model) {
                return e($model->city->name);
            })
            ->addColumn('zip_code')
            ->addColumn('subscription')
            ->addColumn('image', function (User $model) {
                return view('components.backend.dt-image', ['image' => $model->image]);
            })
            ->addColumn('last_password_change_formatted', fn (User $model) => Carbon::parse($model->last_password_change)->format('d/m/Y H:i:s'))
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Image', 'image'),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Mobile', 'mobile')
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

            Column::make('City Name', 'city_id'),
            Column::make('Zip code', 'zip_code'),
            Column::make('Subscription', 'subscription')
                ->toggleable(),

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
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('mobile')->operators(['contains']),
            Filter::inputText('street_no')->operators(['contains']),
            Filter::inputText('locality')->operators(['contains']),
            Filter::inputText('landmark')->operators(['contains']),
            Filter::boolean('subscription'),
            Filter::inputText('status')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('btn btn-primary')
                ->openModal('backend.modal-user', ['user_id' => $row->id])
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
