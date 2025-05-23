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
@include('components.admin-sidebar')

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
