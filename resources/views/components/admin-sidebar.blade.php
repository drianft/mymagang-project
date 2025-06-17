<div class="flex min-h-screen">
    <aside class="w-72 bg-[#3A3C49] text-white text-base">
        <!-- Logo -->
        <div class="p-4 border-b border-gray-800">
            <img src="{{ asset('images/mymagang (2).png') }}" alt="Logo" class="w-15 h-14">
        </div>

        @php
            $user = Auth::user();
        @endphp

        <!-- Profile -->
        <nav class="mt-6 px-4">
            <div class="p-4">
                <div class="flex items-center">
                    <img class="h-14 w-14 rounded-full object-cover border-2 border-gray-600" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    <div class="ml-4">
                        <p class="text-lg font-semibold text-white">Admin #1</p>
                        <p class="text-sm text-gray-300">Super Admin</p>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Navigation -->
        <nav class="mt-8 px-4 space-y-6">
            <!-- Main -->
            <div>
                <p class="text-sm text-gray-400 mb-2">MAIN</p>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' : 'text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' }}">
                    <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
        </div>

        <!-- Management -->
        <div>
            <p class="text-sm text-gray-400 mb-2">MANAGEMENT</p>

                <a href="{{ route('admin.posts') }}" class="{{ request()->routeIs('admin.posts') ? 'bg-gray-800 text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' : 'text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' }}">
                    <img src="{{ asset('images/JOB.png') }}" alt="Job Logo" class="h-6 w-6 mr-4">
                    Job Posting
                </a>

                <a href="{{ route('admin.users.main') }}" class="{{ request()->routeIs('admin.users') ? 'bg-gray-800 text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' : 'text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' }}">
                    <img src="{{ asset('images/userAcc.png') }}" alt="User Icon" class="h-6 w-6 mr-4">
                    User Account
                </a>

                <a href="{{ route('admin.companies') }}" class="{{ request()->routeIs('admin.companies') ? 'bg-gray-800 text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' : 'text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' }}">
                    <img src="{{ asset('images/companies.png') }}" alt="Company Icon" class="h-6 w-6 mr-4">
                    Companies
                </a>

                <a href="{{ route('admin.application') }}" class="{{ request()->routeIs('admin.application') ? 'bg-gray-800 text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' : 'text-white flex items-center px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-700 transition duration-200' }}">
                    <img src="{{ asset('images/application.png') }}" alt="Application Icon" class="h-6 w-6 mr-4">
                    Application
                </a>
            </div>

            <!-- Settings -->
            <div class="border-t border-gray-800 pt-6">
                <p class="text-sm text-gray-400 mb-2">SETTINGS</p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-base font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200">
                        <img src="{{ asset('images/logout.png') }}" alt="Logout Icon" class="h-6 w-6 mr-4">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>
</div>
