<x-dashboard.layout>
    <h1 class="text-2xl border-b-2 mb-5">Edit User</h1>

    <div class="mb-2">
        <button data-popover-target="popover-click" data-popover-trigger="click" data-popover-placement="bottom-start"
            type="button" class="text-yellow-200 flex">
            <i data-feather="info" class="w-4 mr-2 font-bold"></i>
            <span class="sr-only">Show information</span>
            Please read this before editing</button>
    </div>

    <div data-popover id="popover-click" role="tooltip"
        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-500 rounded-lg shadow-sm opacity-0 w-80 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
        <div class="p-3 space-y-2">
            <h3 class="font-semibold text-gray-900 dark:text-white">Rules Editing Admin</h3>
            <ul class="list-disc pl-2">
                <li>Here you can see and change the content Admin have.</li>
                <li>You can change all or just a few part of the content.</li>
                <li>A little note for <strong>password</strong>, you can only change it not see the content that admin
                    have.</li>
            </ul>
            {{-- <p>Here you can see and change the content Admin have. You can change all or just a few part of the content. A little note for <strong>password</strong>, you can only change it not see the content that admin have. </p>
            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
            <p>For each date bucket, the all-time volume of activities is calculated. This means that
                activities in period n contain all activities up to period n, plus the activities generated
                by your community in period.</p>
            <a href="#"
                class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg></a> --}}
        </div>
        <div data-popper-arrow></div>
    </div>


    <form action="/dashboard/users/{{ $user->id }}" method="POST" class="max-w-3xl">
        @method('PUT')
        @csrf

        <div class="mb-5">
            <div class="mb-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus
                    class="@error('name')
                        bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
                    @enderror _primary-input">
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- email --}}
            <div class="mb-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="@error('email')
                        bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
                    @enderror _primary-input">
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- password --}}
            <div class="mb-2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Password
                </label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                        class="@error('password')
                    bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
                        @enderror _primary-input"
                        placeholder="Type admin password">
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
            </div>

            {{-- retype password -> 
            bisa dibikin cuma kalo input passwordnya lg ngetik, animation gitu --}}
            <div class="mt-8 retype-password-container opacity-0 translate-y-[-20px] transition duration-300 hidden">
                <label for="retype-password" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Retype
                    Password
                    <span class="ml-auto text-green-600 font-medium flex underline hidden" id="spanRetype">
                        {{-- <i id="spanRetypeIcon" class="w-5 mr-2" data-feather="check-circle"></i> --}}
                        Password match!</span>
                </label>
                <div class="relative">
                    <input type="password" name="retype-password" id="retypePassword"
                        class="@error('retype-password')
                            bg-red-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500
                        @enderror _primary-input"
                        placeholder="Retype admin password">
                    <button type="button" class="absolute right-3 top-3"
                        onclick="window.mixin.toggleRetypePasswordVisibility()">
                        <i data-feather="eye-off" id="eye-icon" class="text-gray-600"></i>
                    </button>
                    @error('retype-password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- role --}}
            <div class="mb-2">
                <p>Choose role for admin</p>
                <div class="flex">
                    <label for="role_1"
                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-[50%] m-2 ml-0 cursor-pointer">
                        <input id="role_1" type="radio" value="1" name="is_admin"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ old('is_admin', $selectedRole) == 1 ? 'checked' : '' }}>
                        {{-- {{ old('is_admin', $selectedRole) == '1' ? 'checked' : '' }} --}}
                        <span class="ml-2">Super Admin</span>
                    </label>
                    <label for="role_0"
                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-[50%] m-2 mr-0 cursor-pointer">
                        <input id="role_0" type="radio" value="0" name="is_admin"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ old('is_admin', $selectedRole) == 0 ? 'checked' : '' }}>
                        <span class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</span>
                    </label>
                </div>
            </div>

        </div>
        <button type="submit" id="btnSubmit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Update
        </button>
    </form>

    <script>
        const passwordInput = document.getElementById("password");
        const retypePasswordInput = document.getElementById("retypePassword");
        const retypePasswordContainer = document.querySelector(".retype-password-container");
        const btnSubmit = document.getElementById("btnSubmit");
        const spanRetype = document.getElementById("spanRetype");
        const spanRetypeIcon = document.getElementById("spanRetypeIcon");

        passwordInput.addEventListener("input", function() {
            retypePasswordContainer.classList.remove("hidden");
            retypePasswordContainer.classList.add("opacity-100", "translate-y-0");
        });

        passwordInput.addEventListener("blur", function() {
            if (passwordInput.value === "") {
                retypePasswordContainer.classList.remove("opacity-100", "translate-y-0");
                retypePasswordContainer.classList.add("hidden");
                retypePasswordContainer.value = "";
            }
        });

        passwordInput.addEventListener('input', () => {
            if (passwordInput.value === '') {
                retypePasswordInput.value = '';
            }
        });

        // if(passwordInput.value !== retypePasswordInput.value) {

        // }
        // masih error kalo semisal dari retype kosong, submitBtn-nya malah uda boleh ngeklik. padahal di paswInput masih ada

        retypePasswordInput.addEventListener('input', () => {
            if (passwordInput.value === retypePasswordInput.value) {
                retypePasswordInput.classList.remove('border-red-500', '_password-not-match-focus');
                retypePasswordInput.classList.add('border-green-500', '_password-match-focus');
                spanRetype.innerText = 'Password match!';
                spanRetype.classList.remove('text-red-600');
                spanRetype.classList.add('text-green-600');
                btnSubmit.classList.remove('bg-gray-500', 'cursor-not-allowed');
                btnSubmit.classList.add('bg-blue-700', 'cursor-pointer', 'hover:bg-blue-800');
                btnSubmit.removeAttribute('disabled');
                // spanRetypeIcon.setAttribute('data-feather', 'check-circle');
            } else if (retypePasswordInput.value == '') {
                retypePasswordInput.classList.remove('border-2', 'border-red-500', '_password-not-match-focus');
            } else {
                retypePasswordInput.classList.add('border-2', 'border-red-500', '_password-not-match-focus');
                spanRetype.classList.remove('hidden', 'text-green-600');
                spanRetype.classList.add('text-red-600');
                spanRetype.innerText = 'Retype your password correctly!';
                btnSubmit.setAttribute('disabled', true);
                btnSubmit.classList.remove('bg-blue-700', 'cursor-pointer', 'hover:bg-blue-800');
                btnSubmit.classList.add('bg-gray-500', 'cursor-not-allowed');
                // spanRetypeIcon.setAttribute("data-feather", "x-circle");
                // spanRetypeIcon.classList.add('text-red-500');
                // spanRetypeIcon.setAttribute('data-feather', 'x-circle');
            }
            // feather.replace();
        })
    </script>
</x-dashboard.layout>
