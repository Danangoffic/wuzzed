@extends('layouts.app')
@section('content')
    <div class="max-w-screen-xl mx-auto xl:px-12">
        <div class="jumbotron-carousel owl-carousel owl-theme relative z-10">
            <div class="bg-cover bg-center bg-no-repeat rounded-xl bg-gray-500 bg-blend-multiply w-full"
                style="background-image: url('{{ asset('assets/web/images/home-slider/lauren-mancke-aOC7TSLb1o8-unsplash.jpg') }}')">
                <div class="px-5 mx-5 lg:mx-28 text-center py-24 md:py-16">
                    <h1 class="mb-8 text-4xl md:text-5xl font-extrabold text-white">
                        Start
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-orange-300">Learning</span>
                        Skill from your Favorite Mentor
                    </h1>
                    <p class="mb-8 md:mb-8 text-md md:text-lg text-gray-300 sm:px-16 lg:px-40">
                        Contrary to popular belief, Lorem Ipsum is not simply
                        random text. It has roots in a piece of classical Latin
                        literature from 45 BC,
                    </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                        <a href="#"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-lg md:text-base font-medium text-center bg-[#FF6905] text-white rounded-lg hover:bg-gray-100">
                            Explore Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto lg:py-4 bg-gradient-to-t from-[#F8F4FF] to-[#FFFFFF]">
        <div class="max-w-screen-xl mx-auto py-8 lg:my-8 px-4 xl:px-12">
            <div class="lg:grid lg:grid-cols-6 gap-x-16">
                <div class="lg:col-span-1 my-auto">
                    <h1 class="md:mb-1 text-2xl md:text-3xl font-extrabold">Your <span class="text-[#7F56D9]">Active
                            Lessons</span>
                    </h1>
                </div>
                <div class="lg:col-span-5 relative">
                    <div class="activelessons-carousel owl-carousel owl-theme relative z-10">
                        @for ($i = 0; $i <= 3; $i++)
                            <div class="my-4">
                                <a href="">
                                    <div class="flex-none shadow-lg bg-white rounded-lg mx-2 lg:w-[16rem]">
                                        <img class="rounded-t-lg" src="{{ asset('assets/web/images/course/course-1.jpg') }}"
                                            alt="" />
                                        <div class="p-4">
                                            <h3 class="text-lg md:text-base font-bold text-gray-900 mb-2">Digital Marketing
                                                {{ $i + 1 }}</h3>
                                            <h5 class="text-sm text-gray-700 mb-2">Marketing Management / <span
                                                    class="text-gray-500">Marketing Introduction</span></h5>
                                            <div class="flex items-center my-auto mb-2">
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-[#FAB437] h-1.5 rounded-full" style="width: 20%">
                                                    </div>
                                                </div>
                                                <p class="ms-4 text-gray-700">20%</p>
                                            </div>
                                            <div class="flex items-center">
                                                <div>
                                                    <img src="{{ asset('assets/web/icons/ic-play.png') }}"
                                                        class="block w-4 h-4" alt="">
                                                </div>
                                                <h5 class="text-sm md:text-xs text-gray-700 ml-2">2 Hours 12 Minutes</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                    <div
                        class="hidden lg:block md:absolute md:-right-4 md:top-0 bg-gradient-to-r from-transparent to-[#F8F4FF] blur w-96 h-96 z-40">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto my-12 lg:my-20 px-4 xl:px-12">
        <h1 class="mb-0 md:md:mb-1 text-2xl md:text-3xl font-extrabold">Your <span class="text-[#7F56D9]">Completed
                Courses</span>
        </h1>
        <div class="md:flex md:justify-between items-center mb-2 md:mb-6">
            <h3 class="text-sm md:text-md text-gray-400 mb-2 sm:mb-0">Let’s join our best courses with our famous mentor
            </h3>
            <a class="text-[#7F56D9] flex items-center justify-end" href=""><span class="underline mr-1">View
                    All</span><span class="material-icons">north_east</span></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
            @for ($i = 0; $i <= 3; $i++)
                <div class="p-4 w-full bg-white shadow-lg md:shadow-card rounded-lg">
                    <img class="rounded-lg mb-4" src="{{ asset('assets/web/images/course/course-1.jpg') }}"
                        alt="" />
                    <h3 class="text-lg md:text-base font-bold text-gray-900 mb-2 mb-1">Digital Marketing</h3>
                    <h5 class="text-sm md:text-xs text-gray-700 mb-4">Accomplished on 7 July, 2022</h5>
                    {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology.</p> --}}
                    <a href="" class="block w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 text-center py-3 mb-2">Download
                        Certificate</a>
                    <a href="#"
                        class="w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 py-3 inline-flex justify-center items-center">Share
                        to LinkedIn <img src="{{ asset('assets/web/icons/ic-linkedin.png') }}" class="w-4 ml-2"
                            alt=""></a>
                </div>
            @endfor
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto my-16 lg:my-20 px-4 xl:px-12">
        <h1 class="md:mb-1 text-2xl md:text-3xl font-extrabold">Most <span class="text-[#7F56D9]">Popular Course</span>
        </h1>
        <div class="md:flex md:justify-between items-center mb-2 md:mb-6">
            <h3 class="text-sm md:text-md text-gray-400 mb-2 sm:mb-0">Let’s join our best courses with our famous mentor
            </h3>
            <a class="text-[#7F56D9] flex items-center justify-end" href=""><span class="underline mr-1">Explore
                    Course</span><span class="material-icons">north_east</span></a>
        </div>
        <div class="owl-carousel course-carousel owl-theme">
            @for ($i = 0; $i <= 8; $i++)
                <div class="bg-white shadow-lg rounded-lg md:mx-2 cursor-pointer my-4">
                    <img class="rounded-t-lg" src="{{ asset('assets/web/images/course/course-1.jpg') }}" alt="" />
                    <div class="p-4">
                        <div class="flex items-center space-x-5 mb-4">
                            <div class="flex items-center">
                                <div><img src="{{ asset('assets/web/icons/ic-play.png') }}" class="w-5 h-5" alt="">
                                </div>
                                <h5 class="text-sm md:text-xs pl-2">13x Lessons</h5>
                            </div>
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <div><img src="{{ asset('assets/web/icons/ic-student.png') }}" class="w-5 h-4"
                                            alt=""></div>
                                    <h5 class="text-sm md:text-xs pl-2">33</h5>
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-2 text-lg md:text-base font-bold text-gray-900 dark:text-white">Digital Marketing
                        </h3>
                        <h3 class="mb-3 text-lg md:text-base font-normal text-gray-500 dark:text-white">Rp99.000
                        </h3>
                        <div class="flex items-center mb-4">
                            <div class="flex flex-wrap items-center">
                                <svg class="w-5 h-5 md:w-3 md:h-3 text-[#FF6905] me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-5 h-5 md:w-3 md:h-3 text-[#FF6905] me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-5 h-5 md:w-3 md:h-3 text-[#FF6905] me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-5 h-5 md:w-3 md:h-3 text-[#FF6905] me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-5 h-5 md:w-3 md:h-3 me-1 text-gray-300 dark:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            </div>
                            <h5 class="ms-2 text-sm md:text-xs text-gray-900 dark:text-white">4.95</h5>
                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full items-center dark:bg-gray-400"></span>
                            <h5 class="text-sm md:text-xs text-gray-900 dark:text-white">(33)</h5>
                        </div>
                        <a href="{{ route('detail-course') }}"
                            class="w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 text-center py-3 inline-flex justify-center items-center">Start
                            Course <span class="material-icons !text-lg md:text-base">chevron_right</span></a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="mx-auto my-8 md:my-12"
        style="background: linear-gradient(45deg, rgba(8, 79, 199, 0.90) 26.49%, rgba(127, 86, 217, 0.90) 85.53%)">
        <div class="mx-auto py-12 lg:py-16 relative px-4 xl:px-12">
            <div
                class="w-40 h-40 md:w-60 md:h-72 bg-[#3E96EE] rounded-full absolute -left-20 bottom-10 md:top-10 blur-3xl">
            </div>
            <img src="{{ asset('assets/web/icons/ic-tripleline.png') }}" class="absolute left-0 bottom-5 md:top-10 w-36"
                alt="">
            <div class="max-w-screen-xl mx-auto">
                <div class="max-w-screen-sm mx-auto text-center mb-8 lg:mb-16">
                    <h3 class="text-2xl md:text-3xl mb-4 font-extrabold text-white">Why Choose Us?</h3>
                    <p class="text-sm md:text-md text-gray-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod
                        tdefdemporidunt ut labore
                        veniam...</p>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 text-white gap-x-4 divide-y md:divide-y-0 md:divide-x-0 lg:divide-x border-dashed">
                    <div class="text-center px-8 py-8 lg:py-0">
                        <img src="{{ asset('assets/web/icons/ic-learn.png') }}" class="mx-auto w-20 md:w-12 mb-6"
                            alt="">
                        <div>
                            <h3 class="text-md md:text-lg font-extrabold mb-4">01. Learn</h3>
                            <p class="text-sm md:text-md">Lorem ipsum dolor sit amet, consectetur dolorili adipiscing elit.
                                Felis donec
                                massa aliqua.</p>
                        </div>
                    </div>
                    <div class="text-center px-8 py-8 lg:py-0">
                        <img src="{{ asset('assets/web/icons/ic-mentoring.png') }}" class="mx-auto w-20 md:w-12 mb-6"
                            alt="">
                        <div>
                            <h3 class="text-md md:text-lg font-extrabold mb-4">02. Mentoring</h3>
                            <p class="text-sm md:text-md">Lorem ipsum dolor sit amet, consectetur dolorili adipiscing elit.
                                Felis donec
                                massa aliqua.</p>
                        </div>
                    </div>
                    <div class="text-center px-8 py-8 lg:py-0">
                        <img src="{{ asset('assets/web/icons/ic-graduate.png') }}" class="mx-auto w-20 md:w-12 mb-6"
                            alt="">
                        <div>
                            <h3 class="text-md md:text-lg font-extrabold mb-4">03. Graduate</h3>
                            <p class="text-sm md:text-md">Lorem ipsum dolor sit amet, consectetur dolorili adipiscing elit.
                                Felis donec
                                massa aliqua.</p>
                        </div>
                    </div>
                    <div class="text-center px-8 py-8 lg:py-0">
                        <img src="{{ asset('assets/web/icons/ic-work.png') }}" class="mx-auto w-20 md:w-12 mb-6"
                            alt="">
                        <div>
                            <h3 class="text-md md:text-lg font-extrabold mb-4">03. Work</h3>
                            <p class="text-sm md:text-md">Lorem ipsum dolor sit amet, consectetur dolorili adipiscing elit.
                                Felis
                                donec
                                massa aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto my-6 lg:my-16 px-4 xl:px-12">
        <h1 class="md:mb-1 text-2xl md:text-3xl font-extrabold">Top 10 <span class="text-[#7F56D9]">Favorite
            </span>Video</h1>
        <h3 class="text-sm md:text-md text-gray-400 mb-4">Let’s join our best courses with our famous mentor
        </h3>
        <div class="top10-carousel owl-carousel owl-theme">
            @for ($i = 1; $i <= 10; $i++)
                <div class="bg-white p-4 shadow-lg rounded-lg md:mx-2 my-4">
                    <img class="rounded-lg mb-3" src="{{ asset('assets/web/images/course/course-1.jpg') }}"
                        alt="" />
                    <div class="flex items-center justify-between mb-1 space-x-2">
                        <div>
                            <h3 class="text-lg md:text-base font-bold text-gray-900 mb-2">Marketing Introduction
                                {{ $i }}</h3>
                        </div>
                        <svg width="16" height="16" viewBox="0 0 136 167" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M129.145 160.61L67.5723 113.038L6 160.61V17.8931C6 14.7388 7.62182 11.7138 10.5085 9.4834C13.3953 7.25302 17.3105 6 21.3931 6H113.752C117.834 6 121.75 7.25302 124.636 9.4834C127.522 11.7138 129.145 14.7388 129.145 17.8931V160.61Z"
                                stroke="#000001" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{-- <svg width="20" height="20" viewBox="0 0 136 167" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M129.145 160.61L67.5723 113.038L6 160.61V17.8931C6 14.7388 7.62182 11.7138 10.5085 9.4834C13.3953 7.25302 17.3105 6 21.3931 6H113.752C117.834 6 121.75 7.25302 124.636 9.4834C127.522 11.7138 129.145 14.7388 129.145 17.8931V160.61Z"
                                fill="black" stroke="#000001" stroke-width="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg> --}}
                    </div>
                    <h5 class="text-sm text-gray-700 mb-4">Digital Marketing</span></h5>
                    <a href="#" class="block w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 text-center py-3 mb-2">Get it
                        Now</a>
                </div>
            @endfor
        </div>
    </div>
    <div class="bg-[#F8F4FF] rounded-3xl py-6 md:py-6">
        <div class="max-w-screen-xl mx-auto my-6 md:my-6 px-4 xl:px-12">
            <h1 class="md:mb-1 text-2xl md:text-3xl font-extrabold">Top 10 <span class="text-[#7F56D9]">Active
                    Learning</span> Video</h1>
            <h3 class="text-sm md:text-md text-gray-400 mb-4">Let’s join our best courses with our famous mentor
            </h3>
            <div class="top10-carousel owl-carousel owl-theme">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="p-4 bg-white shadow-lg rounded-lg my-6 mx-1 md:mx-2">
                        <img class="rounded-lg mb-3" src="{{ asset('assets/web/images/course/course-1.jpg') }}"
                            alt="" />
                        <div class="flex items-center justify-between mb-1 space-x-2">
                            <div>
                                <h3 class="text-lg md:text-base font-bold text-gray-900 mb-2">Marketing Introduction
                                    {{ $i }}</h3>
                            </div>
                            <svg width="16" height="16" viewBox="0 0 136 167" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M129.145 160.61L67.5723 113.038L6 160.61V17.8931C6 14.7388 7.62182 11.7138 10.5085 9.4834C13.3953 7.25302 17.3105 6 21.3931 6H113.752C117.834 6 121.75 7.25302 124.636 9.4834C127.522 11.7138 129.145 14.7388 129.145 17.8931V160.61Z"
                                    stroke="#000001" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            {{-- <svg width="20" height="20" viewBox="0 0 136 167" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M129.145 160.61L67.5723 113.038L6 160.61V17.8931C6 14.7388 7.62182 11.7138 10.5085 9.4834C13.3953 7.25302 17.3105 6 21.3931 6H113.752C117.834 6 121.75 7.25302 124.636 9.4834C127.522 11.7138 129.145 14.7388 129.145 17.8931V160.61Z"
                                        fill="black" stroke="#000001" stroke-width="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg> --}}
                        </div>
                        <h5 class="text-sm text-gray-700 mb-4">Digital Marketing</span></h5>
                        <a href="#"
                            class="block w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 text-center py-3 mb-2">Get it
                            Now</a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto my-12 md:my-16 px-4 xl:px-12">
        <h1 class="md:mb-1 text-2xl md:text-3xl font-extrabold text-[#7F56D9] text-center">Testimonials</h1>
        <h3 class="mb-4 text-sm md:text-md text-gray-400 text-center">What our members say about us</h3>
        <div class="testimonial-carousel owl-carousel owl-theme">
            @for ($i = 0; $i <= 5; $i++)
                <div class="bg-white drop-shadow-xl md:shadow-card rounded-lg mt-4 mb-6 md:my-6 mx-1">
                    <div class="p-6">
                        <div class="flex flex-wrap items-center mb-4">
                            <svg class="w-5 h-5 text-[#FF6905] me-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-5 h-5 text-[#FF6905] me-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-5 h-5 text-[#FF6905] me-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-5 h-5 text-[#FF6905] me-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-5 h-5 me-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        </div>
                        <p class="mb-2 text-sm">"Excepteur sint occaecat cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
                        <p class="mb-4 text-sm text-gray-500">December 12, 2022, 22.45</p>
                        <div class="flex items-center space-x-4">
                            <div>
                                <img class="w-8 h-8 sm:w-5 sm:h-5 lg:w-8 lg:h-8 rounded-full" src="{{ asset('assets/web/icons/ic-person.png') }}"
                                    alt="">
                            </div>
                            <div class="flex items-center divide-x-2 divide-gray-300 gap-x-3">
                                <h3 class="text-sm md:text-xs text-gray-900">Danang Arif Rahmanda</h3>
                                <p class="text-sm md:text-xs text-gray-500 ps-2">Member</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto my-12 md:my-16 px-4 xl:px-12">
        <h1 class="md:mb-1 text-2xl md:text-3xl font-extrabold"> <span class="text-[#7F56D9]">Hot Threads</span> and
            <span class="text-[#7F56D9]">New Articles</span>
        </h1>
        <div class="md:flex md:justify-between items-center mb-2 md:mb-6">
            <h3 class="text-sm md:text-md text-gray-400 mb-2 sm:mb-0">Join the Conversation on Trending Threads and New
                Articles</h3>
            <a class="text-[#7F56D9] flex items-center justify-end" href=""><span class="underline mr-1">View
                    All</span><span class="material-icons">north_east</span></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @for ($i = 0; $i <= 3; $i++)
                <div class="w-full lg:max-w-sm bg-white drop-shadow-xl md:shadow-card rounded-lg lg:my-4">
                    <div class="p-5">
                        <h3 class="text-sm mb-1">Danang Arif Rahmanda</h3>
                        <div class="flex items-center mb-3">
                            <p class="text-sm md:text-xs text-gray-900 bg-gray-200 rounded-xl py-1 px-2">Member</p>
                            <div class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full items-center dark:bg-gray-400"></div>
                            <p class="text-sm md:text-xs text-gray-700 dark:text-white">December 12, 2022</p>
                        </div>
                        <p class="text-sm text-[#7E7EAA] leading-6">Lorem ipsum dolor sit amet, consectetur dolorili
                            adipiscing elit. Felis donec massa aliqua.</p>
                        <div class="flex items-center mt-4">
                            <div>
                                <svg width="16" height="16" viewBox="0 0 32 32" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                    <g id="Page-1" stroke="#9a9a9a" stroke-width="1" fill="none"
                                        fill-rule="evenodd" sketch:type="MSPage">
                                        <g id="Icon-Set" sketch:type="MSLayerGroup"
                                            transform="translate(-360.000000, -255.000000)" fill="#9a9a9a">
                                            <path
                                                d="M390,277 C390,278.463 388.473,280 387,280 L379,280 L376,284 L373,280 L365,280 C363.527,280 362,278.463 362,277 L362,260 C362,258.537 363.527,257 365,257 L387,257 C388.473,257 390,258.537 390,260 L390,277 L390,277 Z M386.667,255 L365.333,255 C362.388,255 360,257.371 360,260.297 L360,277.187 C360,280.111 362.055,282 365,282 L371.639,282 L376,287.001 L380.361,282 L387,282 C389.945,282 392,280.111 392,277.187 L392,260.297 C392,257.371 389.612,255 386.667,255 L386.667,255 Z"
                                                id="comment-5" sketch:type="MSShapeGroup">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="text-sm md:text-xs text-gray-900 pl-2">13</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

@push('after-style')
    <style>
        .jumbotron-carousel.owl-theme .owl-nav .owl-prev {
            position: absolute;
            left: 20px;
            top: 40%;
            z-index: 20;
        }

        .jumbotron-carousel.owl-theme .owl-nav .owl-next {
            position: absolute;
            right: 20px;
            top: 40%;
            z-index: 20;
        }

        .jumbotron-carousel.owl-theme .owl-nav .owl-next span,
        .jumbotron-carousel.owl-theme .owl-nav .owl-prev span {
            font-size: 50px;
            color: white;
        }

        .course-carousel.owl-theme .owl-nav .owl-prev,
        .testimonial-carousel.owl-theme .owl-nav .owl-prev,
        .top10-carousel.owl-theme .owl-nav .owl-prev {
            position: absolute;
            left: -50px;
            top: 40%;
            z-index: 20;
        }

        .course-carousel.owl-theme .owl-nav .owl-next,
        .testimonial-carousel.owl-theme .owl-nav .owl-next,
        .top10-carousel.owl-theme .owl-nav .owl-next {
            position: absolute;
            right: -50px;
            top: 40%;
            z-index: 20;
        }

        .course-carousel.owl-theme .owl-nav .owl-next span,
        .course-carousel.owl-theme .owl-nav .owl-prev span,
        .testimonial-carousel.owl-theme .owl-nav .owl-next span,
        .testimonial-carousel.owl-theme .owl-nav .owl-prev span,
        .top10-carousel.owl-theme .owl-nav .owl-next span,
        .top10-carousel.owl-theme .owl-nav .owl-prev span {
            background-color: #FFFFFF;
            border-radius: 100%;
            font-size: 30px;
            padding: 0px 16px 6px 18px;
            color: #000000;
            /* box-shadow: 8px 8px 16px 0px #85858540; */
        }

        .course-carousel.owl-theme .owl-nav .owl-next span:hover,
        .course-carousel.owl-theme .owl-nav .owl-prev span:hover,
        .testimonial-carousel.owl-theme .owl-nav .owl-next span:hover,
        .testimonial-carousel.owl-theme .owl-nav .owl-prev span:hover,
        .top10-carousel.owl-theme .owl-nav .owl-next span:hover,
        .top10-carousel.owl-theme .owl-nav .owl-prev span:hover {
            background-image: linear-gradient(#7F56D9, #CBC2FF);
            border-radius: 100%;
            color: #FFFFFF;
        }

        .course-carousel.owl-theme .owl-nav .owl-prev:hover,
        .course-carousel.owl-theme .owl-nav .owl-next:hover,
        .testimonial-carousel.owl-theme .owl-nav .owl-prev:hover,
        .testimonial-carousel.owl-theme .owl-nav .owl-next:hover,
        .activelessons-carousel.owl-theme .owl-nav .owl-prev:hover,
        .activelessons-carousel.owl-theme .owl-nav .owl-next:hover,
        .top10-carousel.owl-theme .owl-nav .owl-prev:hover,
        .top10-carousel.owl-theme .owl-nav .owl-next:hover {
            background: transparent;
        }

        .course-carousel.owl-theme .owl-dots .owl-dot.active span,
        .course-carousel.owl-theme .owl-dots .owl-dot:hover span,
        .testimonial-carousel.owl-theme .owl-dots .owl-dot.active span,
        .testimonial-carousel.owl-theme .owl-dots .owl-dot:hover span,
        .activelessons-carousel.owl-theme .owl-dots .owl-dot.active span,
        .activelessons-carousel.owl-theme .owl-dots .owl-dot:hover span,
        .top10-carousel.owl-theme .owl-dots .owl-dot.active span,
        .top10-carousel.owl-theme .owl-dots .owl-dot:hover span {
            background: #7F56D9;
        }

        .activelessons-carousel.owl-theme .owl-nav .owl-prev {
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: 20;
        }

        .activelessons-carousel.owl-theme .owl-nav .owl-next {
            position: absolute;
            left: 40px;
            bottom: 0;
            z-index: 20;
        }

        .activelessons-carousel.owl-theme .owl-nav .owl-prev span,
        .activelessons-carousel.owl-theme .owl-nav .owl-next span {
            background-color: #FFFFFF;
            border-radius: 12px;
            font-size: 24px;
            font-weight: 500;
            padding: 0px 14px 8px 14px;
            color: #7F56D9;
        }

        @media(max-width: 640px) {
            .jumbotron-carousel.owl-theme .owl-nav .owl-prev {
                position: absolute;
                left: 10px;
                top: 40%;
                z-index: 20;
            }

            .jumbotron-carousel.owl-theme .owl-nav .owl-next {
                position: absolute;
                right: 10px;
                top: 40%;
                z-index: 20;
            }
        }
    </style>
@endpush

@push('after-script')
    <script>
        $(document).ready(function() {
            $(".jumbotron-carousel").owlCarousel({
                loop: false,
                nav: true,
                autoplay: true,
                dots: false,
                items: 1,
                margin: 0,
            });
            $(".activelessons-carousel").owlCarousel({
                loop: false,
                autoplay: false,
                dots: true,
                responsive: {
                    0: {
                        nav: false,
                        items: 1,
                        slideBy: 1,
                        dotsEach: 1,
                        margin: 10,
                        center: true,
                    },
                    600: {
                        nav: false,
                        items: 3,
                        slideBy: 3,
                        dotsEach: 3,
                        margin: 0,
                    },
                    1200: {
                        nav: true,
                        items: 3,
                        slideBy: 1,
                        dotsEach: 1,
                        margin: 0,
                        autoWidth: true,
                    }
                }
            });
            $(".course-carousel").owlCarousel({
                loop: true,
                autoplay: false,
                dots: true,
                responsive: {
                    0: {
                        nav: false,
                        items: 1,
                        slideBy: 1,
                        dotsEach: 1,
                        margin: 10,
                        center: true,
                    },
                    600: {
                        nav: false,
                        items: 3,
                        slideBy: 3,
                        dotsEach: 3,
                        margin: 0,
                    },
                    1200: {
                        nav: true,
                        items: 4,
                        slideBy: 4,
                        dotsEach: 4,
                        margin: 0,
                    }
                }
            });
            $(".top10-carousel").owlCarousel({
                loop: true,
                autoplay: false,
                dots: true,
                responsive: {
                    0: {
                        nav: false,
                        items: 1,
                        slideBy: 1,
                        dotsEach: 1,
                        margin: 10,
                        center: true,
                    },
                    600: {
                        nav: false,
                        items: 3,
                        slideBy: 3,
                        dotsEach: 3,
                        margin: 0,
                    },
                    1200: {
                        nav: true,
                        items: 4,
                        slideBy: 4,
                        dotsEach: 4,
                        margin: 0,
                    }
                }
            });
            $(".testimonial-carousel").owlCarousel({
                loop: true,
                autoplay: false,
                dots: true,
                margin: 0,
                responsive: {
                    0: {
                        nav: false,
                        items: 1,
                        slideBy: 1,
                        dotsEach: 1,
                        margin: 10,
                        center: true,
                    },
                    600: {
                        nav: false,
                        items: 2,
                        slideBy: 2,
                        dotsEach: 2,
                        margin: 10,
                    },
                    1000: {
                        nav: true,
                        items: 3,
                        slideBy: 3,
                        dotsEach: 3,
                    }
                }
            });
        });
    </script>
@endpush
