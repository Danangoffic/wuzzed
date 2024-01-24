@extends('layouts.app')
@section('content')
    {{-- WEBINAR --}}
    @include('components.banner.detail-course-webinar')

    {{-- DESCRIPTION --}}
    <div class="max-w-screen-xl mx-auto my-12 px-4 xl:px-12">
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 items-start">
            <div class="w-full lg:basis-2/3 text-gray-700">
                <h1 class="text-2xl text-[#7F56D9] md:text-3xl font-extrabold mb-4">{{ $course->name }}</h1>
                <div class="mb-2">
                    <h2 class=" text-sm lg:text-lg font-bold">(Deskripsi Webinar)</h2>
                </div>
                <div class="mb-4">
                    <h2 class=" text-sm lg:text-lg font-bold mb-2">Apa saja yang akan dibahas?</h2>
                    <ul class="space-y-1 list-inside text-sm lg:text-lg">
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Definisi . . .<span>
                        </li>
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Kompetensi . . .<span>
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
                    <h2 class=" text-sm lg:text-lg font-bold mb-2">Apa saja yang akan didapatkan?</h2>
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Soft File Materi<span>
                        </li>
                        </li>
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
                            <span>Recording Pertemuan<span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full lg:basis-1/3 shadow-card bg-[#F8F4FF] p-4 lg:p-6 rounded-xl text-gray-700">
                <h2 class="text-xl text-[#7F56D9] font-bold mb-4 text-center">Jadwal Pelaksanaan</h2>
                <div class="flex items-center text-sm lg:text-lg mb-3">
                    <span class="material-icons text-gray-700 pr-2">
                        calendar_today
                    </span>9 Februari 2024
                </div>
                <div class="flex items-center text-sm lg:text-lg mb-3">
                    <span class="material-icons text-gray-700 pr-2">
                        schedule
                    </span>13.00 WIB
                </div>
                <hr class="bg-gray-500 my-4">
                <div class="flex items-center text-sm lg:text-lg mb-3">
                    <span class="material-icons text-gray-700 pr-2">
                        call
                    </span> 0852 xxxx xxxx
                </div>
                <div class="flex items-center text-sm lg:text-lg mb-3">
                    <span class="material-icons text-gray-700 pr-2">
                        mail_outline
                    </span>email@gmail.com
                </div>
            </div>
        </div>
    </div>

    {{-- MENTOR / FASILITATOR --}}
    @include('components.detail-course.fasilitator')

    {{-- DETAIL PRICE & REGISTER --}}
    <div class="max-w-screen-xl mx-auto mb-12 lg:mb-20 px-4 xl:px-12">
        @if ($isEarlyBird)
            <div class="text-center rounded-xl text-white p-6 lg:p-10"
                style="background: linear-gradient(45deg, rgba(127, 86, 217, 0.90) 10%, rgba(8, 79, 199, 0.90) 50%, rgba(127, 86, 217, 0.90) 80%)"
                data-aos="fade-up">
                <div class="mb-8">
                    <h3 class="text-xl mb-1">Normal Price</h3>
                    <h3 class="text-xl mb-2 line-through">{{ 'Rp' . number_format($course->price, 0, '.', ',') }}</h3>
                </div>
                <div class="mb-8">
                    <h3 class="text-xl lg:text-3xl mb-4">Early Bird Price!</h3>
                    <h3 class="text-5xl lg:text-6xl mb-4">
                        {{ 'Rp' . number_format($course->early_bird_price, 0, '.', ',') }}</h3>
                    <h3 class="text-lg lg:text-2xl mb-4">s.d {{ $course->early_bird_end->format('d F Y') }}</h3>
                </div>
                @if (auth()->check() && auth()->user()->role == 'student')
                    <button
                        class="text-lg lg:text-2xl text-[#04016C] bg-white rounded-lg py-4 lg:px-16 lg:py-5 w-full lg:w-auto"
                        data-modal-target="registration-modal" data-modal-toggle="registration-modal">Daftar
                        Segera!</button>
                @else
                    <a href="{{ route('register', ['next' => url()->current()]) }}"
                        class="text-lg lg:text-2xl text-[#04016C] bg-white rounded-lg py-4 lg:px-16 lg:py-5 w-full lg:w-auto">
                        Daftar Segera!
                    </a>
                @endif
            </div>
        @else
            <div class="text-center rounded-xl text-white p-6 lg:p-10"
                style="background: linear-gradient(45deg, rgba(127, 86, 217, 0.90) 10%, rgba(8, 79, 199, 0.90) 50%, rgba(127, 86, 217, 0.90) 80%)"
                data-aos="fade-up">
                @if ($course->early_bird_price > 0)
                    <div class="mb-8">
                        <h3 class="text-xl lg:text-3xl mb-4">Early Bird Price!</h3>
                        <h3 class="text-xl mb-2 line-through">
                            {{ 'Rp' . number_format($course->early_bird_price, 0, '.', ',') }}
                        </h3>
                    </div>
                @endif
                <div class="mb-8">
                    <h3 class="text-xl mb-1">Current Price</h3>
                    <h3 class="text-5xl lg:text-6xl mb-4">{{ 'Rp' . number_format($course->price, 0, '.', ',') }}</h3>
                </div>
                @if (auth()->check() && auth()->user()->role == 'student')
                    <button
                        class="text-lg lg:text-2xl text-[#04016C] bg-white rounded-lg py-4 lg:px-16 lg:py-5 w-full lg:w-auto"
                        data-modal-target="registration-modal" data-modal-toggle="registration-modal">Daftar
                        Segera!</button>
                @else
                    <a href="{{ route('register', ['next' => url()->current()]) }}"
                        class="text-lg lg:text-2xl text-[#04016C] bg-white rounded-lg py-4 lg:px-16 lg:py-5 w-full lg:w-auto">
                        Daftar Segera!
                    </a>
                @endif
            </div>
        @endif
    </div>
    <!-- Main modal -->
    @include('components.detail-course.modal-registration')
@endsection
@push('after-style')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush
@push('after-script')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush
