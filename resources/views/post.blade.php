<x-home.layout>
    <div class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-2 lg:text-4xl dark:text-white">
                        {{ $post->title }}
                    </h1>
                    <p class="text-xs mb-2">{{ $post->created_at->format('j F Y') }}</p>
                    <div class="flex justify-between items-center">
                        <a href="/posts"
                            class="rounded-lg bg-green-400 p-2 font-medium text-gray-800 z-0 text-xs hover:bg-green-300">&laquo;
                            Kembali
                        </a>
                        <a href="/posts?category={{ $post->category->slug }}"
                            class="rounded-full bg-{{ $post->category->color }}-200 p-2 font-medium text-gray-800 z-0 text-xs hover:border-gray-600 hover:border-solid hover:border-2">
                            {{-- hover:bg-{{ $post->category->color }}-600 --}}
                            {{ $post->category->name }}
                        </a>
                    </div>
                    {{-- <img src="/images/bg-batik.jpg" alt="Post Image" class="h-64 min-w-full object-cover mt-3"> --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="h-64 min-w-full object-cover mt-3">
                        {{-- @else --}}
                        {{-- <img src="/images/bg-batik.jpg" alt="Post Image" class="h-64 min-w-full object-cover mt-3"> --}}
                    @endif
                </header>
                <p class="text-base">{!! $post->body !!}</p>
                {{-- <p class="text-base">{{ $post->body }}</p> --}}
            </article>
        </div>
    </div>


</x-home.layout>
