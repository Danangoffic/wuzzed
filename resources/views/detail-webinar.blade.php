@extends('layouts.app')
@section('content')
    {{-- WEBINAR --}}
    <div class="max-w-screen-xl mx-auto px-4 xl:px-12">
        <div class="bg-transparent">
            <img src="{{ asset('assets/web/images/course/img-webinar.jpg') }}" class="w-full h-auto" alt="">
        </div>
    </div>

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
    <div class="max-w-screen-xl mx-auto my-12 px-4 xl:px-12">
        <div class="w-full lg:w-2/3 text-gray-700">
            <h1 class="text-2xl text-[#7F56D9] md:text-3xl font-extrabold mb-6">Fasilitator</h1>
            <img class="h-60 w-60 mx-auto lg:mx-0 rounded-xl mb-3 lg:mb-4"
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                alt="" data-aos="fade-up">
            <div data-aos="fade-in">
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

    {{-- REGISTER --}}
    <div class="max-w-screen-xl mx-auto mb-12 lg:mb-20 px-4 xl:px-12">
        <div class="text-center rounded-xl text-white p-6 lg:p-10"
            style="background: linear-gradient(45deg, rgba(127, 86, 217, 0.90) 10%, rgba(8, 79, 199, 0.90) 50%, rgba(127, 86, 217, 0.90) 80%)"
            data-aos="fade-up">
            <div class="mb-8">
                <h3 class="text-xl mb-1">Normal Price</h3>
                <h3 class="text-xl mb-2 line-through">Rp299.000</h3>
            </div>
            <div class="mb-8">
                <h3 class="text-xl lg:text-3xl mb-4">Early Bird Price!</h3>
                <h3 class="text-5xl lg:text-6xl mb-4">Rp99.000</h3>
                <h3 class="text-lg lg:text-2xl mb-4">s.d 31 Januari 2023</h3>
            </div>
            <button class="text-lg lg:text-2xl text-[#04016C] bg-white rounded-lg py-4 lg:px-16 lg:py-5 w-full lg:w-auto"
                data-modal-target="registration-modal" data-modal-toggle="registration-modal">Daftar
                Segera!</button>
        </div>
    </div>
    <!-- Main modal -->
    <div id="registration-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 !pb-3 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Pendaftaran
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="registration-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <label for="telp" class="block mb-2 text-md font-medium text-gray-900">No.
                            Telepon</label>
                        <div class="grid grid-cols-4 gap-x-3 pb-4">
                            <div class="col-span-3">
                                <input type="tel" name="telp" id="telp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="+62" required>
                            </div>
                            <div class="col-span-1">
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ubah</button>
                            </div>
                        </div>
                        <hr class="bg-gray-200">
                        <div class="pt-2">
                            <h2 class="text-sm lg:text-lg font-medium text-gray-500 mb-4">Detail Pembelian</h2>
                            <div class="flex justify-between mb-6 gap-4 items-start">
                                <div class="hidden lg:block basis-1/5">
                                    <img src="{{ asset('assets/web/images/course/course-1.jpg') }}"
                                        class="w-full h-auto rounded-lg" alt="">
                                </div>
                                <div class="basis-3/5">
                                    <h2 class="text-sm lg:text-lg text-gray-900 font-medium">Human Resource Development
                                    </h2>
                                    <p class="text-sm text-gray-500">Webinar</p>
                                </div>
                                <div class="basis-1/5">
                                    <h2 class="text-xl text-gray-900 font-medium">Rp99.000</h2>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <h2 class="text-md text-gray-500">Subtotal</h2>
                                <p class="text-md text-gray-500">Rp99.000</p>
                            </div>
                            <div class="flex justify-between">
                                <h2 class="text-md text-gray-500">Kode Unik</h2>
                                <p class="text-md text-gray-500">Rp333</p>
                            </div>
                            <div class="flex justify-between mt-4">
                                <h2 class="text-xl text-gray-900 font-semibold">TOTAL</h2>
                                <p class="text-xl text-gray-900 font-semibold">Rp99.333</p>
                            </div>
                        </div>
                        <hr class="bg-gray-200">
                        <div class="my-4">
                            <h2 class="text-sm lg:text-lg font-medium text-gray-500 mb-4">Rekening Bank</h2>
                            <div class="mx-auto text-center mb-4">
                                <img src="{{ asset('assets/web/icons/img-bca.png') }}" class="w-32 h-auto mx-auto mb-2"
                                    alt="BCA">
                                <p class="text-sm lg:text-lg font-semibold">0372413210</p>
                                <p class="text-sm lg:text-lg font-semibold">a/n Riselda Rahma A. L.</p>
                            </div>
                            <div class="bg-gray-100 p-3 rounded-lg">
                                <p class="text-sm text-gray-900">Mohon melakukan pembayaran ke Nomor Rekening yang tertera
                                    dan <b>kirimkan bukti Transfer ke Nomor berikut:<br /> (+62) 852 xxxx xxxx</b></p>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md py-3 text-center">Bayar
                            Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
