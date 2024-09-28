{{-- <img src="{{ asset('images/' . $post->image) }}" alt="featured image" class="antialiased" /> --}}
{{-- <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
    {!! Str::limit($featuredPost->body, 100) !!}</p> --}}

<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mx-4 md:mx-8">
    @foreach ($posts as $post)
        @if ($post->is_featured)
            <div id="featuredArticle"
                class="relative flex flex-col rounded-xl bg-white text-gray-700 shadow-md mx-auto lg:mx-0 hover:shadow-lg transition-shadow duration-300 max-w-full">
                <div class="relative overflow-hidden rounded-xl bg-transparent">
                    @if (Request::is('dashboard*'))
                        <form action="{{ url('dashboard/manage-posts/featured/' . $post->slug . '/unpin') }}"
                            {{-- kalo dipakein $post->id jadinya error, cek kenapa (ada yg duplikat sbelah mana?)--}}
                            {{-- next benerin body biar ga ngirim tag html ke postingan --}}
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 absolute left-0 top-0">
                                Hapus
                            </button>
                        </form>
                    @endif
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Featured Image" class="w-full h-48 object-cover"/>
                </div>
                <div class="p-4 sm:p-6 max-h-72">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <a href="#"
                            class="text-xs rounded-full bg-big-stone-800 text-white px-3 py-1.5 font-medium hover:bg-big-stone-950 mb-2 sm:mb-0">{{ $post->category->name }}
                        </a>
                        <h4 class="text-xs font-normal text-blue-gray-900">
                            {{ $post->created_at->format('l, j F Y') }}
                        </h4>
                    </div>
                    <div class="h-8">
                        <p class="mt-4 font-semibold text-lg text-gray-800"><a href="/posts/{{ $post->slug }}" class="hover:text-gray-950 hover:font-bold">{{ Str::words($post->title, 3) }}</a></p>
                        {{-- <p class="mt-4 font-semibold text-lg text-gray-700 hover:text-gray-950"><a href="/posts/{{ $post->slug }}">{{ Str::words($post->title, 3) }}</a></p> --}}
                    </div>
                    <div class="h-32">
                        <p class="text-sm leading-6 text-gray-600">
                            {{ Str::limit($post->body, 150) }}
                        </p>
                    </div>
                    <a href="/posts/{{ $post->slug }}"
                        class="inline-block font-medium py-2.5 text-blue-500 hover:text-blue-800 hover:scale-105 duration-100 transition-transform transform">Read
                        more &raquo;
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>
