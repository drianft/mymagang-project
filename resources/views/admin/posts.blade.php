<!DOCTYPE html>
<html lang="en">
    <head>
          <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Post</title>
    @vite('resources/css/app.css') {{-- untuk project Laravel + Vite --}}
    </head>
<body class="flex bg-gray-100 w-full h-screen">

    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('components.admin-sidebar')
    </div>

    <div class="flex-1 p-6 bg-gray-100 bg-[#E8EBEE] overflow-y-auto">
        <div class="mt-4 p-6 bg-white rounded-lg shadow-md bg-[#E8EBEE]">
            <h1 class="text-2xl font-semibold text-gray-900">Posts</h1>
        </div>

        <!-- Search Form: taruh di atas tabel -->
        <div class="flex justify-end mt-6 mb-4">
            <form method="GET" action="{{ route('admin.posts') }}">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search..."
                        class="pl-10 pr-4 py-2 text-sm rounded-full bg-gray-100 text-gray-700 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 border-none"
                        value="{{ request('search') }}">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 100-13 6.5 6.5 0 000 13z" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tabel -->
        <div class="p-6 bg-white rounded-xl shadow max-h-[500px] overflow-y-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="border-b border-gray-300 text-gray-500">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Salary</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Companies</th>
                        <th class="px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $post->job_description }}</td>
                        <td class="px-4 py-2">{{ Str::limit($post->salary, 50) }}</td>
                        <td class="px-4 py-2">{{ $post->working_hour }}</td>
                        <td class="px-4 py-2">{{ $post->company->email }}</td>
                        <td class="px-4 py-2">{{ $post->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

  <!-- Sidebar -->


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
