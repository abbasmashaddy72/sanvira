<div>
    <div class="relative">
        <div
            class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
            <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="relative table w-full py-32 lg:py-20">
        <div class="2xl:container 2xl:mx-auto">
            <div class="px-4 md:py-12 lg:px-20 md:px-6 py-9">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-3xl font-semibold leading-7 text-gray-800 lg:text-4xl dark:text-white lg:leading-9">
                        On Sale Products</h2>

                    <!-- filters Button (md and plus Screen) -->
                    <button onclick="showFilters()"
                        class="flex items-center justify-center hidden px-6 py-4 text-base font-normal leading-4 text-white bg-gray-800 cursor-pointer dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 sm:flex hover:bg-gray-700 focus:ring focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <img class="dark:hidden"src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg1.svg" />
                        <img
                            class="hidden dark:block"src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg1dark.svg" />
                        Filters
                    </button>
                </div>
                <p class="text-xl font-medium leading-5 text-gray-600 dark:text-gray-400">Products
                </p>

                <!-- Filters Button (Small Screen) -->

                <button onclick="showFilters()"
                    class="flex items-center justify-center block w-full py-2 mt-6 text-base font-normal leading-4 text-white bg-gray-800 cursor-pointer sm:hidden hover:bg-gray-700 focus:ring focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 dark:text-gray-800 dark:bg-white dark:hover:bg-gray-100">
                    <img class="dark:hidden"src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg1.svg"
                        alt="filter" />
                    <img class="hidden dark:block"src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg1dark.svg"
                        alt="filter" />
                    Filters
                </button>
            </div>

            <div id="filterSection"
                class="relative hidden block w-full px-4 md:py-10 lg:px-20 md:px-6 py-9 bg-gray-50 dark:bg-gray-800">
                <!-- Cross button Code -->
                <div onclick="closeFilterSection()"
                    class="absolute top-0 right-0 px-4 cursor-pointer md:py-10 lg:px-20 md:px-6 py-9">
                    <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg2.svg"
                        alt="cross" />
                    <img class="hidden dark:block"
                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg2dark.svg" alt="cross" />
                </div>

                <!-- Colors Section -->
                <div>
                    <div class="flex space-x-2 text-gray-800 dark:text-white">
                        <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg3.svg"
                            alt="colors" />
                        <img class="hidden dark:block"
                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg3dark.svg" alt="colors" />
                        <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6">Colors</p>
                    </div>
                    <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
                        <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                            <div class="w-4 h-4 bg-white rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">White</p>
                        </div>
                        <div class="flex items-center justify-center space-x-2">
                            <div class="w-4 h-4 bg-blue-600 rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">Blue</p>
                        </div>
                        <div class="flex items-center justify-end space-x-2 md:justify-center md:items-center">
                            <div class="w-4 h-4 bg-red-600 rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">Red</p>
                        </div>
                        <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                            <div class="w-4 h-4 bg-indigo-600 rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">Indigo</p>
                        </div>
                        <div class="flex items-center justify-center space-x-2">
                            <div class="w-4 h-4 bg-black rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">Black</p>
                        </div>
                        <div class="flex items-center justify-end space-x-2 md:justify-center md:items-center">
                            <div class="w-4 h-4 bg-purple-600 rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">Purple</p>
                        </div>
                        <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                            <div class="w-4 h-4 bg-gray-600 rounded-full shadow"></div>
                            <p class="text-base font-normal leading-4 text-gray-600 dark:text-gray-300">Grey</p>
                        </div>
                    </div>
                </div>

                <hr class="w-full my-8 bg-gray-200 lg:w-6/12 md:my-10" />

                <!-- Material Section -->
                <div>
                    <div class="flex space-x-2 text-gray-800 dark:text-white">
                        <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg4.svg"
                            alt="materials" />
                        <img class="hidden dark:block"
                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg4dark.svg" alt="materials" />
                        <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6 ">Material</p>
                    </div>
                    <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
                        <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Leather" name="Leather" value="Leather" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Leather">Leather</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Cotton" name="Cotton" value="Cotton" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Cotton">Cotton</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end space-x-2 md:justify-center md:items-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Fabric" name="Fabric"
                                value="Fabric" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Fabric">Fabric</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Crocodile" name="Crocodile"
                                value="Crocodile" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Crocodile">Crocodile</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Wool" name="Wool"
                                value="Wool" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Wool">Wool</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="w-full my-8 bg-gray-200 lg:w-6/12 md:my-10" />

                <!-- Size Section -->
                <div>
                    <div class="flex space-x-2 text-gray-800 dark:text-white">
                        <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg5.svg"
                            alt="size" />
                        <img class="hidden dark:block"
                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg5dark.svg" alt="size" />
                        <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6 ">Size</p>
                    </div>
                    <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
                        <div class="flex items-center justify-start md:justify-center md:items-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Large" name="Large"
                                value="Large" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Large">Large</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Medium" name="Medium"
                                value="Medium" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Medium">Medium</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end md:justify-center md:items-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Small" name="Small"
                                value="Small" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Small">Small</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-start md:justify-center md:items-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="Mini" name="Mini"
                                value="Mini" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="Mini">Mini</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="w-full my-8 bg-gray-200 lg:w-6/12 md:my-10" />

                <!-- Collection Section -->
                <div>
                    <div class="flex space-x-2 text-gray-800 dark:text-white ">
                        <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg6.svg"
                            alt="collection" />
                        <img class="hidden dark:block"
                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg6dark.svg"
                            alt="collection" />
                        <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6 ">Collection</p>
                    </div>
                    <div class="flex mt-8 space-x-8">
                        <div class="flex items-center justify-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="LS" name="LS"
                                value="LS" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="LS">Luxe signature</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <input class="w-4 h-4 mr-2" type="checkbox" id="LxL" name="LxL"
                                value="LxL" />
                            <div class="inline-block">
                                <div class="flex items-center justify-center space-x-6">
                                    <label class="mr-2 text-sm font-normal leading-3 text-gray-600 dark:text-gray-300"
                                        for="LxL">Luxe x London</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Apply Filter Button (Large Screen) -->

                <div class="absolute bottom-0 right-0 hidden px-4 md:block md:py-10 lg:px-20 md:px-6 py-9">
                    <button onclick="applyFilters()"
                        class="px-10 py-4 text-base font-medium leading-4 text-white bg-gray-800 hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800">Apply
                        Filter</button>
                </div>

                <!-- Apply Filter Button (Table or lower Screen) -->

                <div class="block w-full mt-10 md:hidden">
                    <button onclick="applyFilters()"
                        class="w-full px-10 py-4 text-base font-medium leading-4 text-white bg-gray-800 hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800">Apply
                        Filter</button>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-16 lg:pt-0 lg:py-24">
        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                @foreach ($on_sale_products as $item)
                    <div
                        class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                        <div class="relative">
                            <img class="h-32" src="{{ asset($item->image) }}" alt="">
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="{{ route('products_details', ['data' => $item->id]) }}"
                                    class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">{{ $item->name }}</a>
                            </div>

                            <ul
                                class="grid items-center grid-cols-1 gap-2 py-6 list-none border-gray-100 border-y dark:border-gray-800">
                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Min Max Order Quantity:') }}</span>
                                    <span class="ml-2">{{ $item->min_max_oq }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Estimate Delivery Time in Days:') }}</span>
                                    <span class="ml-2">{{ $item->edt }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Brand Name:') }}</span>
                                    <span class="ml-2">{{ $item->brand }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Manufacturer Name:') }}</span>
                                    <span class="ml-2">{{ $item->manufacturer }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Model Name:') }}</span>
                                    <span class="ml-2">{{ $item->model }}</span>
                                </li>
                            </ul>

                            <ul class="flex items-center justify-between pt-6 list-none">
                                <li>
                                    <button class="text-lg font-medium">
                                        Add to RFQ
                                    </button>
                                </li>

                                <li>
                                    <button class="text-lg font-medium">
                                        Add to Cart
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="mt-8">
                {{ $on_sale_products->links() }}
            </div>

        </div>
    </section>
</div>
