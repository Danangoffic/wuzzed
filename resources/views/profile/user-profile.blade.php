@extends('layouts.app')
@section('content')
    <div class="max-w-screen-xl mx-auto px-4 xl:px-12 my-8">
        <div class="w-full flex flex-wrap">
            <div class="w-full lg:w-1/4">
                <nav class="flex flex-row lg:flex-col lg:space-y-2" aria-label="Tabs" role="tablist" data-hs-tabs-vertical="true">
                    <button type="button"
                        class="hs-tab-active:bg-[#F8F4FF] hs-tab-active:text-gray-900 lg:inline-flex items-center lg:px-4 py-3 text-gray-400 rounded-2xl w-full active"
                        id="vertical-tab-with-border-item-1" data-hs-tab="#vertical-tab-with-border-1"
                        aria-controls="vertical-tab-with-border-1" role="tab">
                        <div class="flex flex-col lg:flex-row">
                            <svg class="w-4 h-4 m-auto lg:me-2 hs-tab-active:text-gray-900 text-gray-400"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                            Account
                        </div>
                    </button>
                    <button type="button"
                        class="hs-tab-active:bg-[#F8F4FF] hs-tab-active:text-gray-900 lg:inline-flex items-center lg:px-4 py-3 text-gray-400 rounded-2xl w-full"
                        id="vertical-tab-with-border-item-2" data-hs-tab="#vertical-tab-with-border-2"
                        aria-controls="vertical-tab-with-border-2" role="tab">
                        <div class="flex flex-col lg:flex-row">
                            <svg class="w-4 h-4 m-auto lg:me-2 hs-tab-active:text-gray-900 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M7.24 7.194a24.16 24.16 0 0 1 3.72-3.062m0 0c3.443-2.277 6.732-2.969 8.24-1.46 2.054 2.053.03 7.407-4.522 11.959-4.552 4.551-9.906 6.576-11.96 4.522C1.223 17.658 1.89 14.412 4.121 11m6.838-6.868c-3.443-2.277-6.732-2.969-8.24-1.46-2.054 2.053-.03 7.407 4.522 11.959m3.718-10.499a24.16 24.16 0 0 1 3.719 3.062M17.798 11c2.23 3.412 2.898 6.658 1.402 8.153-1.502 1.503-4.771.822-8.2-1.433m1-6.808a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                            </svg>
                            Courses
                        </div>
                    </button>
                    <button type="button"
                        class="hs-tab-active:bg-[#F8F4FF] hs-tab-active:text-gray-900 lg:inline-flex items-center lg:px-4 py-3 text-gray-400 rounded-2xl w-full"
                        id="vertical-tab-with-border-item-3" data-hs-tab="#vertical-tab-with-border-3"
                        aria-controls="vertical-tab-with-border-3" role="tab">
                        <div class="flex flex-col lg:flex-row">
                            <svg class="w-4 h-4 lg:me-2 m-auto hs-tab-active:text-gray-900 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 14 3-3m-3 3 3 3m-3-3h16v-3m2-7-3 3m3-3-3-3m3 3H3v3" />
                            </svg>
                            Transactions
                        </div>
                    </button>
                </nav>
            </div>
            <div class="w-full lg:w-3/4">
                <div id="vertical-tab-with-border-1" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-1">
                    <div class="w-full py-6 lg:py-2 lg:pl-7">
                        <div class="mb-8 text-center lg:text-left">
                            <h1 class="text-lg md:text-xl font-medium text-[#FF6905]">Hi, Risel!</h1>
                            <p class="text-sm text-gray-500">Let's manage your account</p>
                        </div>
                        <form class="mx-auto">
                            <div class="mb-5">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                                <input type="text" id="name"
                                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" required>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6 mb-5">
                                <div class="mb-5 lg:mb-0">
                                    <label for="telp"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                        Whatsapp</label>
                                    <input type="text" id="telp"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="+62" required>
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                    </label>
                                    <input type="email" id="email"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="name@flowbite.com" required>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <form class="mx-auto">
                                    <div class="mb-5 lg:mb-0">
                                        <label for="province"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Province</label>
                                        <select id="province"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>France</option>
                                            <option>Germany</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="country"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Country</label>
                                        <select id="country"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>France</option>
                                            <option>Germany</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="text-right mt-8 lg:mt-6">
                                <button type="submit"
                                    class="bg-[#FF6905] text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-4 lg:py-2.5 text-center">Update
                                    Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="vertical-tab-with-border-2" class="hidden" role="tabpanel"
                    aria-labelledby="vertical-tab-with-border-item-2">
                    <div class="w-full py-6 lg:py-2 lg:pl-7">
                        <div class="mb-8 text-center lg:text-left">
                            <h1 class="text-lg md:text-xl font-medium text-[#FF6905]">My Courses</h1>
                            <p class="text-sm text-gray-500">Your Learning Journey</p>
                        </div>
                    </div>
                </div>
                <div id="vertical-tab-with-border-3" class="hidden" role="tabpanel"
                    aria-labelledby="vertical-tab-with-border-item-3">
                    <div class="w-full py-6 lg:py-2 lg:pl-7">
                        <div class="mb-8 text-center lg:text-left">
                            <h1 class="text-lg md:text-xl font-medium text-[#FF6905]">My Transactions</h1>
                            <p class="text-sm text-gray-500">Your History Transactions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
