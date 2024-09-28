<aside
    class="fixed top-0 left-0 z-0 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <form action="#" method="GET" class="md:hidden mb-2">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg>
                </div>
                <input type="text" name="search" id="sidebar-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search" />
            </div>
        </form>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ Request::is('dashboard') ? 'bg-blue-400' : '' }}">
                    <i data-feather="user"></i>
                    <span class="ml-3">Dashboard Admin</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/posts"
                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ Request::is('dashboard/posts*') ? 'bg-blue-400' : '' }}">
                    <i data-feather="file-text"></i>
                    <span class="ml-3">Artikel</span>
                </a>
            </li>

        </ul>
        @can('admin')
            <h6 class="flex justify-center px-3 mt-4 mb-1 border-t border-solid border-gray-200 dark:border-gray-700">
                <span class="pt-2">Administrator</span>
            </h6>
            <ul>
                <li>
                    <a href="/dashboard/users"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ Request::is('dashboard/users*') ? 'bg-blue-400' : '' }}">
                        <i data-feather="users"></i>
                        <span class="ml-3">Kelola Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/navigasi"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ Request::is('dashboard/navigation*') ? 'bg-blue-400' : '' }}">
                        <i data-feather="navigation-2"></i>
                        <span class="ml-3">Kelola Navigasi</span>
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700 {{ Request::is('dashboard/manage-posts*') ? 'bg-blue-400' : 'hover:bg-gray-100' }}"
                        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Kelola Artikel</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/dashboard/manage-posts/featured"
                                class="flex items-center p-2 ml-11 text-sm font-medium text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700 {{ Request::is('dashboard/manage-posts/featured*') ? 'bg-blue-400 hover:bg-blue-600' : 'hover:bg-gray-200' }}"><i
                                    data-feather="award" class="mr-2"></i>Sematkan Artikel</a>
                        </li>
                        <li>
                            <a href="/dashboard/manage-posts/categories"
                                class="flex items-center p-2 ml-11 text-sm font-medium text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700 {{ Request::is('dashboard/manage-posts/categories*') ? 'bg-blue-400 hover:bg-blue-600' : 'hover:bg-gray-200' }}"><i
                                    data-feather="folder" class="mr-2"></i>Kategori Artikel</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endcan
    </div>
</aside>

<script>
    // Get the dropdown element
    const dropdown = document.getElementById('dropdown-pages');

    // Get all sub-section links
    const links = document.querySelectorAll('#dropdown-pages li a');

    // Add an event listener to each link
    links.forEach((link) => {
        link.addEventListener('click', () => {
            // Remove the hidden class from the dropdown
            dropdown.classList.remove('hidden');
        });
    });

    // Check on page load if the current URL matches any sub-section link
    document.addEventListener('DOMContentLoaded', () => {
        const currentUrl = window.location.href;
        links.forEach((link) => {
            if (currentUrl.includes(link.href)) {
                dropdown.classList.remove('hidden');
            }
        });
    });
</script>
