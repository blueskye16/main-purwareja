<x-dashboard.layout>
    {{-- <x-slot name='title'></x-slot> --}}

    <h1 class="m-2 text-3xl font-semibold">Kelola Sematkan Artikel</h1>

    @if (session()->has('success'))
        <div id="alert-1"
            class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif


    @if (session()->has('error'))
        <div id="alert-1"
            class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            {{-- <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg> --}}
            <i data-feather="alert-circle" class="flex-shrink-0 inline w-4 h-4 me-3"></i>
            <span class="sr-only">Alert</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @push('scripts')
        <script>
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
        </script>
    @endpush

    {{-- scale what it is --}}
    <x-home.featured_articles :posts="$posts"></x-home.featured_articles>
    {{-- gimana kalo si component itu diarahin ke satu controller, how? --}}

    <h2 class="py-4 mt-6 border-t-2 border-gray-200 text-[2em] md:text-3xl font-semibold text-center">Pilih Artikel
    </h2>

    <x-home.search-bar action="/dashboard/manage-posts/featured"></x-home.search-bar>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        No
                    </th> --}}
                    <th scope="col" class="px-6 py-3 max-w-xs">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Terakhir Diedit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gambar Utama
                    </th>
                    {{-- bisa nambahin fiture opsi sortirnya, skrg baru descending dari terbaru --}}
                    <th scope="col" class="px-6 py-3">
                        Aksi
                        <i data-popover-target="featuredArticleRule" data-feather="info" class="w-4 h-4 inline-block ml-1 cursor-pointer text-yellow-400 font-semibold"></i>

                        <div data-popover id="featuredArticleRule" role="tooltip"
                            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 normal-case">
                            <div
                                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Aturan</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>Hanya artikel dengan <u>gambar utama</u> yang dapat disematkan.</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->id }}
                        </th>
                        {{-- <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th> --}}
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-normal break-words dark:text-white max-w-xs">
                            {{-- {{ Str::limit($post->title, 45) }} --}}
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->updated_at }}
                        </td>
                        {{-- <td class="px-6 py-4">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Utama Artikel"
                                    class="h-auto max-w-28 rounded-lg">
                            @else
                                <img class="h-auto max-w-28 rounded-lg">
                            @endif
                        </td> --}}

                        <td class="px-6 py-4">
                            @if ($post->image)
                                <button data-modal-target="image-modal" data-modal-toggle="image-modal">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Utama Artikel"
                                        class="h-auto max-w-28 rounded-lg">
                                </button>
                            @else
                                <img class="h-auto max-w-28 rounded-lg">
                                {{-- <i data-feather="x-square" class="text-gray-400 block"></i> --}}
                            @endif
                        </td>

                        <!-- Main modal -->
                        <div id="image-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="image-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                alt="Gambar Utama Artikel" class="h-auto max-w-full rounded-lg">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <td class="px-6 py-4 flex">
                            <form action="{{ $post->is_featured ? route('unpin', $post) : route('pin', $post) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="text-white {{ $post->is_featured ? 'bg-red-700' : 'bg-blue-700' }} hover:bg-{{ $post->is_featured ? 'red-800' : 'blue-800' }} focus:ring-4 focus:ring-{{ $post->is_featured ? 'red-300' : 'blue-300' }} font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-{{ $post->is_featured ? 'red-600' : 'blue-600' }} dark:hover:bg-{{ $post->is_featured ? 'red-700' : 'blue-700' }} focus:outline-none dark:focus:ring-{{ $post->is_featured ? 'red-800' : 'blue-800' }}">
                                    <i data-feather={{ $post->is_featured ? 'minus-circle' : 'plus-circle' }}></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $posts->links() }}

</x-dashboard.layout>
