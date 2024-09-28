<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="{{ asset('js/feather.js') }}"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <title>Dashboard Admin</title>
</head>

<body class="bg-gray-400 dark:bg-gray-900">
    <div class="antialiased">
        <x-home.nav-bar></x-home.nav-bar>

        <x-dashboard.aside></x-dashboard.aside>

        <main class="p-4 md:ml-64 h-auto pt-6">
            {{ $slot }} 
        </main>
    </div>
    {{-- <script src="../node_modules/flowbite/dist/flowbite.min.js"></script> --}}
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
</body>

</html>
