<x-dashboard.layout>

    <h1 class="text-2xl border-b-2 mb-8">Edit Post</h1>

    <form class="max-w-3xl" method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-5">
            <div class="mb-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title" autofocus value="{{ old('title', $post->title) }}"
                    class="@error('title')
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror _primary-input"
                    placeholder="Post title">
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- slug --}}
            <div class="mb-2">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}"
                    class="@error('slug')
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror _primary-input"
                    placeholder="Post slug">
                @error('slug')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- category --}}
            <div class="mb-2">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category" name="category_id" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Choose post category</option>
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- image --}}
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Post
                image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview h-auto max-w-md rounded-lg mb-3" alt="Gambar Utama Artikel">
                @else
                    <img class="img-preview h-auto max-w-md rounded-lg mb-3">
                @endif
            <input
                class="@error('image')
                    block w-full text-sm text-red-700 border border-red-500 rounded-lg cursor-pointer bg-red-50 dark:text-red-500 focus:outline-none dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400
                @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="image" type="file" name="image" onchange="previewImage()">
            <p class="@error('image')
                text-xs text-red-700 dark:text-red-300
            @enderror text-xs text-gray-800 dark:text-gray-300"
                id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                1mb / 1024kb).</p>
            @error('image')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror

            {{-- body --}}
            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                @error('body')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
            </button>
    </form>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

</x-dashboard.layout>
