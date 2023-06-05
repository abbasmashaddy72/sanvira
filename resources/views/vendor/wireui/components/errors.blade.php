@if ($hasErrors($errors))
    <div
        {{ $attributes->merge(['class' => 'rounded-lg bg-negative-50 dark:bg-secondary-800 dark:border dark:border-negative-600 p-4']) }}>
        <div class="border-negative-200 dark:border-negative-700 flex items-center border-b-2 pb-3">
            <x-dynamic-component :component="WireUi::component('icon')" class="text-negative-400 dark:text-negative-600 mr-3 h-5 w-5 shrink-0"
                name="exclamation-circle" />

            <span class="text-negative-800 dark:text-negative-600 text-sm font-semibold">
                {{ str_replace('{errors}', $count($errors), $title) }}
            </span>
        </div>

        <div class="ml-5 mt-2 pl-1">
            <ul class="text-negative-700 dark:text-negative-600 list-disc space-y-1 text-sm">
                @foreach ($getErrorMessages($errors) as $message)
                    <li>{{ head($message) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="hidden"></div>
@endif
