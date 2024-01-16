@foreach ($courses as $course)
    <?php
    $course->loadCount('reviews');
    $course->loadSum('reviews', 'rating');
    $sum = $course->reviews_sum_rating;
    $total = $course->reviews_count;
    $rating = 0;
    $rating = 0;
    $total_rating_to_star = 5;
    $rating_to_star = $rating * $total_rating_to_star;
    $rating_to_not_a_star = $total_rating_to_star - $rating_to_star;
    
    if ($total > 0 && $sum > 0) {
        $rating = $sum / $total;
        $rating = round($rating, 1);
        $total_rating_to_star = 5;
        $rating_to_star = $rating * $total_rating_to_star;
        $rating_to_not_a_star = $total_rating_to_star - $rating_to_star;
    }
    
    ?>
    <div class="bg-white shadow-lg rounded-lg md:mx-2 my-4" data-aos="fade-up">
        @if ($course->jenis == 'online')
            <a href="{{ route('detail-course', $course->slug) }}">
                <img class="rounded-t-lg" src="{{ asset('assets/web/images/course/course-1.jpg') }}" alt="" />
            </a>
        @endif
        @if ($course->jenis == 'live')
            <a href="{{ route('detail-webinar', $course->slug) }}">
                <img class="rounded-t-lg" src="{{ asset('assets/web/images/course/course-1.jpg') }}" alt="" />
            </a>
        @endif
        <div class="p-4">
            <div class="flex items-center space-x-5 mb-4">
                @if ($course->jenis == 'online')
                    <div class="flex items-center">
                        <div>
                            <img src="{{ asset('assets/web/icons/ic-play.png') }}" class="w-5 h-5" alt="">
                        </div>
                        <h5 class="text-sm md:text-xs pl-2">13x Lessons</h5>
                    </div>
                @endif
                <div class="flex items-center">
                    <div class="flex items-center">
                        <div><img src="{{ asset('assets/web/icons/ic-student.png') }}" class="w-4 h-4" alt="">
                        </div>
                        <h5 class="text-sm md:text-xs pl-2">{{ $course->enrollments()->count() }}</h5>
                    </div>
                </div>
            </div>
            @if ($course->jenis == 'live')
                <a class="mb-2 text-lg md:text-base font-bold text-gray-900 dark:text-white"
                    href="{{ route('detail-webinar', $course->slug) }}">
                    {{ $course->name }}
                </a>
            @elseif($course->jenis == 'online')
                <a class="mb-2 text-lg md:text-base font-bold text-gray-900 dark:text-white"
                    href="{{ route('detail-course', $course->slug) }}">
                    {{ $course->name }}
                </a>
            @endif
            </a>
            <h3 class="mb-3 text-lg md:text-base font-normal text-gray-500 dark:text-white">
                Rp {{ number_format($course->price, 0, ',', '.') }}
            </h3>
            <div class="flex items-center mb-4">
                <div class="flex flex-wrap items-center">
                    @for ($i = 0; $i < $rating_to_star; $i++)
                        <svg class="w-5 h-5 md:w-3 md:h-3 text-[#FF6905] me-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @endfor
                    @for ($i = 0; $i < $rating_to_not_a_star; $i++)
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @endfor
                </div>
                <h5 class="ms-2 text-sm md:text-xs text-gray-900 dark:text-white">{{ $rating_to_star }}</h5>
                <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full items-center dark:bg-gray-400"></span>
                <h5 class="text-sm md:text-xs text-gray-900 dark:text-white">({{ $total }})</h5>
            </div>
            @if ($course->jenis == 'online')
                <a href="{{ route('detail-course', $course->slug) }}"
                    class="w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 text-center py-3 inline-flex justify-center items-center">
                    Start Course <span class="material-icons !text-lg md:text-base">chevron_right</span>
                </a>
            @endif
            @if ($course->jenis == 'live')
                <a href="{{ route('detail-webinar', $course->slug) }}"
                    class="w-full bg-[#F8F4FF] text-sm md:text-xs text-gray-700 text-center py-3 inline-flex justify-center items-center">
                    Start Course <span class="material-icons !text-lg md:text-base">chevron_right</span>
                </a>
            @endif

        </div>
    </div>
@endforeach
