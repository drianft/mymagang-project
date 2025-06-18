<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Admin Management') }}
        </h2>
    </x-slot>
    <!-- Top Section -->
    <div class="max-w-7xl mx-auto p-6">
        <!-- Promo Box -->
        <!-- Promo Box -->
        <div
            class="w-full max-w-6xl bg-white rounded-2xl flex flex-col md:flex-row items-center justify-between mx-auto overflow-hidden shadow-md border border-gray-200">

            <!-- Company Logo -->
            <div class="md:w-1/2 p-6 flex justify-center items-center bg-gray-50">
                <img src="{{ Auth::user()->profile_photo_url }}"
                    onerror="this.onerror=null; this.src='{{ Auth::user()->name }}';"
                    class="w-full h-72 md:h-96 object-cover rounded-lg shadow-sm border border-gray-300"
                    alt="Company Logo">
            </div>

            <!-- Company Info -->
            <div class="md:w-1/2 p-8 space-y-4">
                <!-- Name -->
                <h1 class="text-4xl md:text-5xl font-semibold text-gray-800">
                    {{ $company->user->name }}
                </h1>

                <!-- Description (manual 3-line truncate effect) -->
                <div class="text-gray-700 text-lg leading-relaxed overflow-hidden relative" style="max-height: 4.5em;">
                    <p class="overflow-hidden text-ellipsis whitespace-normal break-words">
                        {{ $company->company_description }}
                    </p>

                    <!-- Fade gradient -->
                    <div class="absolute bottom-0 left-0 w-full h-6 bg-gradient-to-t from-white to-transparent"></div>
                </div>

                <!-- CTA -->
                <a href="{{ route('profile.show') }}"
                    class="inline-block px-6 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-900 transition">
                    MANAGE PROFILE
                </a>
            </div>
        </div>

        <!-- HR Table -->
        <div class="overflow-x-auto">
            <div class="min-w-full bg-gray-50 shadow-lg rounded-lg my-5">
                <p class="text-sm text-gray-500 mb-4">Total Company's HR:
                    {{ $hrs->filter(function ($hr) {return $hr->user->roles === 'hr';})->count() }}</p>

                <!-- Table Header -->
                <div class="grid grid-cols-12 bg-gray-200 text-gray-700 font-semibold text-sm px-6 py-4 rounded-t-lg">
                    <div class="col-span-1 text-center">No</div>
                    <div class="col-span-3">Name</div>
                    <div class="col-span-3">Email</div>
                    <div class="col-span-2 text-center">Position</div>
                    <div class="col-span-2 text-center">Status</div>
                    <div class="col-span-1 text-center">Action</div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-gray-200">
                    @php
                        $index = 1;
                    @endphp

                    @foreach ($hrs as $hr)
                        @if ($hr->user->roles === 'hr')
                            <div class="grid grid-cols-12 items-center px-6 py-4 hover:bg-gray-50 transition">
                                <div class="col-span-1 text-center text-gray-600 font-medium">
                                    {{ $index++ }}
                                </div>

                                <div class="col-span-3 text-gray-800 font-semibold">
                                    {{ $hr->user->name }}
                                </div>

                                <div class="col-span-3">
                                    <a href="mailto:{{ $hr->user->email }}" class="text-gray-600 hover:underline">
                                        {{ $hr->user->email }}
                                    </a>
                                </div>

                                <div class="col-span-2 text-center">
                                    <span class="inline-block bg-gray-100 text-gray-700 text-sm px-3 py-1 rounded-full">
                                        {{ $hr->position ?? 'HR' }}
                                    </span>
                                </div>

                                <div class="col-span-2 text-center">
                                    @if ($hr->user->roles == 'hr')
                                        <span
                                            class="inline-block bg-green-100 text-green-700 text-sm px-3 py-1 rounded-full">On
                                            Hiring</span>
                                    @else
                                        <span
                                            class="inline-block bg-red-100 text-red-700 text-sm px-3 py-1 rounded-full">Off
                                            Hiring</span>
                                    @endif
                                </div>

                                <div class="col-span-1 text-center">
                                    <form action="{{ route('admin.hr.demote', $hr->id) }}" method="POST"
                                        onsubmit="return confirm('Ubah HR ini menjadi Applier?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-full transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>


        <!-- User Account Section -->
        <div class="bg-gray-50 shadow-lg rounded-lg my-5">
            <div class="p-6">
                <p class="text-sm text-gray-500 mb-4">Total users eligible to become HR: {{ $applier->count() }}</p>
                <!-- User Table -->
                <div class="bg-white rounded-xl shadow overflow-y-auto overflow-x-auto max-h-[500px]">
                    <!-- Title and Search Bar Row -->
                    <div
                        class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-gray-200 p-4 rounded-t-lg">
                        <h1 class="text-xl font-semibold text-gray-700">User Account</h1>
                        <div class="w-full md:w-96">
                            <div class="relative">
                                <input type="text" id="searchInput" placeholder="Search ..."
                                    class="w-full pl-10 pr-4 py-2 text-sm rounded-full bg-gray-100 text-gray-700 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 border-none">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 100-13 6.5 6.5 0 000 13z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Info -->
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="sticky top-0 z-10 bg-gray-200 text-gray-700 font-semibold text-sm">
                            <tr>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Role</th>
                            </tr>
                        </thead>
                        <tbody id="userTable" class="divide-y divide-gray-200">
                            @foreach ($applier as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap td-name">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap td-email">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form method="POST"
                                            action="{{ route('company.users.updateRole', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="roles" onchange="this.form.submit()" required
                                                class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                <option value="applier"
                                                    {{ $user->roles === 'applier' ? 'selected' : '' }}>Applier</option>
                                                <option value="hr" {{ $user->roles === 'hr' ? 'selected' : '' }}>HR
                                                </option>
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




        <!-- Add Admin Modal -->
        <div id="addAdminModal"
            class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Add New HRs</h3>
                    <form id="addAdminForm">
                        <div class="mb-4">
                            <label for="adminName" class="block text-sm font-medium text-gray-700 mb-2">Full
                                Name</label>
                            <input type="text" id="adminName" name="name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="adminEmail" class="block text-sm font-medium text-gray-700 mb-2">Email
                                Address</label>
                            <input type="email" id="adminEmail" name="email"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="adminPosition"
                                class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                            <input type="text" id="adminPosition" name="position"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
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
            document.getElementById('searchInput').addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                const rows = document.querySelectorAll('#userTable tr');

                rows.forEach(row => {
                    const emailCell = row.querySelector('td.td-email');
                    const nameCell = row.querySelector('td.td-name');

                    if (!emailCell || !nameCell) return;

                    const email = emailCell.textContent.toLowerCase();
                    const name = nameCell.textContent.toLowerCase();

                    if (email.includes(filter) || name.includes(filter)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            function handleRoleChange(select) {
                const form = select.closest('form');
                fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(res => {
                        if (res.ok) {
                            location.reload();
                        }
                    });
            }

            function showAddAdminModal() {
                document.getElementById('addAdminModal').classList.remove('hidden');
            }

            function hideAddAdminModal() {
                document.getElementById('addAdminModal').classList.add('hidden');
                document.getElementById('addAdminForm').reset();
            }

            document.getElementById('addAdminForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                // AJAX implementation would go here
                hideAddAdminModal();
                alert('Admin would be added in a real implementation!');
            });

            document.getElementById('addAdminModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    hideAddAdminModal();
                }
            });
        </script>
</x-app-layout>
