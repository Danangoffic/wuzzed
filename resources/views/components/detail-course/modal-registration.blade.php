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
                @if (auth()->check() &&
                        ((auth()->user()->role == 'student' && auth()->user()->student->phone == null) ||
                            (auth()->user()->role == 'mentor' && auth()->user()->mentor->phone == null)))
                    <form class="space-y-4" action="#">
                        <label for="telp" class="block mb-2 text-md font-medium text-gray-900">No.
                            Telepon</label>
                        <div class="grid grid-cols-4 gap-x-3 pb-4">
                            <div class="col-span-3">
                                <input type="tel" name="telp" id="telp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="08xxxx" required>
                            </div>
                            <div class="col-span-1">
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ubah</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <hr class="bg-gray-200">
                        <div class="pt-2">
                            <h2 class="text-sm lg:text-lg font-medium text-gray-500 mb-4">Detail Pembelian</h2>
                            <div class="flex justify-between mb-6 gap-4 items-start">
                                <div class="hidden lg:block basis-1/5">
                                    <img src="{{ asset('assets/web/images/course/course-1.jpg') }}"
                                        class="w-full h-auto rounded-lg" alt="">
                                </div>
                                <div class="basis-3/5">
                                    <h2 class="text-sm lg:text-lg text-gray-900 font-medium">{{ $course->name }}
                                    </h2>
                                    <p class="text-sm text-gray-500">Webinar</p>
                                </div>
                                <div class="basis-1/5">
                                    <h2 class="text-xl text-gray-900 font-medium">
                                        {{ 'Rp ' . number_format($price, 0, ',', '.') }}</h2>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <h2 class="text-md text-gray-500">Subtotal</h2>
                                <p class="text-md text-gray-500">{{ 'Rp ' . number_format($price, 0, ',', '.') }}</p>
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
                                <p class="text-sm text-gray-900">Mohon melakukan pembayaran ke Nomor Rekening yang
                                    tertera
                                    dan <b>kirimkan bukti Transfer ke Nomor berikut:<br /> (+62) 852 xxxx xxxx</b></p>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md py-3 text-center">
                            Bayar Sekarang
                        </button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
