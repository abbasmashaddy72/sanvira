<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('blog.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <a href="{{ route('admin.blog_add') }}" class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</a>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.table-blog')
        </div>
    </x-backend.grid>
</x-app-layout>
