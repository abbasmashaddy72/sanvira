<x-guest-layout>
    <section class="relative pb-16 lg:pb-24">
        <div class="container-fluid">
            <div class="relative text-transparent profile-banner">
                <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)" />
                <div class="relative shrink-0">
                    <img src="assets/images/blog/bg.jpg" class="object-cover w-full h-80" id="profile-banner"
                        alt="">
                    <div class="absolute inset-0 bg-black/70"></div>
                    <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                </div>
            </div>
        </div>
        <!--end container-->

        <div class="container mt-16 lg:mt-24">
            <div class="md:flex">
                <div class="lg:w-1/4 md:w-1/3 md:px-3">
                    <div class="relative -mt-32 md:-mt-48">
                        <div class="p-6 bg-white rounded-md shadow dark:shadow-gray-800 dark:bg-slate-900">
                            <div class="mb-5 text-center profile-pic">
                                <input id="pro-img" name="profile-image" type="file" class="hidden"
                                    onchange="loadFile(event)" />
                                <div>
                                    <div class="relative mx-auto h-28 w-28">
                                        <img src="assets/images/client/05.jpg"
                                            class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800"
                                            id="profile-image" alt="">
                                        <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="text-lg font-semibold">Jenny Jimenez</h5>
                                        <p class="text-slate-400">jennyhot@hotmail.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 dark:border-gray-700">
                                <ul class="mt-3 mb-0 list-none sidebar-nav" id="navmenu-nav">
                                    <li class="navbar-item account-menu">
                                        <a href="user-profile.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                                            <h6 class="mb-0 font-semibold">Profile</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-billing.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                            <h6 class="mb-0 font-semibold">Billing Info</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-payment.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i
                                                    class="uil uil-credit-card"></i></span>
                                            <h6 class="mb-0 font-semibold">Payment</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-invoice.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-receipt"></i></span>
                                            <h6 class="mb-0 font-semibold">Invoice</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-social.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-process"></i></span>
                                            <h6 class="mb-0 font-semibold">Social Profile</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-notification.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                                            <h6 class="mb-0 font-semibold">Notifications</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-setting.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-setting"></i></span>
                                            <h6 class="mb-0 font-semibold">Settings</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="auth-lock-screen.html"
                                            class="flex items-center py-2 rounded navbar-link text-slate-400">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-power"></i></span>
                                            <h6 class="mb-0 font-semibold">Sign Out</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                    <div class="pb-6 border-b border-gray-100 dark:border-gray-700">
                        <h5 class="text-xl font-semibold">Jenny Jimenez</h5>

                        <p class="mt-3 text-slate-400">I have started my career as a trainee and prove my self and
                            achieve all the milestone with good guidance and reach up to the project manager. In this
                            journey, I understand all the procedure which make me a good developer, team leader, and a
                            project manager.</p>
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] pt-6">
                        <div>
                            <h5 class="text-xl font-semibold">Personal Details :</h5>
                            <div class="mt-6">
                                <div class="flex items-center">
                                    <i data-feather="mail" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Email :</h6>
                                        <a href="" class="text-slate-400">jennyhot@hotmail.com</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="bookmark" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Skills :</h6>
                                        <a href="" class="text-slate-400">html</a>, <a href=""
                                            class="text-slate-400">css</a>, <a href=""
                                            class="text-slate-400">js</a>, <a href=""
                                            class="text-slate-400">mysql</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="italic" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Language :</h6>
                                        <a href="" class="text-slate-400">English</a>, <a href=""
                                            class="text-slate-400">Japanese</a>, <a href=""
                                            class="text-slate-400">Chinese</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="globe" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Website :</h6>
                                        <a href="" class="text-slate-400">www.kristajoseph.com</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="gift" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Birthday :</h6>
                                        <p class="mb-0 text-slate-400">2nd March, 1996</p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="map-pin" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Location :</h6>
                                        <a href="" class="text-slate-400">Beijing, China</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="phone" class="mr-3 fea icon-ex-md text-slate-400"></i>
                                    <div class="flex-1">
                                        <h6 class="mb-0 font-medium text-indigo-600 dark:text-white">Cell No :</h6>
                                        <a href="" class="text-slate-400">(+12) 1254-56-4896</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-[30px] lg:mt-0">
                            <h5 class="text-xl font-semibold">Experience :</h5>

                            <div
                                class="flex items-center p-4 mt-6 transition-all duration-500 ease-in-out bg-white rounded-md shadow hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                                <img src="assets/images/client/circle-logo.png"
                                    class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800"
                                    alt="">
                                <div class="flex-1 ml-4 content">
                                    <h4 class="text-lg text-medium">Senior Web Developer</h4>
                                    <p class="mb-0 text-slate-400">3 Years Experience</p>
                                    <p class="mb-0 text-slate-400"><a href=""
                                            class="text-indigo-600">CircleCi</a> @London, UK</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center p-4 mt-6 transition-all duration-500 ease-in-out bg-white rounded-md shadow hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                                <img src="assets/images/client/facebook-logo-2019.png"
                                    class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800"
                                    alt="">
                                <div class="flex-1 ml-4 content">
                                    <h4 class="text-lg text-medium">Web Designer</h4>
                                    <p class="mb-0 text-slate-400">2 Years Experience</p>
                                    <p class="mb-0 text-slate-400"><a href=""
                                            class="text-indigo-600">Facebook</a> @Washington D.C, USA</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center p-4 mt-6 transition-all duration-500 ease-in-out bg-white rounded-md shadow hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                                <img src="assets/images/client/spotify.png"
                                    class="w-16 h-16 p-4 rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800"
                                    alt="">
                                <div class="flex-1 ml-4 content">
                                    <h4 class="text-lg text-medium">UI Designer</h4>
                                    <p class="mb-0 text-slate-400">2 Years Experience</p>
                                    <p class="mb-0 text-slate-400"><a href=""
                                            class="text-indigo-600">Spotify</a> @Perth, Australia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="text-xl font-semibold mt-[30px]">Portfolio :</h5>

                    <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-[30px]">
                        <div class="relative block overflow-hidden transition-all duration-500 rounded-md group">
                            <img src="assets/images/portfolio/1.jpg"
                                class="transition duration-500 group-hover:origin-center group-hover:scale-110 group-hover:rotate-3"
                                alt="">
                            <div
                                class="absolute z-0 transition duration-500 rounded-md inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90">
                            </div>

                            <div class="transition-all duration-500 content">
                                <div
                                    class="absolute z-10 hidden transition-all duration-500 icon group-hover:block top-6 right-6">
                                    <a href="assets/images/portfolio/1.jpg"
                                        class="text-white bg-indigo-600 border-indigo-600 rounded-full btn hover:bg-indigo-700 hover:border-indigo-700 btn-icon lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>

                                <div class="absolute z-10 hidden title group-hover:block bottom-6 left-6">
                                    <a href="portfolio-detail-three.html"
                                        class="text-lg font-medium duration-500 ease-in-out h6 hover:text-indigo-600">Mockup
                                        Collection</a>
                                    <p class="mb-0 text-slate-400">Abstract</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative block overflow-hidden transition-all duration-500 rounded-md group">
                            <img src="assets/images/portfolio/2.jpg"
                                class="transition duration-500 group-hover:origin-center group-hover:scale-110 group-hover:rotate-3"
                                alt="">
                            <div
                                class="absolute z-0 transition duration-500 rounded-md inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90">
                            </div>

                            <div class="transition-all duration-500 content">
                                <div
                                    class="absolute z-10 hidden transition-all duration-500 icon group-hover:block top-6 right-6">
                                    <a href="assets/images/portfolio/2.jpg"
                                        class="text-white bg-indigo-600 border-indigo-600 rounded-full btn hover:bg-indigo-700 hover:border-indigo-700 btn-icon lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>

                                <div
                                    class="absolute z-10 hidden transition-all duration-500 group-hover:block bottom-6 left-6">
                                    <a href="portfolio-detail-three.html"
                                        class="text-lg font-medium duration-500 ease-in-out h6 hover:text-indigo-600">Mockup
                                        Collection</a>
                                    <p class="mb-0 text-slate-400">Abstract</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative block overflow-hidden transition-all duration-500 rounded-md group">
                            <img src="assets/images/portfolio/3.jpg"
                                class="transition duration-500 group-hover:origin-center group-hover:scale-110 group-hover:rotate-3"
                                alt="">
                            <div
                                class="absolute z-0 transition duration-500 rounded-md inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90">
                            </div>

                            <div class="transition-all duration-500 content">
                                <div
                                    class="absolute z-10 hidden transition-all duration-500 icon group-hover:block top-6 right-6">
                                    <a href="assets/images/portfolio/3.jpg"
                                        class="text-white bg-indigo-600 border-indigo-600 rounded-full btn hover:bg-indigo-700 hover:border-indigo-700 btn-icon lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>

                                <div
                                    class="absolute z-10 hidden transition-all duration-500 group-hover:block bottom-6 left-6">
                                    <a href="portfolio-detail-three.html"
                                        class="text-lg font-medium duration-500 ease-in-out h6 hover:text-indigo-600">Mockup
                                        Collection</a>
                                    <p class="mb-0 text-slate-400">Abstract</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative block overflow-hidden transition-all duration-500 rounded-md group">
                            <img src="assets/images/portfolio/4.jpg"
                                class="transition duration-500 group-hover:origin-center group-hover:scale-110 group-hover:rotate-3"
                                alt="">
                            <div
                                class="absolute z-0 transition duration-500 rounded-md inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90">
                            </div>

                            <div class="transition-all duration-500 content">
                                <div
                                    class="absolute z-10 hidden transition-all duration-500 icon group-hover:block top-6 right-6">
                                    <a href="assets/images/portfolio/4.jpg"
                                        class="text-white bg-indigo-600 border-indigo-600 rounded-full btn hover:bg-indigo-700 hover:border-indigo-700 btn-icon lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>

                                <div
                                    class="absolute z-10 hidden transition-all duration-500 group-hover:block bottom-6 left-6">
                                    <a href="portfolio-detail-three.html"
                                        class="text-lg font-medium duration-500 ease-in-out h6 hover:text-indigo-600">Mockup
                                        Collection</a>
                                    <p class="mb-0 text-slate-400">Abstract</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative block overflow-hidden transition-all duration-500 rounded-md group">
                            <img src="assets/images/portfolio/5.jpg"
                                class="transition duration-500 group-hover:origin-center group-hover:scale-110 group-hover:rotate-3"
                                alt="">
                            <div
                                class="absolute z-0 transition duration-500 rounded-md inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90">
                            </div>

                            <div class="transition-all duration-500 content">
                                <div
                                    class="absolute z-10 hidden transition-all duration-500 icon group-hover:block top-6 right-6">
                                    <a href="assets/images/portfolio/5.jpg"
                                        class="text-white bg-indigo-600 border-indigo-600 rounded-full btn hover:bg-indigo-700 hover:border-indigo-700 btn-icon lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>

                                <div
                                    class="absolute z-10 hidden transition-all duration-500 group-hover:block bottom-6 left-6">
                                    <a href="portfolio-detail-three.html"
                                        class="text-lg font-medium duration-500 ease-in-out h6 hover:text-indigo-600">Mockup
                                        Collection</a>
                                    <p class="mb-0 text-slate-400">Abstract</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative block overflow-hidden transition-all duration-500 rounded-md group">
                            <img src="assets/images/portfolio/6.jpg"
                                class="transition duration-500 group-hover:origin-center group-hover:scale-110 group-hover:rotate-3"
                                alt="">
                            <div
                                class="absolute z-0 transition duration-500 rounded-md inset-2 group-hover:bg-white/90 dark:group-hover:bg-slate-900/90">
                            </div>

                            <div class="transition-all duration-500 content">
                                <div
                                    class="absolute z-10 hidden transition-all duration-500 icon group-hover:block top-6 right-6">
                                    <a href="assets/images/portfolio/6.jpg"
                                        class="text-white bg-indigo-600 border-indigo-600 rounded-full btn hover:bg-indigo-700 hover:border-indigo-700 btn-icon lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>

                                <div
                                    class="absolute z-10 hidden transition-all duration-500 group-hover:block bottom-6 left-6">
                                    <a href="portfolio-detail-three.html"
                                        class="text-lg font-medium duration-500 ease-in-out h6 hover:text-indigo-600">Mockup
                                        Collection</a>
                                    <p class="mb-0 text-slate-400">Abstract</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
</x-guest-layout>
