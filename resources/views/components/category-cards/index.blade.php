<div class="max-w-screen-xl mx-auto my-3 lg:my-10 px-4 xl:px-12">
    <h1 class="mb-0 md:md:mb-1 text-2xl md:text-3xl font-extrabold">
        {{ $category->name }}
    </h1>
    <div class="md:flex md:justify-between items-center mb-2 md:mb-6">
        <h3 class="text-sm md:text-md text-gray-400 mb-2 sm:mb-0">
            {{ $category->description }}
        </h3>
        {{-- <a class="text-[#7F56D9] flex items-center justify-end" href=""><span class="underline mr-1">View
                All</span><span class="material-icons">north_east</span></a> --}}
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
        <?php
        $courses = $category->courses;
        ?>
        @each('components.cards.live', $courses, 'course')
    </div>
</div>
