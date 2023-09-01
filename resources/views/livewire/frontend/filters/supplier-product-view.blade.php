@if ($type != 'Product Details Page')
    <div
        class="group overflow-hidden rounded-md border-2 border-gray-200 bg-white shadow duration-500 ease-in-out hover:border-2 hover:border-blue-600 hover:shadow-xl dark:bg-slate-900 dark:shadow-gray-800 dark:hover:shadow-xl dark:hover:shadow-gray-700">
        <a href="{{ route('products_details', ['slug' => $item->slug]) }}">
            <div class="relative">
                <img class="h-40 w-full object-cover" src="{{ asset('storage/' . $item->images[0]) }}" alt=""
                    onerror="this.onerror=null; this.src='https://placehold.co/1280x625';">
                @if ($item->on_sale)
                    <span
                        class="text-md absolute -right-14 top-4 w-40 rotate-45 bg-yellow-400 text-center font-semibold text-white">
                        {{ __('On Sale') }}
                    </span>
                @endif

                @if ($item->avb_stock > 0)
                    <span
                        class="absolute left-0 top-0 ml-2 mt-2 inline-flex rounded-lg bg-green-500 px-3 py-2 text-sm font-medium text-white">
                        {{ __('In Stock') }}
                    </span>
                @endif

                @if ($item->productViews->count() > 0)
                    <span
                        class="absolute bottom-0 left-0 mb-2 ml-2 inline-flex rounded-lg bg-blue-600 p-2 text-sm font-medium text-white">
                        {{ $item->productViews->count() }}+
                    </span>
                @endif
            </div>

            <div class="flex items-center justify-between border-b border-gray-300 px-6 py-2">
                <div class="truncate text-lg font-semibold duration-500 ease-in-out hover:text-blue-600">
                    {{ $item->title }}</div>
            </div>
            <div class="flex items-center justify-between border-b border-gray-300 px-6 py-2">
                <span class="mr-2 h-6 w-6 font-semibold text-blue-600">AED</span>
                <div id="price" role="tooltip"
                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    {{ __('AED') }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <span
                    class="truncate">{{ $item->price ? $item->price : $item->min_price . ' - ' . $item->max_price }}</span>
            </div>

            {{-- <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
                <svg data-tooltip-target="sku" class="w-6 h-6 mr-2 fill-blue-600" xmlns="http://www.w3.org/2000/svg"
                    height="48" viewBox="0 -960 960 960" width="48">
                    <path
                        d="M620-159 460-319l43-43 117 117 239-239 43 43-282 282Zm220-414h-60v-207h-60v90H240v-90h-60v600h251v60H180q-26 0-43-17t-17-43v-600q0-26 17-43t43-17h202q7-35 34.5-57.5T480-920q36 0 63.5 22.5T578-840h202q26 0 43 17t17 43v207ZM480-780q17 0 28.5-11.5T520-820q0-17-11.5-28.5T480-860q-17 0-28.5 11.5T440-820q0 17 11.5 28.5T480-780Z" />
                </svg>

                <div id="sku" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    {{ __('Stock Keeping Unit') }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <span class="truncate">{{ $item->sku }}</span>
            </div> --}}
            {{-- <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
                <div class="flex">
                    <svg data-tooltip-target="min_max_oq" class="w-6 h-6 mr-2 fill-blue-600" version="1.1"
                        id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" viewBox="0 0 118.67 122.88"
                        style="enable-background:new 0 0 118.67 122.88" xml:space="preserve">
                        <g>
                            <path
                                d="M3.92,22.79C1.81,22.79,0,20.99,0,18.77c0-2.11,1.81-3.92,3.92-3.92h5.43c0.1,0,0.3,0,0.41,0c3.62,0.1,6.84,0.8,9.54,2.51 c3.01,1.91,5.22,4.82,6.43,9.15c0,0.1,0,0.2,0.1,0.3l1,4.03h11.59c0.73,2.95,2.34,5.7,4.78,7.83H29.04l0,0l8.94,33.67h63.4 l8.33-33.67H95.95c2.44-2.13,4.04-4.89,4.78-7.83h13.06h0.96c2.21,0,3.92,1.81,3.92,3.92c0,0.41-0.11,0.8-0.2,1.21l-10.25,41.29 c-0.41,1.81-2.01,3.01-3.81,3.01l0,0H40.09c1.41,5.22,2.81,8.04,4.72,9.35c2.31,1.51,6.33,1.6,13.07,1.51h0.1l0,0h45.42 c2.21,0,3.92,1.81,3.92,3.92c0,2.21-1.81,3.92-3.92,3.92H57.98l0,0c-8.34,0.1-13.46-0.1-17.59-2.81 c-4.22-2.81-6.43-7.64-8.64-16.38l0,0L18.29,28.83c0-0.1,0-0.1-0.1-0.2c-0.6-2.21-1.6-3.72-3.01-4.52c-1.41-0.91-3.31-1.3-5.52-1.3 c-0.1,0-0.2,0-0.3,0L3.92,22.79L3.92,22.79L3.92,22.79L3.92,22.79z M66.62,44.11L50.36,30.76c-1.99-1.6-2.31-4.53-0.71-6.52 c1.6-1.99,4.53-2.31,6.52-0.71l8.77,7.3l-0.01-26.2C64.92,2.07,67,0,69.55,0c2.56,0,4.63,2.07,4.63,4.63l0.01,26.21l8.78-7.3 c1.99-1.6,4.91-1.28,6.52,0.71c1.6,1.99,1.28,4.91-0.71,6.52L72.52,44.11l-0.05,0.04c-1.71,1.33-3.94,1.43-5.79,0L66.62,44.11 L66.62,44.11L66.62,44.11z M81.49,58.08c0-1.24,1.23-2.24,2.73-2.24c1.51,0,2.73,1,2.73,2.24v4.71c0,1.24-1.23,2.24-2.73,2.24 c-1.51,0-2.73-1-2.73-2.24V58.08L81.49,58.08L81.49,58.08z M65.12,58.08c0-1.24,1.23-2.24,2.73-2.24c1.51,0,2.73,1,2.73,2.24v4.71 c0,1.24-1.23,2.24-2.73,2.24c-1.51,0-2.73-1-2.73-2.24V58.08L65.12,58.08L65.12,58.08z M48.76,58.08c0-1.24,1.23-2.24,2.73-2.24 c1.51,0,2.73,1,2.73,2.24v4.71c0,1.24-1.23,2.24-2.73,2.24c-1.51,0-2.73-1-2.73-2.24V58.08L48.76,58.08L48.76,58.08z M91.64,103.58 c5.33,0,9.65,4.32,9.65,9.65s-4.32,9.65-9.65,9.65c-5.32,0-9.65-4.32-9.65-9.65S86.32,103.58,91.64,103.58L91.64,103.58 L91.64,103.58L91.64,103.58z M49.34,103.58c5.32,0,9.65,4.32,9.65,9.65s-4.32,9.65-9.65,9.65c-5.33,0-9.65-4.32-9.65-9.65 S44.01,103.58,49.34,103.58L49.34,103.58L49.34,103.58L49.34,103.58z" />
                        </g>
                    </svg>
                    <div id="min_max_oq" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Min - Max Order Quantity
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    {{ $item->min_oq }} - {{ $item->max_oq }}
                </div>
                <div class="flex">
                    <svg data-tooltip-target="edt" class="w-6 h-6 mr-2 fill-blue-600" xmlns="http://www.w3.org/2000/svg"
                        shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                        image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                        viewBox="0 0 505 512.15">
                        <path
                            d="m336.11 39.84-115.38 68.94 135.38 18.4 111.32-69.44-131.32-17.9zM362.44 245c73.77 0 133.58 59.8 133.58 133.58 0 73.77-59.81 133.57-133.58 133.57-73.77 0-133.57-59.8-133.57-133.57 0-73.78 59.8-133.58 133.57-133.58zm-23.12 86.93c0-10.96 8.89-19.85 19.85-19.85 10.97 0 19.86 8.89 19.86 19.85v52.99l29.81 9.41c10.45 3.3 16.24 14.45 12.95 24.9-3.3 10.45-14.45 16.24-24.9 12.95l-42.95-13.57c-8.43-2.3-14.62-10-14.62-19.15v-67.53zm-134.49-205.8-.09 141.71-51.45-35.04-51.46 29.07 6.1-148.91-88.54-12.03v312.98l178.95 23.13c2.52 7.1 5.47 13.99 8.85 20.63L9.3 432.08c-5.17-.21-9.3-4.48-9.3-9.69V89.86c.27-4.05 1.89-6.89 5.72-8.81L182.47.85c1.58-.72 3.53-1.01 5.26-.76l308.18 42.03c5.09.59 8.58 4.77 8.58 9.99v.02L505 280.9c-5.72-8.46-15.57-20.29-19.93-27.77V69.56l-115.81 74.93v59.81a174.577 174.577 0 0 0-19.39.36v-58.82l-145.04-19.71zm-81.52-30.58 112.17-69.44-47.58-6.49L44.24 84.8l79.07 10.75z" />
                    </svg>
                    <div id="edt" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Estimated Delivery Time in Days
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    {{ $item->edt }}
                </div>
            </div> --}}
            <div class="flex items-center justify-between border-b border-gray-300 px-6 py-2">
                <svg data-tooltip-target="brand_name" class="mr-2 h-6 w-6 fill-blue-600" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 92.35 122.88" style="enable-background:new 0 0 92.35 122.88"
                    xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill-rule: evenodd;
                            clip-rule: evenodd;
                        }
                    </style>
                    <g>
                        <path class="st0"
                            d="M46.18,0.01c2.17-0.09,3.88,0.66,5.61,1.76c2.19,1.39,4.66,4.14,7.71,5.88c4.29,2.45,12.23-0.93,16.29,5.11 c2.37,3.52,2.48,6.28,2.66,9.01c0.19,2.94,0.71,5.65,3.72,9.63c4.99,6.6,6.03,10.99,3.46,15.56c-1.75,3.12-5.44,4.85-6.29,6.83 c-1.82,4.2,0.19,7.37-2.29,12.27c-1.73,3.4-4.39,5.64-7.94,6.78c-2.99,0.96-5.99-0.43-8.39,0.58c-4.21,1.77-7.31,5.88-10.66,6.92 c-1.29,0.4-2.58,0.6-3.87,0.59c-1.29,0.01-2.58-0.19-3.87-0.59c-3.35-1.04-6.45-5.15-10.66-6.92c-2.4-1.01-5.4,0.39-8.39-0.58 c-3.55-1.14-6.21-3.38-7.94-6.78c-2.49-4.9-0.48-8.07-2.29-12.27c-0.85-1.98-4.54-3.71-6.29-6.83C4.16,42.39,5.2,38,10.19,31.41 c3.01-3.98,3.53-6.69,3.72-9.63c0.18-2.73,0.29-5.49,2.66-9.01c4.07-6.04,12.01-2.66,16.29-5.11c3.05-1.74,5.52-4.49,7.71-5.88 C42.29,0.67,44.01-0.09,46.18,0.01L46.18,0.01z M46.18,25.97l4.46,10.9l11.75,0.87l-8.99,7.61l2.8,11.44l-10.02-6.2l-10.02,6.2 l2.8-11.44l-8.99-7.61l11.75-0.87L46.18,25.97L46.18,25.97z M88.96,113.07L77.41,111l-5.73,10.26c-4.16,5.15-6.8-3.32-7.96-6.27 L52.57,93.96c2.57-0.89,5.67-3.46,8.85-6.35c6.35,0.13,12.27-0.97,16.62-6.51l12.81,24.75l1.11,2.38 C92.84,111.32,92.38,113.36,88.96,113.07L88.96,113.07z M3.39,113.07L14.95,111l5.73,10.26c4.16,5.15,6.8-3.32,7.96-6.27 l11.15-21.03c-2.57-0.89-5.67-3.46-8.85-6.35c-6.35,0.13-12.27-0.97-16.62-6.51L1.5,105.85l-1.11,2.38 C-0.49,111.32-0.03,113.36,3.39,113.07L3.39,113.07z M46.06,16.1c13.8,0,24.99,11.19,24.99,24.99c0,13.8-11.19,24.99-24.99,24.99 c-13.8,0-24.99-11.19-24.99-24.99C21.08,27.29,32.26,16.1,46.06,16.1L46.06,16.1z" />
                    </g>
                </svg>
                <div id="brand_name" role="tooltip"
                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    {{ __('Brand Name') }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <span class="truncate">{{ $item->brands->name }}</span>
            </div>
            {{-- <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
                <svg data-tooltip-target="manufactureer_name" class="w-6 h-6 mr-2 fill-blue-600" id="Layer_1"
                    data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98.06 122.88">
                    <defs>
                        <style>
                            .cls-1 {
                                fill-rule: evenodd;
                            }
                        </style>
                    </defs>
                    <title>factory-industry</title>
                    <path class="cls-1"
                        d="M15,36.34l-1.75,13.9h19l-1.75-13.9ZM29.2,32a1.63,1.63,0,0,1-3,1.3,6,6,0,0,1-.5-3,7.09,7.09,0,0,1,.86-2.63,1.62,1.62,0,0,1,2.62-.34,8.3,8.3,0,0,0,3.7,2,3.11,3.11,0,0,0,1.89-.11A2.28,2.28,0,0,0,35.92,28a6.54,6.54,0,0,0,.38-3.36,1.63,1.63,0,0,1,3.12-.79,6.73,6.73,0,0,0,5.22,3.36,7.73,7.73,0,0,0,3.08-.18A5.07,5.07,0,0,0,50,25.74c1-1,1.47-2.7,1-5a1.63,1.63,0,0,1,1.28-1.92,1.77,1.77,0,0,1,.51,0,6.17,6.17,0,0,0,6-3.11,5.69,5.69,0,0,0,.64-2.54,4.47,4.47,0,0,0-.6-2.29c-.81-1.35-2.56-2.25-5.36-2a1.63,1.63,0,0,1-1.73-1.13,6.34,6.34,0,0,0-3.08-4.1,4.08,4.08,0,0,0-2.27-.35,4.7,4.7,0,0,0-2.21.91A5.85,5.85,0,0,0,42,8.5a1.63,1.63,0,0,1-3.21.27,7.13,7.13,0,0,0-2.24-3.61,4.33,4.33,0,0,0-2.77-.93,6,6,0,0,0-3,.94A6.88,6.88,0,0,0,28,8.4a1.63,1.63,0,0,1-2.12.91A1.68,1.68,0,0,1,25.35,9a6.85,6.85,0,0,0-4.44-2.15,3.83,3.83,0,0,0-2.14.56,3.71,3.71,0,0,0-1.41,1.71l0,.06a7.56,7.56,0,0,0,.18,5.26,1.64,1.64,0,0,1-1,2.07l-.13,0a4.7,4.7,0,0,0-3.58,3.42V20a4.72,4.72,0,0,0,0,2,4.3,4.3,0,0,0,.81,1.81c1,1.25,2.75,2,5.38,1.63a1.63,1.63,0,0,1,1.61,2.49,12.93,12.93,0,0,0-1.17,2.49,8.43,8.43,0,0,0-.44,2.44,1.63,1.63,0,1,1-3.25-.06,11.32,11.32,0,0,1,.61-3.39l.23-.66A7.77,7.77,0,0,1,11,25.76a7.41,7.41,0,0,1-1.44-3.18,7.89,7.89,0,0,1,.06-3.35l0-.08A7.72,7.72,0,0,1,14,13.9a10,10,0,0,1,.34-6l0-.09A6.9,6.9,0,0,1,17,4.62,7,7,0,0,1,21,3.56,9.33,9.33,0,0,1,26,5.3a10.39,10.39,0,0,1,3.11-2.91A9.3,9.3,0,0,1,33.78,1,7.57,7.57,0,0,1,38.6,2.59,9.23,9.23,0,0,1,40.08,4.1a8.67,8.67,0,0,1,2.23-2.5A8,8,0,0,1,46.06.06,7.31,7.31,0,0,1,50.13.7a9,9,0,0,1,4.36,4.85C58,5.51,60.43,7,61.7,9.15a7.65,7.65,0,0,1,1.06,4,8.88,8.88,0,0,1-1,4A9,9,0,0,1,54.47,22a7.94,7.94,0,0,1-2.08,6,8.26,8.26,0,0,1-3.8,2.21,11.24,11.24,0,0,1-9.37-1.7,8.35,8.35,0,0,1-.35.92,5.44,5.44,0,0,1-2.78,2.77,6.39,6.39,0,0,1-3.85.32A10.28,10.28,0,0,1,29,31.15a3,3,0,0,0,.24.85ZM0,117.06H98.06v5.82H0v-5.82ZM2.47,71l8.41,1L11.75,65h22L35,75.1l60.55,7.6v32.21H2.47V71ZM12.94,53.46l-.86,8.3H33.46l-.86-8.3Zm7.24,33.76H32.8A1.77,1.77,0,0,1,34.57,89v15.88a1.77,1.77,0,0,1-1.77,1.76H20.18a1.76,1.76,0,0,1-1.76-1.76V89a1.76,1.76,0,0,1,1.76-1.76Zm39.48,3H72.29A1.77,1.77,0,0,1,74.05,92v12.88a1.77,1.77,0,0,1-1.76,1.76H59.66a1.77,1.77,0,0,1-1.76-1.76V92a1.78,1.78,0,0,1,1.76-1.76Z" />
                </svg>
                <div id="manufactureer_name" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    {{ __('Manufacturers Name') }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <span class="truncate">{{ $item->manufacturers->name }}</span>
            </div> --}}

            {{-- <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
                <svg data-tooltip-target="model" class="w-6 h-6 mr-2 fill-blue-600" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" width="121.7px" height="122.881px" viewBox="0 0 121.7 122.881"
                    enable-background="new 0 0 121.7 122.881" xml:space="preserve">
                    <g>
                        <path
                            d="M80.833,29.638c0.309-0.061,0.63-0.002,0.896,0.161c0.455,0.188,0.776,0.635,0.778,1.158l0.264,36.584 c0.021,0.449-0.198,0.895-0.611,1.141l-14.941,8.912c-0.211,0.16-0.475,0.254-0.759,0.254c-0.069,0-0.138-0.004-0.204-0.016 l-38.773-4.311c-0.667-0.033-1.198-0.586-1.198-1.262V35.057h0.002c-0.015-0.498,0.268-0.979,0.752-1.191l19.45-8.55l0.001,0.002 c0.203-0.09,0.433-0.126,0.669-0.096L80.833,29.638L80.833,29.638L80.833,29.638z M53.613,0c14.789,0,28.202,6.018,37.918,15.694 c9.716,9.716,15.694,23.089,15.694,37.918c0,10.817-3.226,20.927-8.732,29.343l23.207,25.293l-16.009,14.633L83.311,98.258 c-8.497,5.664-18.724,8.967-29.697,8.967c-14.79,0-28.203-6.018-37.918-15.693C5.979,81.814,0,68.441,0,53.612 c0-14.79,6.019-28.202,15.695-37.918C25.41,5.979,38.784,0,53.613,0L53.613,0z M87.283,19.942 c-8.614-8.614-20.532-13.964-33.67-13.964s-25.056,5.35-33.67,13.964S5.979,40.475,5.979,53.612 c0,13.138,5.349,25.056,13.963,33.671c8.614,8.613,20.533,13.963,33.67,13.963s25.056-5.35,33.67-13.963 c8.614-8.615,13.964-20.533,13.964-33.671C101.247,40.475,95.897,28.557,87.283,19.942L87.283,19.942L87.283,19.942z M68.174,40.325v33.136l11.626-6.57l-0.244-33.406L68.174,40.325L68.174,40.325L68.174,40.325z M64.293,73.824V40.677l-15.63-1.657 l-0.542,15.802l-5.806-3.954l-5.806,3.281l1.198-16.528l-7.994-1.135V70.23L64.293,73.824L64.293,73.824L64.293,73.824z M62.583,29.782L50.84,36.253l15.863,2.024l10.666-6.556L62.583,29.782L62.583,29.782L62.583,29.782z M39.712,34.833l11.373-6.559 l-3.899-0.511l-14.592,6.161L39.712,34.833L39.712,34.833z" />
                    </g>
                </svg>
                <div id="model" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Model
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                {{ $item->model }}
            </div> --}}
            <div class="flex items-center justify-between border-b border-gray-300 px-6 py-2">
                <svg data-tooltip-target="country_of_origin" class="mr-2 h-6 w-6 fill-blue-600"
                    xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                    text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                    clip-rule="evenodd" viewBox="0 0 406 511.8">
                    <path fill-rule="nonzero"
                        d="M391.09 313.35c.07 3.5-2.31 6.48-5.58 7.27-4.22 1.4-8.85 3.49-13.25 3.6-3.42.07-6.34-2.22-7.22-5.36l-7.23-20.55c-1.16-3.31-2.3-6.55-3.42-9.86l-13.75 25.99c-1.51 2.82-7.33 5.95-9.76 7.57-3.38 2.24-7.93 1.33-10.17-2.04-.57-.86-.94-1.79-1.1-2.73l-8.12-40.54-11.13-7.55-25.84-4.04c.91 1.37 1.84 2.74 2.75 4.08 4.74 6.98 9.16 13.5 10.73 20.28 2.52 10.9-1.38 20.14-19.47 27.07.54.31 1.07.64 1.58 1.02 7.22 5.28 9.1 13.26-5.95 33.83-3.81 5.19-7.08 9.77-9.82 13.76-2.15 3.14-4.16 6.15-6 9.05l4.02 25.28c.54 3.41-.21 6.74-2.34 9.99-3.39 5.12-8.32 7.13-12.5 11.24-.57.57-1.1 1.14-1.57 1.69l1.75 7.21c.66 2.69-.27 5.39-2.17 7.13-1.22 1.1-3.04 1.79-4.52 2.47-.48 2.09-1.21 4.14-2.15 6.17-3.21 6.89-9.28 13.82-16.14 17.2-7.63 3.77-16.36 2.98-24.72 3.16-4.05.08-7.41-3.13-7.49-7.18-.07-3.32-.55-6.82-1.43-10.54-2.09-8.88-6.27-16.85-8.66-25.7-2.11-7.81-3.28-18.38 1.35-25.49.68-1 .71-6.29.69-7.54-.11-4.67-2.21-9.33-4.57-13.27-2.14-3.56-6.46-10.5-6.54-14.59-.26-11.98-4.42-14.52-10.12-14.4-8.74.18-17.5 2.82-26.53 3.01-3.85.08-7.68-1.6-11.46-5.01-5.69-5.14-11.36-14.61-15.04-21.46-3.24-6.01-2.99-7.34-3.13-13.98-.63-20.35-1.21-39.59 18.12-54.19 7.89-11.74 15.06-19.4 23.78-24.36 9.07-5.18 19.25-7.13 33.06-7.42 4.05-.09 7.4 3.13 7.49 7.18l.22 10.4 8.88 3.66.12-.6c1.61-8.46 10.74-5.7 16.08-3.88 6.43 2.17 9.98 5.86 17.63 4.2 2.9-.64 2.26-1.43 2.56-4.38l-8.7.97c-2.19.23-4.26-.53-5.76-1.92-1.3-1.21-1.81-2.73-2.81-4.15-3.28-4.66-8.84-7.35-15.6-10.62-8.29-4.01-18.04-8.73-28.63-18.4-34.8 13.18-45.96 15.13-48.94 7.36-1.75-4.54.55-8.26 3.64-13.27 2.78-4.52 6.75-10.94 6.62-16.89a7.335 7.335 0 0 1 4.74-7.02l29.22-14.11c-6.96 0-9.64-12.02-10.75-16.92-1.56-6.88 7.02-9.93 11.58-13.15 3.1-2.2 6.81-5.02 11.12-8.46l.27-.22c-26.96 4.79-52.49 15.72-74.88 31.44-39.8 27.95-68 72.05-76.54 119.96-2.19 12.28-3.15 24.94-2.87 37.97.27 13.02 1.77 25.62 4.47 37.8.15.66.3 1.32.46 1.98l34.27 15.51c3.17 1.43 4.28 4.19 4.34 7.36.32 9.13-2.02 16.08-4.42 23.21-1.86 5.51-3.76 11.15-3.95 17.74-.01.7-.12 1.37-.32 2 13.67 19.29 31.24 36.06 51.15 48.81 20.73 13.28 44.05 22.69 68.3 27.01 24.68 4.4 51.31 3.83 75.78-1.61 24.05-5.34 46.95-15.73 67.1-29.88 19.58-13.75 36.59-31.49 49.5-51.64 13.27-20.7 22.7-44.08 27.01-68.3 2.17-12.23 3.13-24.83 2.86-37.79-.13 2.75-.24 5.61-.18 8.38zM296.75 49.74c21.51 0 38.93 17.43 38.93 38.94 0 21.5-17.42 38.92-38.93 38.92-21.5 0-38.93-17.42-38.93-38.92 0-21.51 17.43-38.94 38.93-38.94zm45.01 146.36c-9.85 10.79-21.35 20.51-34.3 28.5a14.22 14.22 0 0 1-16.05.58c-19.2-12.21-35.37-26.97-48.11-42.97-17.7-22.2-28.87-46.97-32.73-70.91-4.03-24.93-.17-49.04 12.38-68.8 5-7.86 11.39-15.02 19.19-21.24C259.74 7.24 280.03-.16 300.29 0c19.72.16 39.16 7.45 55.86 22.68 5.85 5.35 10.83 11.49 14.9 18.21 13.4 22.1 16.4 50.03 10.61 78.08-5.6 27.16-19.44 54.7-39.9 77.13zm-42.74 17.1C367.23 171.84 393.55 76 346.6 33.17c-28.62-26.12-66.12-24.33-95.64-.81-51.75 41.23-28.55 132.17 48.06 180.84zm70.77-20.43c14.8 21.42 25.67 45.62 31.34 71.04 2.91 13.13 4.52 26.69 4.82 40.66.3 13.98-.74 27.6-3.1 40.84-4.66 26.16-14.81 51.28-29.13 73.63-13.96 21.79-32.25 40.87-53.43 55.74-21.71 15.25-46.41 26.46-72.33 32.23-26.37 5.86-54.9 6.47-81.5 1.73-26.17-4.67-51.28-14.81-73.63-29.14-21.8-13.97-40.87-32.24-55.74-53.43-15.24-21.71-26.47-46.41-32.22-72.33C1.95 340.61.34 327.05.05 313.07c-.3-13.98.73-27.6 3.1-40.84 9.21-51.69 39.59-99.2 82.55-129.36 31.11-21.84 66.33-34.34 104.37-36.69.19 1.52.41 3.05.66 4.57.83 5.17 1.95 10.38 3.33 15.59-3.16.06-3.3.07-6.27 1.74-2.65 1.49-5.97 3.82-9.95 7-4.27 3.39-8.2 6.37-11.8 8.92-2.1 1.49-4.02 2.78-5.77 3.89 2.73.58 4.99 1.98 6.88 10.24 1.21 5.23 3.75 13.44-2.53 16.47l-27.46 13.25c-1.18 8.07-5.42 14.95-8.55 20.03-.06.1-.14.18-.22.25 3.47-2.19 11.78-9.46 31.76-17.18a7.335 7.335 0 0 1 8.25 1.5c10.09 10.12 19.89 14.86 28.08 18.83 8.58 4.15 15.69 7.59 20.87 14.85l11.82-1.31c2.34-.44 4.66.16 6.43 1.79a7.312 7.312 0 0 1 2.37 5.24c.11 5.19-.04 14.85-2.92 19.55-2.53 4.11-6.71 6.46-11.46 7.5-10.08 2.24-15.21-.44-23.98-4.09-.35 1.87-.52 3.24-1.8 4.83a7.329 7.329 0 0 1-8.49 2.18l-21.11-8.71c-2.88-.94-5-3.62-5.07-6.83l-.16-7.61c-7.7.66-13.69 2.19-18.83 5.12-6.7 3.82-12.54 10.28-19.33 20.51-.51.85-1.19 1.61-2.04 2.21-14.12 10.14-13.64 25.94-13.13 42.68.1 3.38.17 4.72.19 5.74.01.34.39.23 1.2 1.72 2.79 5.21 7.7 13.65 11.98 17.52.89.8 1.34 1.2 1.35 1.2 8.92-.19 17.66-2.81 26.53-3.01 14.23-.29 24.58 4.77 25.09 28.77 0 .03 4.3 7.17 4.45 7.41 5.51 9.22 7.88 18.25 6.17 28.95-1.56 9.64-5.35 8.93-2.07 21.04 2.43 8.96 6.6 16.92 8.79 26.16.5 2.13.9 4.21 1.2 6.23 3.83-.08 8.23.28 11.71-1.44 5.16-2.56 10.34-9.81 10.84-15.61.16-3.38 2.1-5.31 4.99-6.66-.83-3.38-2.28-6.84-.27-10.13 3.17-5.21 7.81-9.38 12.79-12.8 1.49-1.03 2.51-1.92 3.07-2.67.21-.35.21-.03.13-.55l-4.29-26.89c-.39-1.81-.12-3.76.94-5.45 2.05-3.28 4.66-7.24 7.84-11.86 3.09-4.48 6.44-9.19 10.04-14.11 7.91-10.81 9.39-13.19 9.15-13.37-.51-.38-1.74-.85-3.03-1.34-3.93-1.51-8.16-3.16-11.14-7.26-3.35-4.66-4.64-12.32 2.93-14.07 19.8-4.58 24.62-9.1 23.49-13.96-.95-4.13-4.63-9.54-8.56-15.33-3.91-5.78-8.05-11.88-10.88-18.58a7.324 7.324 0 0 1-.71-4.41c.61-4 4.35-6.75 8.35-6.14l39.67 6.21c1.95.31 3.83.46 5.53 1.61l14.5 9.81a7.354 7.354 0 0 1 3.67 5.02l5.98 29.91 17.87-33.77c2.66-6.05 11.49-5.79 13.66.58 4.53 13.31 9.04 26.44 13.7 39.69.16-4.04.46-9.3 1.03-14.56.57-5.36 1.42-10.71 2.65-14.82.9-3.02 2.1-5.6 3.65-7.53-1.23-6.95-2.87-13.78-4.92-20.49-2.45-8.09-5.51-15.96-9.16-23.62a189.68 189.68 0 0 0-10.64-19.34c3.78-4.6 7.35-9.35 10.68-14.22zM39.05 396.78c.3-.94.61-1.87.93-2.8 1.61-4.76 3.18-9.43 3.58-14.58L28 372.37c2.97 8.2 6.81 16.75 11.05 24.41z" />
                </svg>
                <div id="country_of_origin" role="tooltip"
                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    {{ __('Country of Origin') }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <span class="truncate">{{ $item->country->name }}</span>
            </div>
        </a>

        {{-- @if (\Route::currentRouteName() != 'homepage')
            <div class="flex flex-col items-center px-6 py-2">
                <div class="inline-flex items-center mt-2">
                    <x-inputs.number min="{{ $item->min_oq }}" wire:model.defer="quantity.{{ $item->id }}" />
                </div>
                @if (!in_array($item->id, $cartProducts))
                    <button wire:click="addToCart({{ $item->id }})"
                        class="flex justify-center w-full px-2 py-2 mt-4 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">
                        Add to Cart</button>
                @else
                    <button wire:click="removeFromCart({{ $item->id }})"
                        class="flex justify-center w-full px-2 py-2 mt-4 font-bold text-white bg-red-600 rounded hover:bg-red-700">Remove
                        Form Cart</button>
                @endif
                <div class="flex justify-between w-full mt-4">
                    <div class="flex items-center text-gray-500">
                        <x-checkbox id="right-label" label="Compare" />
                    </div>
                    <div>
                        @if (!in_array($item->id, $rfqProducts))
                            <button wire:click="addToRfq({{ $item->id }})"
                                class="inline-flex justify-center px-2 py-2 font-medium text-gray-600 rounded hover:text-blue-600">
                                Add to RFQ</button>
                        @else
                            <button wire:click="removeFromRfq({{ $item->id }})"
                                class="inline-flex justify-center px-2 py-2 font-medium text-white bg-red-600 rounded hover:bg-red-700">Remove
                                Form RFQ</button>
                        @endif
                    </div>
                </div>
            </div>
        @endif --}}
    </div>
@else
    {{-- <div class="flex flex-col items-center px-6 py-2">
        <div class="inline-flex items-center mt-2">
            <x-label for="" name='Quantity' />
            <x-inputs.number min="{{ $item->min_oq }}" wire:model.defer="quantity.{{ $item->id }}" />
        </div>
        <div class="flex justify-between w-full mt-4">
            <div class="flex items-center text-gray-500">
                @if (!in_array($item->id, $cartProducts))
                    <button wire:click="addToCart({{ $item->id }})"
                        class="flex justify-center w-full px-2 py-2 mt-4 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">
                        Add to Cart</button>
                @else
                    <button wire:click="removeFromCart({{ $item->id }})"
                        class="flex justify-center w-full px-2 py-2 mt-4 font-bold text-white bg-red-600 rounded hover:bg-red-700">Remove
                        Form Cart</button>
                @endif
            </div>
            <div>
                @if (!in_array($item->id, $rfqProducts))
                    <button wire:click="addToRfq({{ $item->id }})"
                        class="flex justify-center w-full px-2 py-2 mt-4 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">
                        Add to RFQ</button>
                @else
                    <button wire:click="removeFromRfq({{ $item->id }})"
                        class="flex justify-center w-full px-2 py-2 mt-4 font-bold text-white bg-red-600 rounded hover:bg-red-700">Remove
                        Form RFQ</button>
                @endif
            </div>
        </div>
    </div> --}}
@endif
