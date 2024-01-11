@extends('layouts.app')
@section('content')
    {{-- ONLINE COURSE --}}
    <div class="bg-[#F8F4FF] py-12">
        <div class="max-w-screen-xl mx-auto px-4 xl:px-12">
            <div class="bg-transparent">
                <div class="flex flex-col lg:flex-row gap-6">
                    <div class="basis-2/3">
                        {{-- ALREADY REGISTER ONLINE COURSE --}}
                        <iframe class="aspect-video w-full rounded-xl" src="https://www.youtube.com/embed/j6re1n9IScI"
                            title="[Playlist] Mood Booster 🌈 Positive songs to start your day ~ morning music for positive energy"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                        {{-- NOT REGISTER ONLINE COURSE --}}
                        {{-- <div class="bg-white h-full flex items-center justify-center">
                            <div class="max-w-screen-lg text-center px-28">
                                <p class="font-bold text-lg mb-2">Daftarkan Diri Anda!</p>
                                <p class="font-regular text-lg mb-4">Dapatkan akses penuh untuk mengakses Kelas ini kapanpun dan dimanapun.</p>
                                <button
                                    class="text-white bg-gradient-to-br from-[#04016C] to-[#7F56D9] hover:bg-blue-800 tracking-wide rounded-lg px-5 py-2 lg:px-12 lg:py-4">Gabung Kelas!</button>
                            </div>
                        </div> --}}
                    </div>
                    <div class="basis-1/3">
                        <div class="bg-white rounded-xl p-4">
                            <div class="pb-3">
                                <p>4 Lessons</p>
                            </div>
                            <div class="h-[23rem] overflow-y-auto">
                                <div class="grid grid-cols-1 divide-y pr-4">
                                    @for ($i = 0; $i <= 2; $i++)
                                        <div class="flex justify-between space-x-1 py-2">
                                            <div class="flex-shrink-0">
                                                <span class="material-icons mr-2">play_circle_outline</span>
                                            </div>
                                            <div class="flex-1 ms-2">
                                                <p class="line-clamp-1">
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
                                                <p class="line-clamp-1">
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
    </div>

    {{-- DESCRIPTION --}}
    <div class="max-w-screen-xl mx-auto my-6 lg:my-16 px-4 xl:px-12">
        <h1 class="text-2xl md:text-3xl font-extrabold mb-4">Human Resouce Development</h1>
        <div class="mb-4">
            <h2 class="text-lg">Tentang Materi ini . . .</h2>
        </div>
        <div class="mb-4">
            <h2 class="text-lg mb-2">Apa yang akan didapatkan . . .</h2>
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
            </ul>
        </div>
        <div>
            <h2 class="text-lg">Jadwal Pelaksanaan</h2>
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
