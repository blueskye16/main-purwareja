<x-dashboard.layout>

    <h1 class="text-2xl border-b-2 mb-8">Create New Post</h1>

    <form class="max-w-3xl" method="POST" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <div class="mb-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title" autofocus
                    class="@error('title')
                        bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
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
                <input type="text" id="slug" name="slug"
                    class="@error('slug')
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Post slug">
                @error('slug')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-2">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category" name="category_id" required
                    class="@error('category_id')
                        bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500
                    @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Choose post category</option>
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @endif
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- image --}}
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Post
                image</label>
            <img class="img-preview h-auto max-w-md rounded-lg mb-3">
            <input
                class="@error('image')
                    block w-full text-sm text-red-700 border border-red-500 rounded-lg cursor-pointer bg-red-50 dark:text-red-500 focus:outline-none dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400
                @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="image" type="file" name="image"
                onchange="previewImage()">
            <p class="@error('image')
                text-xs text-red-700 dark:text-red-300
            @enderror text-xs text-gray-800 dark:text-gray-300"
                id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                5mb / 5000kb).</p>
            @error('image')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror

            {{-- body --}}
            <div class="mb-5 mt-2">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                @error('body')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    <script>
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // // automate slug
        // title.addEventListener('change', function() {
        //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //         .then(response => response.json())
        //         .then(data => slug.value = data.slug)
        //         .catch(error => console.error('Error:', error));
        // });

        // document.addEventListener('trix-file-accept', function(e) {
        //     e.preventDefault();
        // });

        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => {
                    // Check for valid JSON response
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => slug.value = data.slug)
                .catch(error => console.error('Error:', error));
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
