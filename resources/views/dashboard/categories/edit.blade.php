<x-dashboard.layout>
    <h1 class="text-2xl border-b-2 mb-8">Edit Category</h1>

    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="max-w-3xl">
        @method('PUT')
        @csrf

        <div class="mb-5">
            <div class="mb-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    Name</label>
                <input type="text" id="create-name" name="name" value="{{ old('name', $category->name) }}" autofocus
                    class="appearance-none block w-full px-3 py-2 border-gray-300 border-2 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:text-gray-700 dark:border-gray-600 dark:focus:ring-blue-400 dark:focus:border-blue-400">
            </div>
            <div class="mb-2">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    Slug</label>
                <input type="text" id="create-slug" name="slug" value="{{ old('slug', $category->slug) }}"
                    class="appearance-none block w-full px-3 py-2 border-gray-300 border-2 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:text-gray-700 dark:border-gray-600 dark:focus:ring-blue-400 dark:focus:border-blue-400">
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
        </button>
    </form>

    <script>
        const createNameInput = document.querySelector('#create-name');
        const createSlugInput = document.querySelector('#create-slug');

        createNameInput.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + createNameInput.value)
                .then(response => response.json())
                .then(data => createSlugInput.value = data.slug)
                .catch(error => console.error('Error:', error));
        });
    </script>
</x-dashboard.layout>
