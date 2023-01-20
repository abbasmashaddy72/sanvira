<x-guest-layout>
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('../../assets/images/real/bg/01.jpg')] bg-no-repeat bg-center">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container">
            <div class="grid grid-cols-1 mt-10 text-center">
                <h3 class="text-3xl font-medium leading-normal text-white md:text-4xl md:leading-normal">Grid View Layout
                </h3>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <div class="relative">
        <div
            class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
            <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <div class="container relative -mt-16 z-1">
        <div class="grid grid-cols-1">
            <div class="p-6 bg-white rounded-md shadow-md dark:bg-slate-900 dark:shadow-gray-800">
                <form action="#">
                    <div class="registration-form text-dark text-start">
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2 lg:gap-0">
                            <div class="relative filter-search-form filter-border">
                                <i class="uil uil-search icons"></i>
                                <input name="name" type="text" id="job-keyword"
                                    class="border-0 form-input filter-input-box bg-gray-50 dark:bg-slate-800"
                                    placeholder="Search your keaywords">
                            </div>

                            <div class="relative filter-search-form filter-border">
                                <i class="uil uil-estate icons"></i>
                                <select class="form-select z-2" data-trigger name="choices-catagory"
                                    id="choices-catagory" aria-label="Default select example">
                                    <option>Houses</option>
                                    <option>Apartment</option>
                                    <option>Offices</option>
                                    <option>Townhome</option>
                                </select>
                            </div>

                            <div class="relative filter-search-form filter-border">
                                <i class="uil uil-usd-circle icons"></i>
                                <select class="form-select" data-trigger name="choices-min-price" id="choices-min-price"
                                    aria-label="Default select example">
                                    <option>Min Price</option>
                                    <option>500</option>
                                    <option>1000</option>
                                    <option>2000</option>
                                    <option>3000</option>
                                    <option>4000</option>
                                    <option>5000</option>
                                    <option>6000</option>
                                </select>
                            </div>

                            <div class="relative filter-search-form">
                                <i class="uil uil-usd-circle icons"></i>
                                <select class="form-select" data-trigger name="choices-max-price" id="choices-max-price"
                                    aria-label="Default select example">
                                    <option>Max Price</option>
                                    <option>500</option>
                                    <option>1000</option>
                                    <option>2000</option>
                                    <option>3000</option>
                                    <option>4000</option>
                                    <option>5000</option>
                                    <option>6000</option>
                                </select>
                            </div>

                            <div class="lg:mt-6">
                                <input type="submit" id="search" name="search"
                                    class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                    value="Search">
                            </div>
                        </div>
                        <!--end grid-->
                    </div>
                    <!--end container-->
                </form>
            </div>
        </div>
        <!--end grid-->
    </div>
    <!--end container-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative py-16 lg:py-24">
        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/1.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">10765
                                Hillshire Ave, Baton Rouge, LA 70810, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/2.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">59345
                                STONEWALL DR, Plaquemine, LA 70764, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/3.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">3723 SANDBAR
                                DR, Addis, LA 70710, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/4.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">Lot 21 ROYAL
                                OAK DR, Prairieville, LA 70769, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/5.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">710 BOYD DR,
                                Unit #1102, Baton Rouge, LA 70808, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/6.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">5133 MCLAIN
                                WAY, Baton Rouge, LA 70809, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/7.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">2141 Fiero
                                Street, Baton Rouge, LA 70808</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/8.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">9714
                                Inniswold Estates Ave, Baton Rouge, LA 70809</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/9.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">1433
                                Beckenham Dr, Baton Rouge, LA 70808, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/10.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">1574 Sharlo
                                Ave, Baton Rouge, LA 70820, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/11.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">2528 BOCAGE
                                LAKE DR, Baton Rouge, LA 70809, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/12.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="property-detail.html"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">1533
                                NICHOLSON DR, Baton Rouge, LA 70802, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->
            </div>
            <!--en grid-->

            <div class="grid grid-cols-1 mt-8 md:grid-cols-12">
                <div class="text-center md:col-span-12">
                    <nav>
                        <ul class="inline-flex items-center -space-x-px">
                            <li>
                                <a href="#"
                                    class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-l-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                    <i class="uil uil-angle-left text-[20px]"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="z-10 w-[40px] h-[40px] inline-flex justify-center items-center text-white bg-indigo-600 border border-indigo-600">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-r-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                    <i class="uil uil-angle-right text-[20px]"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
</x-guest-layout>
