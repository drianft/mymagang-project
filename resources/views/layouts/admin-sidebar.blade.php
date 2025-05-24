<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar with Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=description" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=groups" />
</head>
<body class="flex bg-gray-100 min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-[#3A3C49] text-white">
            <div class="p-2 border-b border-gray-800">
                <div class="flex items-center justify-between">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-24 w-auto">
                    <span class="text-xl font-bold"></span>
                </div>
            </div>

             <nav class="mt-5 px-2">
                  <div class="p-3 rounded-lg bg-gray-800 border border-gray-700 hover:bg-gray-700 transition-colors duration-200">
                     <div class="flex items-center">
                          <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-600"
                              src="{{ asset('images/MU.png') }}"
                              alt="Foto Profil Admin">
                              <div class="ml-3">
                                <p class="text-sm font-medium text-white">Admin User</p>
                                <p class="text-xs text-gray-300">Super Admin</p>
                              </div>
                        </div>
                 </div>
             </nav>

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
                    <a href="admin.posts" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
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
                    <a href="{{ route('admin.companies') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                          <img src="{{ asset('images/companies.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Companies
                    </a>

                    <!-- Application -->
                    <a href="{{ route('admin.Application') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <img src="{{ asset('images/application.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Application
                    </a>

              <!-- User Profile -->
               <div class="mt-auto p-4 border-t border-gray-800">
                     <p class="text-xs text-gray-400">SETTINGS</p>
                      <!-- Settings Admin Sidebar -->
                           <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                              <img src="{{ asset('images/settings.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                 </svg>
                                Settings
                             </a>

                             <!-- Settings Admin Sidebar -->
                           <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                              <img src="{{ asset('images/logout.png') }}" alt="Job Logo" class="h-5 w-5 mr-3 inline-block">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                 </svg>
                                Logout
                             </a>
                   </div>
         </aside>

  <!-- Main Content -->
  <div class="flex-1 p-6 bg-[#E8EAEE]">
    @yield('content')
  </div>

  <!-- Mobile Sidebar (hidden by default) -->
  <div id="mobileSidebar" class="fixed top-0 left-0 w-64 h-full bg-white shadow-md z-50 hidden">
    <div class="p-4 text-xl font-semibold border-b flex justify-between items-center">
      My Dashboard
      <button id="closeBtn" class="text-gray-500 text-xl">&times;</button>
    </div>
    <nav class="p-4 space-y-2">
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">🏠 Home</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">📁 Projects</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">📊 Reports</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">⚙️ Settings</a>
    </nav>
  </div>

  <script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeBtn = document.getElementById('closeBtn');

    menuBtn.addEventListener('click', () => {
      mobileSidebar.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
      mobileSidebar.classList.add('hidden');
    });
  </script>
</body>
</html>

