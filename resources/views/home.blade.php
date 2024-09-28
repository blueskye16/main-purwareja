<x-home.layout>
    {{-- Jumbotron --}}

    <x-home.jumbotron></x-home.jumbotron>

    <main>
        {{-- featured articles --}}
        <section class="max-w-full">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h1 class="text-[2em] md:text-4xl font-semibold text-center border-t-2 border-gray-200 mt-6 py-7">Konten
                    Unggulan
                </h1>
            </div>
            {{-- <x-home.featured-articles></x-home.featured-articles> --}}
            <x-home.featured_articles :posts="$posts"></x-home.featured_articles>

        </section>


        <div class="mx-auto max-w-7xl px-6 my-10 lg:px-8">
            <h1 class="text-[2em] md:text-4xl font-semibold border-t-2 border-gray-200 text-center pt-5">
                {{ $title }}</h1>
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:mt-6 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                @forelse ($posts as $post)
                    <article class="flex max-w-2xl flex-col items-start justify-between bg-gray-300 rounded-lg p-5">
                        <div class="flex items-center justify-between gap-x-4 text-xs w-full">
                            <a href="/posts?category={{ $post->category->slug }}"
                                class="relative rounded-full bg-{{ $post->category->color }}-200 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 z-0">{{ $post->category->name }}</a>
                            <time datetime="2020-03-16"
                                class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="/posts/{{ $post->slug }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                {{ Str::limit($post->body, 100) }}</p>
                        </div>
                        <a href="/posts/{{ $post->slug }}"
                            class="mt-5 text-blue-500 hover:text-blue-700 hover:scale-110 hover:ease-linear">
                            <p>Read More &raquo;</p>
                        </a>
                    </article>

                @empty
                    <div>
                        <p class="font-semibold text-xl my-4">Artikel tidak ditemukan</p>
                        <p><a href="/posts" class=" text-blue-600 hover:text-blue-800 hover:underline">&laquo;
                                Kembali</a></p>
                    </div>
                @endforelse

            </div>
        </div>

        {{ $posts->links() }}


        {{-- Footer --}}
        <x-home.footer></x-home.footer>
    </main>
</x-home.layout>
