<x-dashboard.layout>
    {{-- <x-slot name='title'></x-slot> --}}

    <h1 class="m-2 text-2xl">Manage Admins</h1>

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

    {{-- <a href="/dashboard/users/create" class="v-btn-primary">Add User
    </a> --}}
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Add Admin
    </button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="text-center py-3">
                        No
                    </th>
                    <th scope="col" class="text-center py-3">
                        Name
                    </th>
                    <th scope="col" class="text-center py-3">
                        Email
                    </th>
                    <th scope="col" class="text-center py-3">
                        Role
                    </th>
                    <th scope="col" class="text-center py-3">
                        Password
                    </th>
                    <th scope="col" class="text-center py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 text-start font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($user->is_admin == '1')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 p-2 rounded dark:bg-yellow-900 dark:text-yellow-300 text-wrap inline-block">Super
                                    Admin</span>
                            @else
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Admin</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-center">
                            <button type="button"
                                class="py-2.5 px-4 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Reset</button>
                        </td>
                        <td class="px-6 py-4 flex justify-center">
                            <a href="/dashboard/users/{{ $user->id }}/edit"
                                class="bg-yellow-400 p-1 m-1 rounded-md text-white hover:bg-yellow-500">
                                <i data-feather="edit" class="">
                                </i>
                            </a>
                            <form action="/dashboard/users/{{ $user->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 p-1 m-1 rounded-md text-white hover:bg-red-700"
                                    onclick="return confirm('Are you sure?')">
                                    <i data-feather="trash-2" class=""></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add New Admin
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="/dashboard/users">
                    @csrf

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        {{-- name --}}
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" autofocus
                                class="@error('name')
                                    bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
                                @enderror _primary-input"
                                placeholder="Type user name" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        {{-- email --}}
                        <div class="col-span-2">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email"
                                class="@error('email')
                                    bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
                                @enderror _primary-input"
                                placeholder="Type admin email" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        {{-- password --}}
                        {{-- <div class="col-span-2">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type admin password" required>
                                <button type="button" class="absolute right-3 top-3"
                                    onclick="window.mixin.togglePasswordVisibility()">
                                    <i data-feather="eye-off" id="eye-icon" class="text-gray-600"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div> --}}

                        {{-- flowbite password --}}
                        <div class="col-span-2">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label>
                            <input data-popover-target="popover-password" data-popover-placement="bottom"
                                type="password" id="password" class="_primary-input" required />
                            <div data-popover id="popover-password" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Must have at least 6
                                        characters</h3>
                                    <div class="grid grid-cols-4 gap-2">
                                        <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                        <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                        <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                        <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                    </div>
                                    <p>It's better to have:</p>
                                    <ul>
                                        <li class="flex items-center mb-1">
                                            <i data-feather="x-circle" id="checkPassUpperLower"
                                                class="text-gray-300 mr-1 w-5"></i>
                                            Upper & lower case letters
                                        </li>
                                        <li class="flex items-center mb-1">
                                            <i data-feather="x-circle" id="checkPassSymbol"
                                                class="text-gray-300 mr-1 w-5"></i>
                                            A symbol (#$&)
                                        </li>
                                        <li class="flex items-center">
                                            <i data-feather="x-circle" id="checkPassAmount"
                                                class="text-gray-300 mr-1 w-5"></i>
                                            A longer password (min. 12 chars.)
                                        </li>
                                    </ul>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>

                        {{-- retype password --}}
                        <div class="col-span-2">
                            <label for="retype-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                Password</label>
                            <div class="relative">
                                <input type="password" name="retype-password" id="retypePassword"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Retype admin password" required>
                                <button type="button" class="absolute right-3 top-3"
                                    onclick="window.mixin.toggleRetypePasswordVisibility()">
                                    <i data-feather="eye-off" id="eye-icon" class="text-gray-600"></i>
                                </button>
                            </div>
                        </div>
                        {{-- role --}}
                        <div class="col-span-2 ">
                            <p>Choose role for admin</p>
                            <div class="flex">
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-[50%] m-2 ml-0">
                                    <input id="role_1" type="radio" value="1" name="is_admin"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="role_1"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Super
                                        Admin</label>
                                </div>
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-[50%] m-2 mr-0">
                                    <input id="role_0" type="radio" value="0" name="is_admin"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="role_2"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const checkPassUpperLower = document.getElementById("checkPassUpperLower");
        const checkPassSymbol = document.getElementById("checkPassSymbol");
        const checkPassAmount = document.getElementById("checkPassAmount");
        const password = document.getElementById("password");

        if (password) {
            password.addEventListener("input", function() {
                const passwordValue = password.value;

                if (/[A-Z]/.test(passwordValue) && /[a-z]/.test(passwordValue)) {
                    checkPassUpperLower.setAttribute("data-feather", "check-circle");
                    checkPassUpperLower.classList.add("text-green-300");
                }
                if (/[!@#$%^&*()]/.test(passwordValue)) {
                    checkPassSymbol.setAttribute("data-feather", "check-circle");
                    checkPassSymbol.classList.add("text-green-300");
                }
                if (passwordValue.length >= 12) {
                    checkPassAmount.setAttribute("data-feather", "check-circle");
                    checkPassAmount.classList.add("text-green-300");
                }
            });
        }
    </script>

</x-dashboard.layout>
