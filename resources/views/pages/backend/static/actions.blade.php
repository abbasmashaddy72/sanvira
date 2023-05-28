<div class="flex justify-around space-x-1">
    @can('slider_delete')
        @include('datatables::delete', ['value' => $id])
    @endcan
</div>
