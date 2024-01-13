@extends('layouts.app-base')
@section('content')
    <div class="h-full bg-gray-50 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 md:m-6 bg-gray-50 flex justify-center flex-1">
            <div
                class="lg:w-3/5 p-8 md:p-16 bg-[#EFF1FD] flex items-center justify-center lg:rounded-tl-3xl lg:rounded-bl-3xl">
                <div class="w-full">
                    <div>
                        <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo" class="w-10 h-10" />
                    </div>
                    <div class="lg:px-12">
                        <h1 class="text-2xl mt-6 lg:mt-8 mb-4">Log In</h1>
                        <p class="text-sm text-gray-500 mb-8">We provide variant data that you can use it in order to get the
                            better perfomance at sales</p>
                        <div class="w-full bg-white rounded-3xl p-8 lg:p-10 mx-auto">
                            <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="email"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Email
                                        </label>
                                    <input type="email" name="email" id="email"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="name@company.com" required>
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required>
                                    <div class="text-xs text-right mt-1">
                                        <a href="#" class="text-gray-400 underline">Lupa Password</a>
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-[#77C5FD] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-3 mt-8 mb-6 text-center">Masuk</button>
                                    <div class="text-center text-sm text-gray-400">
                                        Belum punya Akun?
                                        <a href="{{ route('register') }}" class="underline">Buat Akun</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-gray-50 text-center hidden lg:flex">
                <div class="w-full bg-cover bg-center bg-no-repeat lg:rounded-tr-3xl lg:rounded-br-3xl"
                    style="background-image: url('{{ asset('assets/web/images/bg-login.jpg') }}');">
                </div>
            </div>
        </div>
    </div>
@endsection
