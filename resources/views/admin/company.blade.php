<!DOCTYPE html>
<html lang="en">
    <head>
          <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/company</title>
    @vite('resources/css/app.css') {{-- untuk project Laravel + Vite --}}
    </head>
<body class="bg-white">

    <div class="flex h-screen">
        <!-- Sidebar -->
      <aside class="w-64 bg-[#3A3C49] text-white">
            <div class="p-2 border-b border-gray-800">
                <div class="flex items-center justify-between">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-24 w-auto">
                    <span class="text-xl font-bold"></span>
                </div>
            </div>

            <nav class="mt-5 px-2">
                <!-- Main Navigation -->
                <div class="space-y-4">
                     <p class="text-xs text-gray-400">MAIN</p>
                    <!-- Dashboard -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-[#3A3C49] text-white group transition-all duration-200 hover:bg-gray-700">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>


                     <p class="text-xs text-gray-400">MANAGEMENT</p>
                      <!-- Job Posting -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <img src="{{ asset('images/JOB.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Job Posting
                    </a>

                     <!-- User Account -->
                    <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg
                              {{ request()->routeIs('admin.user') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        <img src="{{ asset('images/userAcc.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        User Account
                    </a>

                    <!-- Companies -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                          <img src="{{ asset('images/companies.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Companies
                    </a>

                    <!-- Application -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <img src="{{ asset('images/application.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Application
                    </a>

            <!-- User Profile -->
            <div class="mt-auto p-4 border-t border-gray-800">
                     <p class="text-xs text-gray-400">SETTINGS</p>
                      <!-- Job Posting -->
                           <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                              <img src="{{ asset('images/JOB.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                 </svg>
                                 Job Posting
                             </a>

                <div class="flex items-center">

                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Tom Cook</p>
                        <p class="text-xs text-gray-400">View profile</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
 <main class="flex-1 p-6 bg-gray-100 bg-[#E8EBEE] overflow-y-auto">
             <div class="mt-4 p-6 bg-white rounded-lg shadow-md bg-[#E8EBEE]">
                <h1 class="text-2xl font-semibold text-gray-900">Companies Account</h1>
              </div>
        <!-- searching companies -->
        <main class="flex-1 p-6 bg-gray-100 bg-[#E8EBEE] overflow-y-auto">
             <div class="mt-4 p-6 bg-white rounded-lg shadow-md bg-[#E8EBEE]">
                 <!-- Search + Filter Form -->
                  <div class="flex justify-start mt-6 mb-4">
                     <form method="GET" action="{{ route('admin.companies') }}">
                      <div class="flex space-x-8">
                       <!-- Search Input -->
                        <div class="relative">
                          <input type="text"  name="search" placeholder="Search..."  class="pl-10 pr-4 py-2 text-sm rounded-full bg-white text-gray-700 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 border border-gray-300"  value="{{ request('search') }}">
                         <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 100-13 6.5 6.5 0 000 13z" />
                       </svg>
                    </div>
                 </div>
                 <!-- Filter Dropdown -->
                 <div>
                  <select name="sector" class="pl-4 pr-4 py-2 text-sm rounded-full bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 border border-gray-300"  style="width: 130px">
                    <option value="">All Sector</option>
                    <option value="IT" {{ request('sector') == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="Finance" {{ request('sector') == 'Finance' ? 'selected' : '' }}>Finance</option>
                    <option value="Education" {{ request('sector') == 'Education' ? 'selected' : '' }}>Education</option>
                    <!-- Tambahkan pilihan lain sesuai kebutuhan -->
                </select>
            </div>
        </div>
    </form>
</div>

<div class="p-6 bg-white rounded-xl shadow max-h-[500px] overflow-y-auto">
    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="border-b border-gray-300 text-gray-500">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Joining Date</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>

             @foreach ($companies as $index => $company)
         <tr>
            <td>{{ $index + 1 }}</td>
           <td>{{ $company->name }}</td>
           <td>{{ $company->email }}</td>
             <td>{{ $company->sector }}</td>
            <td>{{ $company->status }}</td>
             </tr>
              @endforeach

          </tbody>
       </table>
    </div>
</div>




        </main>
    </div>

    <script>
        // Dropdown functionality
        document.querySelectorAll('button[aria-controls]').forEach(button => {
            button.addEventListener('click', () => {
                const isExpanded = button.getAttribute('aria-expanded') === 'true';
                const dropdownContent = document.getElementById(button.getAttribute('aria-controls'));

                button.setAttribute('aria-expanded', !isExpanded);
                dropdownContent.classList.toggle('hidden');
                button.querySelector('svg:last-child').classList.toggle('rotate-180');
            });
        });
    </script>
</body>
</html>
