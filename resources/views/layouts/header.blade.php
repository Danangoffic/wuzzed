<nav class="bg-[#04016C] h-12 flex items-center justify-center">
    <div class="max-w-screen-xl px-4 lg:px-12 mx-auto">
        <a href="#">
            <h3 class="text-white text-center inline-flex items-center">Free Courses 🌟 Sale Ends Soon, Get It Now <span
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
            <div class="inline-flex items-center">
                <h3 class="pr-3">Hi, <span class="text-[#04016C]">Risel</span></h3>
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full lg:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ asset('assets/web/icons/ic-person.png') }}" alt="user photo">
                </button>
            </div>

            {{-- NOT LOGGED IN --}}
            {{-- <a href="{{ route('login') }}" class="text-white bg-gradient-to-br from-[#04016C] to-[#7F56D9] hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2 lg:px-7 lg:py-3 text-center">Login</a> --}}

            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                id="user-dropdown">
                {{-- <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">Riselda</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">risel.lalusu@gmail.com</span>
                </div> --}}
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('profile') }}"
                            class="block px-6 py-4 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-6 py-4 text-sm text-gray-700 hover:bg-gray-100">Log
                            Out</a>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:space-x-4 xl:space-x-10 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-[#FF6905] lg:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Courses</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Lounge</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Our Service</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded lg:bg-transparent lg:text-gray-900 lg:p-0"
                        aria-current="page">Member Area</a>
                </li>
                <li>
                    <button id="dropdown" data-dropdown-toggle="dropdownNetworking"
                        class="text-center inline-flex items-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-[#FF6905] lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        type="button">Networking <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
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
    </div>
</nav>
