@extends('layouts.app-base')
@section('content')
    <div class="h-full bg-gray-50 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 md:m-6 bg-gray-50 flex justify-center flex-1">
            <div
                class="lg:w-3/5 p-8 md:p-16 bg-[#EFF1FD] flex items-center justify-center lg:rounded-tl-3xl lg:rounded-bl-3xl">
                <div class="w-full">
                    <div class="lg:px-12">
                        <div class="flex">
                            <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo" class="w-10 h-10">
                            <h1 class="text-2xl mt-6 lg:mt-2 mb-4 pl-4">Create Account</h1>
                        </div>
                        <p class="text-sm text-gray-500 mb-6">We provide variant data that you can use it in order to get the
                            better perfomance at sales</p>
                        @if ($errors->any())
                            <div class="block px-2 py-3 text-gray-900 bg-red-500 rounded-3xl mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('registerError'))
                            <div class="block px-2 py-3 text-gray-900 bg-red-500 rounded-3xl mb-4">
                                <p>{{ Session::get('registerError') }}</p>
                            </div>
                        @endif
                        <div class="w-full bg-white rounded-3xl p-8 lg:px-10 lg:pt-4 mx-auto">
                            <form class="space-y-6" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="" class="block mb-4 text-sm font-medium text-gray-900"
                                        dark:text-white>
                                        Nama Lengkap
                                    </label>
                                    <input
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Masukkan Nama Lengkap" type="text" name="name" id="name"
                                        required value="{{ old('name') }}" autofocus autocomplete="false">
                                    @error('name')
                                        <span class="text-xs text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">
                                        Email
                                    </label>
                                    <input type="email" name="email" id="email"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="name@company.com" required autocomplete="false"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-xs text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required autocomplete="false">
                                </div>
                                <div>
                                    <label for="password_confirmation"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">
                                        Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="••••••••"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required autocomplete="false">
                                    @error('password_confirmation')
                                        <span class="text-xs text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                        class="w-full text-white bg-[#77C5FD] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-3 mt-4 mb-6 text-center">Register</button>
                                    <div class="text-center text-sm text-gray-400">
                                        Sudah punya Akun?
                                        <a href="{{ route('login') }}" class="text-gray-400 underline">Masuk</a>
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
