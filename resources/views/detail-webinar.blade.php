@extends('layouts.app')
@section('content')
    {{-- WEBINAR --}}
    <div class="max-w-screen-xl mx-auto px-4 py-12 xl:px-12">
        <div class="bg-transparent">
            <img src="{{ asset('assets/web/images/course/img-webinar.jpg') }}" class="w-full h-auto" alt="">
        </div>
    </div>

    {{-- DESCRIPTION --}}
    <div class="max-w-screen-xl mx-auto my-6 lg:my-16 px-4 xl:px-12">
        <div class="grid grid-cols-4 mb-8">
            <div class="col-span-3">
                <h1 class="text-2xl md:text-3xl font-extrabold mb-4">Human Resouce Development</h1>
                <div class="mb-4">
                    <h2 class="text-lg">Tentang Materi ini . . .</h2>
                </div>
                <div class="mb-4">
                    <h2 class="text-lg mb-2">Apa saja yang akan didapatkan</h2>
                    <ul class="space-y-1 list-inside text-lg">
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>You'll get<span>
                        </li>
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>You'll get<span>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1">
                <div class="bg-[#F8F4FF] p-6 rounded-lg">
                    <h2 class="text-lg font-bold mb-4">Jadwal Pelaksanaan</h2>
                    <p class="text-md">Tanggal</p>
                    <p class="text-md">Jam</p>
                    <p class="text-md">Online via Zoom / Google Meet</p>
                    <hr class="bg-black my-3">
                    <p class="text-md">0852 xxxx xxxx</p>
                    <p class="text-md">email@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="mx-auto text-center">
            <h3 class="text-3xl mb-2">Early Bird Price</h3>
            <h3 class="text-3xl mb-4">Rp99.000</h3>
            <button
                class="text-white text-2xl bg-gradient-to-br from-[#04016C] to-[#7F56D9] hover:bg-blue-800 rounded-lg py-2 px-5 lg:px-20 lg:py-5">Daftar
                Webinar!</button>
        </div>
    </div>
@endsection
