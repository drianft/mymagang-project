<nav class="bg-zinc-700">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" onclick="this.blur()"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/icon.png') }}" alt="Logo">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{ route('company.dashboard') }}"
                            class="{{ request()->routeIs('company.dashboard') ? 'rounded-md bg-zinc-800 px-3 py-2 text-sm font-medium text-white' : 'font-medium text-gray-300 hover:text-white hover:font-semibold transition duration-150 ease-in-out px-3 py-2 text-sm' }}">Dashboard</a>
                        <a href="{{ route('company.jobs') }}"
                            class="{{ request()->routeIs('company.jobs') ? 'rounded-md bg-zinc-800 px-3 py-2 text-sm font-medium text-white' : 'font-medium text-gray-300 hover:text-white hover:font-semibold transition duration-150 ease-in-out px-3 py-2 text-sm' }}">Company Posts</a>
                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @auth
                    <a href="#"
                        class="inline-block relative rounded-full bg-zinc-700 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-zinc-700 focus:outline-hidden">
                    @endauth
                    @guest
                        <a href="{{ route('warnguest', ['page' => 'bookmark']) }}"
                            class="inline-block relative rounded-full bg-zinc-700 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-zinc-700 focus:outline-hidden">
                        @endguest
                        <span class="absolute -inset-1.5"></span>

                    </a>

                    <!-- Profile dropdown -->
                    @auth
                        <div class="relative ml-3">
                            <div>
                                <button type="button"
                                    class="relative flex rounded-full bg-zinc-700 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-zinc-700 focus:outline-hidden"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="size-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}">
                                </button>
                            </div>

                            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:font-semibold transition duration-150 px-4 py-2 ease-in-out text-sm"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <form method="POST" action="{{ route('logout') }}" id="custom-logout-form">
                                    @csrf
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('custom-logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:font-semibold transition duration-150 px-4 py-2 ease-in-out text-sm"
                                        role="menuitem" tabindex="-1" id="user-menu-item-1">
                                        Sign out
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="relative ml-3">
                            <div>
                                <button type="button"
                                    class="relative flex rounded-full bg-zinc-700 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-zinc-700 focus:outline-hidden"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="size-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </button>
                            </div>

                            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:font-semibold transition duration-150 px-4 py-2 ease-in-out text-sm"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:font-semibold transition duration-150 px-4 py-2 ease-in-out text-sm"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Sign In</a>
                            </div>
                        </div>
                    @endguest
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="{{ route('company.dashboard') }}"
                class="{{ request()->routeIs('company.dashboard') ? 'block rounded-md bg-zinc-800 px-3 py-2 text-base font-semibold text-white' : 'block rounded-md px-3 py-2 text-base text-gray-300 hover:text-white hover:font-semibold transition duration-150 ease-in-out text-sm' }}">Dashboard</a>
            <a href="{{ route('company.jobs') }}"
                class="{{ request()->routeIs('company.jobs') ? 'block rounded-md bg-zinc-800 px-3 py-2 text-base font-semibold text-white' : 'block rounded-md px-3 py-2 text-base text-gray-300 hover:text-white hover:font-semibold transition duration-150 ease-in-out text-sm' }}">Company Posts</a>
        </div>
    </div>
</nav>
