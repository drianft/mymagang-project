<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Admin Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Admin Management Section -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <div class="bg-gray-100 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6 border-b border-gray-300 pb-3">
                Company's Hrs
            </h3>

            <!-- Admin Table Header -->
            <div class="grid grid-cols-12 gap-4 mb-3 px-4 py-2 bg-gray-200 rounded-lg font-medium">
                <div class="col-span-1 text-center">No.</div>
                <div class="col-span-3">Name</div>
                <div class="col-span-4">Email</div>
                <div class="col-span-3">Position</div>
                <div class="col-span-1 text-center">Action</div>
            </div>

            <div class="space-y-3">
                <!-- Admin 1 -->
                <div class="grid grid-cols-12 gap-4 items-center bg-white p-4 rounded-lg border border-gray-200">
                    <div class="col-span-1 text-center text-gray-600 font-medium">1.</div>
                    <div class="col-span-3 font-semibold text-gray-800">Andrian James Nandana Siregar</div>
                    <div class="col-span-4 text-gray-600">
                        <a href="mailto:drian88@gmail.com" class="text-blue-600 hover:text-blue-800 hover:underline">
                            drian88@gmail.com
                        </a>
                    </div>
                    <div class="col-span-3">
                        <input type="text" value="Chief Technology Officer" 
                            class="w-full px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="col-span-1 text-center">
                        <button type="button"
                            class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 transition-colors duration-200"
                            onclick="removeAdmin(1)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Admin 2 -->
                <div class="grid grid-cols-12 gap-4 items-center bg-white p-4 rounded-lg border border-gray-200">
                    <div class="col-span-1 text-center text-gray-600 font-medium">2.</div>
                    <div class="col-span-3 font-semibold text-gray-800">David Wijaya Sibarani</div>
                    <div class="col-span-4 text-gray-600">
                        <a href="mailto:kairidiabet@gmail.com" class="text-blue-600 hover:text-blue-800 hover:underline">
                            kairidiabet@gmail.com
                        </a>
                    </div>
                    <div class="col-span-3">
                        <input type="text" value="Product Manager" 
                            class="w-full px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="col-span-1 text-center">
                        <button type="button"
                            class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 transition-colors duration-200"
                            onclick="removeAdmin(2)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Add Admin Slot 3 -->
                <div class="grid grid-cols-12 gap-4 items-center bg-white p-4 rounded-lg border border-gray-200 border-dashed">
                    <div class="col-span-1 text-center text-gray-600 font-medium">3.</div>
                    <div class="col-span-11">
                        <button type="button"
                            class="flex items-center space-x-2 text-gray-500 hover:text-gray-700 transition-colors duration-200"
                            onclick="showAddAdminModal()">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="font-medium">Add Hrs</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- User Account Section -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-[#E8EBEE]">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">User Account</h1>
        
        <!-- Search Form -->
        <div class="flex justify-end mb-6">
            <form method="GET" action="{{ route('admin.users') }}" class="w-full max-w-md">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search..."
                        class="w-full pl-10 pr-4 py-2 text-sm rounded-full bg-gray-100 text-gray-700 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 border-none"
                        value="{{ request('search') }}">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 100-13 6.5 6.5 0 000 13z" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>

        <!-- User Table -->
        <div class="bg-white rounded-xl shadow">
            <div class="overflow-y-auto overflow-x-auto max-h-[500px]">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="sticky top-0 z-10 bg-white border-b border-gray-300 text-gray-500">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form method="POST" action="{{ route('admin.users.updateRole', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="roles" onchange="this.form.submit()" 
                                        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="applier" {{ $user->roles === 'applier' ? 'selected' : '' }}>Applier</option>
                                        <option value="hr" {{ $user->roles === 'hr' ? 'selected' : '' }}>HR</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            <!-- Job Cards Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Your Posts</h3>
                        <div class="relative inline-block">
                            <select class="appearance-none border border-gray-300 bg-white px-4 py-2 rounded-md shadow-sm pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option>All Categories</option>
                                <option>Full-time</option>
                                <option>Part-time</option>
                                <option>Freelance</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach ($posts as $post)
                        <a href="{{ route('posts.show', $post->id) }}" class="block hover:transform hover:scale-105 transition-transform duration-200">
                            <div class="bg-white rounded-xl p-4 border shadow hover:shadow-lg transition-all h-80 flex flex-col justify-between">
                                <div>
                                    <!-- Image -->
                                    <div class="h-40 w-full bg-gray-100 flex items-center justify-center mb-4 overflow-hidden rounded-lg">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/job-images/' . $post->image) }}" alt="Job Image"
                                                class="object-cover w-full h-full">
                                        @else
                                            <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image"
                                                class="object-cover w-full h-full">
                                        @endif
                                    </div>
                                    <div class="mb-3 font-semibold text-gray-800 line-clamp-2">
                                        {{ $post->job_title }}
                                    </div>
                                    <span class="inline-block text-xs px-3 py-1 rounded-full font-medium
                                        {{ $post->job_type === 'full-time' ? 'bg-green-100 text-green-700' : ($post->job_type === 'part-time' ? 'bg-orange-100 text-orange-700' : 'bg-indigo-100 text-indigo-700') }}">
                                        {{ ucfirst($post->job_type) }}
                                    </span>
                                </div>

                                <!-- Stats -->
                                <div class="mt-4 text-xs text-gray-500 flex justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                        {{ $post->total_appliers }} Applicants
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ $post->total_views }} Views
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex items-center justify-center gap-7">
                        <div class="flex items-center gap-4 w-[400px] justify-center">
                            @php
                                $current = $posts->currentPage();
                                $last = $posts->lastPage();
                                if ($current >= $last - 3) {
                                    $start = $last - 4;
                                    $end = $last;
                                } elseif ($current <= 4) {
                                    $start = 1;
                                    $end = min($last, 7);
                                } else {
                                    $start = $current - 1;
                                    $end = $current + 3;
                                }
                            @endphp

                            <!-- Always show page 1 -->
                            @if ($start > 1)
                                <a href="{{ $posts->url(1) }}" class="text-gray-700 hover:text-black" x-ref="page1">1</a>
                                <span class="text-gray-400 text-xl font-bold px-2">. . .</span>
                            @endif

                            <!-- Dynamic range -->
                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i >= 1 && $i <= $last)
                                    <a href="{{ $posts->url($i) }}" x-ref="page{{ $i }}"
                                        class="{{ $current == $i ? 'bg-gray-800 text-white rounded-full px-4 py-2 min-w-[44px] text-center' : 'text-gray-700 hover:text-black px-4 py-2 min-w-[44px] text-center' }}">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor
                        </div>

                        <!-- Next Button -->
                        <button x-on:click="page = Math.min({{ $last }}, page + 1); $refs['page' + page]?.click()"
                            class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
                            :disabled="page >= {{ $last }}">
                            &gt;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Admin Modal -->
    <div id="addAdminModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New HRS</h3>
                <form id="addAdminForm">
                    <div class="mb-4">
                        <label for="adminName" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="adminName" name="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="adminEmail" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="adminEmail" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="adminPosition" class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                        <input type="text" id="adminPosition" name="position"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="active" checked
                                    class="form-radio h-4 w-4 text-blue-600">
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="inactive"
                                    class="form-radio h-4 w-4 text-blue-600">
                                <span class="ml-2 text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="hideAddAdminModal()"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200">
                            Add Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showAddAdminModal() {
            document.getElementById('addAdminModal').classList.remove('hidden');
        }

        function hideAddAdminModal() {
            document.getElementById('addAdminModal').classList.add('hidden');
            document.getElementById('addAdminForm').reset();
        }

        function removeAdmin(adminId) {
            if (confirm('Are you sure you want to remove this admin?')) {
                // AJAX call to remove admin
                console.log('Removing admin with ID:', adminId);
            }
        }

        function updateStatus(adminId, selectElement) {
            const newStatus = selectElement.value;
            
            // Update visual appearance
            if (newStatus === 'active') {
                selectElement.className = 'status-select bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium focus:outline-none focus:ring-2 focus:ring-green-500';
            } else {
                selectElement.className = 'status-select bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-medium focus:outline-none focus:ring-2 focus:ring-yellow-500';
            }
            
            // Here you would typically make an AJAX call to update status
            console.log(`Updating admin ${adminId} status to:`, newStatus);
        }

        document.getElementById('addAdminForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const name = formData.get('name');
            const email = formData.get('email');
            const position = formData.get('position');
            const status = formData.get('status');
            
            // AJAX call to add new admin
            console.log('Adding new admin:', { name, email, position, status });
            
            hideAddAdminModal();
            alert('Admin would be added in a real implementation!');
        });

        // Close modal when clicking outside
        document.getElementById('addAdminModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideAddAdminModal();
            }
        });
    </script>
</x-app-layout>