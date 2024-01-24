@extends('layouts.app')
@section('content')
    {{-- ONLINE COURSE --}}
    <div class="bg-[#F8F4FF] my-4 py-4 lg:my-12 lg:py-12">
        <div class="max-w-screen-xl mx-auto px-4 xl:px-12">
            <div class="flex flex-col lg:flex-row gap-4  lg:gap-6">
                <div class="basis-2/3">
                    {{-- ALREADY REGISTER ONLINE COURSE --}}
                    {{-- <iframe class="aspect-video w-full rounded-xl" src="https://www.youtube.com/embed/j6re1n9IScI"
                        title="[Playlist] Mood Booster 🌈 Positive songs to start your day ~ morning music for positive energy"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe> --}}

                    {{-- NOT REGISTER ONLINE COURSE --}}
                    <div class="bg-white h-full flex items-center justify-center">
                        <div class="max-w-screen-lg text-center py-4 px-4 lg:py-0 lg:px-28">
                            <p class="font-bold text-lg mb-2">Daftarkan Diri Anda!</p>
                            <p class="font-regular text-base lg:text-lg mb-4">Dapatkan akses penuh untuk mengakses Kelas ini kapanpun dan
                                dimanapun.</p>
                            <button
                                class="text-white bg-gradient-to-br from-[#04016C] to-[#7F56D9] hover:bg-blue-800 tracking-wide rounded-lg px-24 py-4 lg:px-12">Gabung
                                Kelas!</button>
                        </div>
                    </div>
                </div>
                <div class="basis-1/3">
                    <div class="bg-white rounded-xl p-4">
                        <div class="pb-3">
                            <p>4 Lessons</p>
                        </div>
                        <div class="h-60 lg:h-[23rem] overflow-y-auto">
                            <div class="grid grid-cols-1 divide-y pr-4">
                                @for ($i = 0; $i <= 2; $i++)
                                    <div class="flex justify-between space-x-1 py-2">
                                        <div class="flex-shrink-0">
                                            <span class="material-icons mr-2">play_circle_outline</span>
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <p class="text-base line-clamp-1">
                                                HR Definition
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                4 Mins
                                            </p>
                                        </div>
                                        <span class="material-icons text-green-500">check_circle</span>
                                    </div>
                                @endfor
                                @for ($i = 0; $i <= 2; $i++)
                                    <div class="flex justify-between space-x-1 py-2">
                                        <div class="flex-shrink-0">
                                            <span class="material-icons mr-2">play_circle_outline</span>
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <p class="text-base line-clamp-1">
                                                HR Introduction HR Introduction HR Introduction
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                5 Mins
                                            </p>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABS --}}
    <div class="max-w-screen-xl mx-auto my-4 lg:mt-10 lg:mb-6 px-4 xl:px-12">
        <div class="my-auto">
            <div class="flex items-center overflow-x-auto lg:overflow-hidden h-20">
                <a href="#about" class="flex-none">
                    <span
                        class="bg-[#04016C] text-white text-base lg:text-lg font-medium me-4 py-3 lg:py-4 px-6 lg:px-8 rounded-xl">Tentang</span>
                </a>
                <a href="#mentor" class="flex-none">
                    <span
                        class="bg-[#04016C] text-white text-base lg:text-lg font-medium me-4 py-3 lg:py-4 px-6 lg:px-8 rounded-xl">Mentor</span>
                </a>
                <a href="#about" class="flex-none">
                    <span
                        class="bg-[#04016C] text-white text-base lg:text-lg font-medium me-4 py-3 lg:py-4 px-6 lg:px-8 rounded-xl">Tentang</span>
                </a>
                <a href="#mentor" class="flex-none">
                    <span
                        class="bg-[#04016C] text-white text-base lg:text-lg font-medium me-4 py-3 lg:py-4 px-6 lg:px-8 rounded-xl">Mentor</span>
                </a>
            </div>
        </div>
    </div>

    {{-- DESCRIPTION --}}
    <div class="max-w-screen-xl mx-auto mb-6 px-4 xl:px-12" id="about">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <h1 class="text-xl lg:text-2xl md:text-3xl text-[#7F56D9] font-extrabold mb-4">Human Resouce Development</h1>
                <div class="mb-2">
                    <h2 class="text-sm lg:text-lg">(Deskripsi Materi)</h2>
                </div>
                <div class="mb-4">
                    <h2 class="text-sm lg:text-lg mb-2">Apa saja yang akan dibahas?</h2>
                    <ul class="space-y-1 list-inside text-sm lg:text-lg">
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Pengertian . . .<span>
                        </li>
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Contoh . . .<span>
                        </li>
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Studi Kasus . . .<span>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h2 class="text-sm lg:text-lg mb-2">Apa saja yang akan didapatkan?</h2>
                    <ul class="space-y-1 list-inside text-sm lg:text-lg">
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>E-Sertifikat<span>
                        </li>
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Akses Penuh Selamanya<span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- MENTOR / FASILITATOR --}}
    <div class="max-w-screen-xl mx-auto mb-6 lg:mb-16 px-4 xl:px-12" id="mentor">
        <div class="w-full lg:w-2/3 text-gray-700">
            <h1 class="text-2xl text-[#7F56D9] md:text-3xl font-extrabold mb-6">Mentor</h1>
            <img class="h-60 w-60 mx-auto lg:mx-0 rounded-xl mb-3 lg:mb-4"
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                alt="">
            <div>
                <h3 class="text-lg lg:text-2xl font-bold text-center lg:text-left leading-7 lg:mb-1">Leslie Alexander</h3>
                <p class="text-sm lg:text-lg font-semibold text-center lg:text-left mb-3">Co-Founder / CEO</p>
                <div class="text-sm lg:text-lg">
                    <ul class="list-outside list-disc ps-5">
                        <li>Founder of . . .</li>
                        <li>Certified . . .</li>
                        <li>Certified Certified Certified Certified ...</li>
                        <li>Certified ...</li>
                        <li>Certified Certified Certified Certified Certified...</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: white;
            /* box-shadow: inset 0 0 5px grey; */
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #F8F4FF;
            border-radius: 10px;
        }
    </style>
@endpush
