@props(['activeItem' => $activeItem])
<div>
    <nav class="bg-slate-50 first-letter border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-triangle-173-433424.png" class="mr-3 h-6 sm:h-16 bg-gray-300 rounded-full pt-1 px-0.5" alt="EPU Social">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">EPU Social</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-slate-50 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ">
                    <li>
                        <a onclick="Turbo.clearCache()"  href="{{ route('home') }}"
                            class="block py-2 pr-4 pl-3 text-black  rounded md:bg-transparent md:p-0  @if($activeItem == 1) dark:text-white md:text-blue-700  bg-blue-700 @else dark:text-gray-400  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @endif"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a onclick="Turbo.clearCache()" href="{{ route('dashboard') }}"
                            class="block py-2 pr-4 pl-3 text-black  rounded md:bg-transparent md:p-0  @if($activeItem == 2) dark:text-white md:text-blue-700  bg-blue-700 @else dark:text-gray-400  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @endif">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a onclick="Turbo.clearCache()" href="{{ route('posts') }}"
                            class="block py-2 pr-4 pl-3 text-black  rounded md:bg-transparent md:p-0  @if($activeItem == 3) dark:text-white md:text-blue-700  bg-blue-700 @else dark:text-gray-400  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @endif">
                            Posts
                        </a>
                    </li>
                    @auth
                        <li>
                            <a onclick="Turbo.clearCache()" href="{{ route('users') }}"
                                class="block py-2 pr-4 pl-3 text-black  rounded md:bg-transparent md:p-0  @if($activeItem == 4) dark:text-white md:text-blue-700  bg-blue-700 @else dark:text-gray-400  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @endif">
                                Conversations
                            </a>
                        </li>
                        <li>
                            <a onclick="Turbo.clearCache()" href="{{ route('chat') }}"
                                class="block py-2 pr-4 pl-3 text-black  rounded md:bg-transparent md:p-0  @if($activeItem == 5) dark:text-white md:text-blue-700  bg-blue-700 @else dark:text-gray-400  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent @endif">
                                Chats
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                            class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-red-300 dark:hover:bg-gray-700 dark:hover:text-red-300 md:dark:hover:bg-transparent">
                            Logout
                            </a>
                        </li>
                    @endauth
                    @guest
                    <li>
                        <a href="{{ route('login') }}"
                        class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        SignIn
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                        class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Register
                        </a>
                    </li>
                    @endguest
                    <li class="ml-1 p-2 md:ml-0 md:p-0">
                        <button x-init="document.getElementById('theme-toggle').addEventListener('click', function () {

                            // toggle icons inside button
                            document.getElementById('theme-toggle-dark-icon').classList.toggle('hidden');
                            document.getElementById('theme-toggle-light-icon').classList.toggle('hidden');

                            // if set via local storage previously
                            if (localStorage.getItem('color-theme')) {
                                if (localStorage.getItem('color-theme') === 'light') {
                                    document.documentElement.classList.add('dark');
                                    localStorage.setItem('color-theme', 'dark');
                                } else {
                                    document.documentElement.classList.remove('dark');
                                    localStorage.setItem('color-theme', 'light');
                                }

                            // if NOT set via local storage previously
                            } else {
                                if (document.documentElement.classList.contains('dark')) {
                                    document.documentElement.classList.remove('dark');
                                    localStorage.setItem('color-theme', 'light');
                                } else {
                                    document.documentElement.classList.add('dark');
                                    localStorage.setItem('color-theme', 'dark');
                                }
                            }

                        });" id="theme-toggle" type="button" class="justify-self-center text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm ">
                            <svg id="theme-toggle-dark-icon" class="hidden w-7 h-7 fill-cyan-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-7 h-7 fill-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        </script>

</div>


