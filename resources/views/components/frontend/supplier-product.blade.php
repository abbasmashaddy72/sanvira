<div
    class="overflow-hidden duration-500 ease-in-out bg-white border-2 border-gray-200 rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700 hover:border-blue-600 hover:border-2">
    <a href="{{ route('products_details', ['data' => $item->id]) }}">
        <div class="relative">
            <img class="object-cover w-full h-40" src="{{ asset('storage/' . $item->images[0]) }}" alt="">
            @if ($item->on_sale)
                <span
                    class="absolute top-0 left-0 z-10 inline-flex px-3 py-2 mt-3 ml-3 text-sm font-medium text-white bg-green-500 rounded-lg">
                    On Sale
                </span>
            @endif
        </div>

        <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
            <div class="text-lg font-semibold duration-500 ease-in-out hover:text-blue-600">{{ $item->name }}</div>
            <div class="flex">
                {{ $item->price ? $item->price : $item->min_price . ' - ' . $item->max_price }}
                <svg data-tooltip-target="price" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ml-1 fill-blue-600" viewBox="0 0 117.77 122.88">
                    <path
                        d="M19.81,113.35a7.89,7.89,0,0,1-1.74,3.45,5.87,5.87,0,0,1-2.46,1.31L0,122.88a16.13,16.13,0,0,1,2.51-3.75,11.83,11.83,0,0,1,3.72-2,12.16,12.16,0,0,1-2.93-2.41,3.47,3.47,0,0,1-.92-2.21A5.19,5.19,0,0,1,3,110.37,13.08,13.08,0,0,1,4.47,108c3.15-4.2,6.25-6.28,9.33-6.28a2.91,2.91,0,0,1,2.21.89,3.39,3.39,0,0,1,.82,2.36,5.39,5.39,0,0,1-.32,2,18.35,18.35,0,0,1-1.34,2.5q-3.59-1.78-4.89-1.78a5.82,5.82,0,0,0-2.58.64,6.66,6.66,0,0,0-1.59,1.17c0,.65,1.16,1.61,3.47,2.93s4,2,5,2a34.37,34.37,0,0,0,5.24-1ZM20,67.17A43.15,43.15,0,0,1,18.42,79a95.91,95.91,0,0,1-6,14.37L8,91.6A83,83,0,0,0,9.83,76.46c0-3-.25-7.3-.72-13S8,52.06,7.27,46.45s-1.91-12.29-3.57-20a33.76,33.76,0,0,1-.87-5.61c0-1.49.75-4,2.26-7.67S8.69,5.14,11.4,0l4.41,25.77q2.46,14.7,3.4,25.47c.5,5.53.75,10.85.75,15.93Zm15.91,42.45V89.22H56.28v20.4Zm81.9-21.3h-33c-3.21,0-5.66-.67-7.38-2-2.08-1.66-3.13-4.37-3.13-8.09,0-2.16.13-4.47.35-6.93s.55-5,1-7.52l3-.15a5.6,5.6,0,0,0,2.59,3.75A9.39,9.39,0,0,0,86,68.51h24.93q-1.68-10.71-5.81-17.1a30.44,30.44,0,0,0-9.54-9.18l5.29-22.72a38.18,38.18,0,0,1,13.31,18.2q3.61,10.27,3.6,27.23V88.32Z" />
                </svg>
                <div id="price" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    United Arab Emirates Dirham(AED)
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
            <div class="flex">
                <svg data-tooltip-target="min_max_oq" class="w-6 h-6 mr-2 fill-blue-600" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 118.67 122.88" style="enable-background:new 0 0 118.67 122.88"
                    xml:space="preserve">
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
                    image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 505 512.15">
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
        </div>
        <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
            <svg data-tooltip-target="brand_name" class="w-6 h-6 mr-2 fill-blue-600" version="1.1" id="Layer_1"
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
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Brand Name
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            {{ $item->brands->name }}
        </div>
        <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
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
                Manufacturers Name
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            {{ $item->manufacturers->name }}
        </div>

        <div class="flex items-center justify-between px-6 py-2 border-b border-gray-300">
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
        </div>
    </a>

    @if (\Route::currentRouteName() != 'homepage')
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
    @endif
</div>
