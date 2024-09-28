<x-dashboard.layout>

    <div class="pt-4 pb-16 lg:pt-6 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="w-full flex justify-center">
            <article
                class="w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-2 lg:text-4xl dark:text-white">
                        {{ $post->title }}
                    </h1>
                    <p class="text-xs mb-2">{{ $post->created_at->format('j F Y') }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex justify-between items-center">
                            <a href="/dashboard/posts"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm text-center px-2 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 h-9"><i
                                    data-feather="arrow-left" class="mr-1 w-4 h-4 inline"></i>
                                Back to all my post
                            </a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm text-center px-2 py-2 me-2 mb-2 dark:focus:ring-yellow-900 h-9"><i
                                    data-feather="edit" class="mr-1 w-4 h-4 inline"></i>
                                Edit
                            </a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                                @method('delete')
                                @csrf
                                <button
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm text-center px-2 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 h-9"
                                    onclick="return confirm('Are you sure?')">
                                    <i data-feather="delete" class="mr-1 w-4 h-4 inline"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                        <a href="/posts?category={{ $post->category->slug }}"
                            class="rounded-full bg-{{ $post->category->color }}-200 p-2.5 h-9 text-center font-medium text-gray-800 z-0 text-xs hover:border-gray-600 hover:border-solid hover:border-2">
                            {{ $post->category->name }}
                        </a>
                    </div>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="h-64 min-w-full object-cover mt-3">
                    @endif
                </header>
                <p class="text-base text-gray-600">{!! $post->body !!}</p>
            </article>
        </div>
    </div>

</x-dashboard.layout>
