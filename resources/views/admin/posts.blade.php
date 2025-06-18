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
        <div class="relative px-6 pb-6 bg-white rounded-xl shadow max-h-[500px] overflow-y-auto overflow-x-auto">
            <table class="table-fixed min-w-full text-sm text-left text-gray-700">
                <thead class="sticky top-0 z-10 h-20 bg-white border-b border-gray-300 text-gray-500">
                    <tr class="bg-white w-full">
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Image Post</th>
                        <th class="px-4 py-2">Salary</th>
                        <th class="px-4 py-2">Working Hour</th>
                        <th class="px-4 py-2">HR Name</th>
                        <th class="px-4 py-2">Companies</th>
                        <th class="px-4 py-2">Job Type</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="w-60 px-4 py-2">{{ $post->job_title }}</td>
                        <td class="w-60 px-4 py-2">
                            <a href="{{ $post->image_post_url != null ? asset('storage/' . $post->image_post_url) : asset('images/post_img_null.jpg') }}" target="_blank">
                                @if ($post->image_post_url != null)
                                     <img src="{{ asset('storage/' . $post->image_post_url) }}" alt="Job Image" class="w-32 h-20 object-cover rounded shadow">
                                @else
                                     <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image" class="w-32 h-20 object-cover rounded shadow">
                                @endif
                            </a>
                        </td>
                        <td class="w-40 px-4 py-2">Rp{{ number_format($post->salary, 2, ',', '.') }}</td>
                        <td class="w-40 px-4 py-2">{{ $post->working_hour }}</td>
                        <td class="w-60 px-4 py-2">{{ $post->hr && $post->hr->user ? $post->hr->user->name : 'Unknown' }}</td>
                        <td class="w-60 px-4 py-2">{{ $post->company && $post->company->user ? $post->company->user->name : 'Unknown' }}</td>
                        <td class="w-40 px-4 py-2">
                            <span class="px-2 py-1 text-xs font-medium rounded
                            @if($post->job_type == 'freelance') bg-gray-100 text-gray-800
                            @elseif($post->job_type == 'part-time') bg-orange-100 text-orange-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ ucfirst($post->job_type) }}
                            </span>
                        <td class="w-40 px-4 py-2">
                            <span class="px-2 py-1 text-xs font-medium rounded
                            @if($post->status == 'draft') bg-yellow-100 text-yellow-800
                            @elseif($post->status == 'closed') bg-red-100 text-red-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td class="w-20 px-4 py-2">
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                            </form>
                        </td>
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
