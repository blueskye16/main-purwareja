<?php
$dropdownRoutes = ['dashboard'];
?>

<x-dashboard.layout>
    <h1 class="m-2 text-3xl font-semibold">Kelola Navigasi</h1>


    <nav class="sticky top-0 bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 z-10">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/images/logo-purwareja.png" class="h-8" alt="Logo Purwareja" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Desa
                    Purwareja</span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li
                        class="group relative inline-flex group border-dotted border-2 border-gray-700 w-20 h-8 cursor-pointer">
                        <div class="absolute inline-flex -top-2 -end-2 w-6 h-6"><i data-feather="plus"
                                class="bg-blue-700 group-hover:bg-blue-900 text-white p-0.5 text-xs font-bold rounded-full"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul
            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <x-home.nav-link href="/" :active="request()->is('/')">Beranda</x-home.nav-link>
            </li>

            <li class="group relative inline-flex group border-dotted border-2 border-gray-700 w-20 cursor-pointer">
                <div class="absolute inline-flex -top-2 -end-2 w-6 h-6"><i data-feather="plus"
                        class="bg-blue-700 group-hover:bg-blue-900 text-white p-0.5 text-xs font-bold rounded-full"></i>
                </div>
            </li>

            <li>
                <x-home.nav-link href="/posts" :active="request()->is('posts')">Artikel</x-home.nav-link>
            </li>
            <li>
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Data
                    Desa</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Informasi</a>
            </li>
        </ul>
    </div>


</x-dashboard.layout>
