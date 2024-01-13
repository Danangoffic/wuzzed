<nav class="bg-[#04016C] h-20 md:h-12 flex items-center justify-center">
    <div class="max-w-screen-xl px-4 lg:px-12 mx-auto">
        <a href="#">
            <h3 class="text-white text-center inline-flex items-center">Materi Gratis 🌟 Promo Akan Berakhir, Dapatkan Segera! <span
                    class="pl-4 material-icons">
                    arrow_forward
                </span></h3>
        </a>
    </div>
</nav>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 xl:px-12 flex flex-wrap items-center justify-between mx-auto py-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-4" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
        <div class="flex items-center lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
            {{-- LOGGED IN --}}
            @if (Auth::check() && Auth::user()->role == 'student')
                <div class="inline-flex items-center">

                    <button type="button" class="flex text-sm bg-white rounded-full lg:me-0" id="user-menu-button"
                        aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <h3 class="pr-3 my-auto">Hi, <span
                                class="text-[#04016C]">{{ explode(' ', Auth::user()->name)[0] }}</span>
                        </h3>
                        <img class="w-8 h-8 rounded-full object-cover" src="{{ asset('assets/web/icons/ic-person.png') }}"
                            alt="user photo">
                    </button>
                </div>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                    id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('profile') }}"
                                class="block px-6 py-4 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        </li>
                        <li>
                            <a href="#" class="block px-6 py-4 text-sm text-gray-700 hover:bg-gray-100">Log
                                Out</a>
                        </li>
                    </ul>
                </div>
            @endif

            {{-- NOT LOGGED IN --}}
            @guest
                <a href="{{ route('login') }}"
                    class="text-white bg-gradient-to-br from-[#04016C] to-[#7F56D9] hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2 lg:px-7 lg:py-3 text-center">Masuk</a>
            @endguest

            <button type="button" data-drawer-target="drawer-right" data-drawer-show="drawer-right"
                data-drawer-placement="right" aria-controls="drawer-right" aria-expanded="false"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
            <ul
                class="flex flex-col font-medium p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:space-x-4 xl:space-x-10 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-[#FF6905] lg:p-0"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Materi</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Lounge</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Layanan Kami</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Ruang Anggota</a>
                </li>
                <li>
                    <button id="dropdown" data-dropdown-toggle="dropdownNetworking"
                        class="text-center inline-flex items-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-[#FF6905] lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        type="button">Jaringan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNetworking"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SubMenu</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <!-- drawer component -->
        <div id="drawer-right"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-right-label">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse mt-8 p-2">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <button type="button" data-drawer-hide="drawer-right" aria-controls="drawer-right"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-xs w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 text-sm font-medium">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-[#FF6905] rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            Materi
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            Lounge
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            Layanan Kami
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            Ruang Anggota
                        </a>
                    </li>
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Jaringan</span>
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Networking</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
