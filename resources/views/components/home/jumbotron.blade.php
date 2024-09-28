<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
        <div class="flex flex-col justify-center">
            <p class="text-gray-600 text-lg">Website Resmi</p>
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Pemerintahan Desa Purwareja</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Bersatu Untuk Purwareja
                Maju</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Telusuri Konten
                    <svg class="w-3.5 h-3.5 ms-2 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

                {{-- <a href="#"
                    class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Learn more
                </a> --}}
            </div>
        </div>
        <div>
            <div id="indicators-carousel" class="relative w-full z-0" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <video class="absolute block w-full h-full object-cover" controls>
                            <source src="/videos/vid-purwareja.mp4" type="video/mp4" alt="Purwareja video">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/images/bg-laptop.jpg" class="absolute block w-full h-full object-cover"
                            alt="hero images">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/images/bg-hero.jpg" class="absolute block w-full h-full object-cover"
                            alt="hero images">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/images/bg-hero.jpg" class="absolute block w-full h-full object-cover"
                            alt="hero images">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/images/bg-hero.jpg" class="absolute block w-full h-full object-cover"
                            alt="hero images">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-10 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                        aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                        aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-1/2 left-0 z-30 flex items-center justify-center w-10 h-10 -translate-y-1/2 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-1/2 right-0 z-30 flex items-center justify-center w-10 h-10 -translate-y-1/2 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>


        </div>
    </div>
</section>