<x-app-layout>
    <div class="min-w-full">
        <div class="max-w-6xl mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">My Applications</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
            @endif

            <!-- Search + Filter -->
            <div class="flex justify-between items-center mb-4">
                <input type="text" id="searchInput" placeholder="Search jobs..." class="border px-3 py-2 rounded w-1/3">
                <select id="statusFilter" class="border px-3 py-2 rounded w-[140px]">
                    <option value="">All Status</option>
                    <option value="accepted">Accepted</option>
                    <option value="pending">Pending</option>
                    <option value="interview">Interview</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded shadow">
                    <thead>
                        <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            <th class="px-4 py-2">Job Title</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Applied On</th>
                            <th class="px-4 py-2">Interview</th>
                        </tr>
                    </thead>
                    <tbody id="appTable">
                        @forelse ($applications as $app)
                            <tr class="border-t application-row" data-status="{{ strtolower($app->application_status) }}">
                                <td class="px-4 py-2">{{ $app->post->job_title ?? '-' }}</td>
                                <td class="px-4 py-2">
                                    @php
                                        $status = $app->application_status;
                                        $colorClass = match($status) {
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'interview' => 'bg-blue-100 text-blue-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                            'accepted' => 'bg-green-100 text-green-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp

                                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $colorClass }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ $app->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-2">
                                    @if ($app->application_status == 'interview' && $app->interview)
                                        <button onclick="showInterview({{ $app->id }})" class="text-blue-300 px-3 py-1 rounded hover:text-blue-700 transition">
                                            View
                                        </button>

                                        <!-- Modal -->
                                        <div id="modal-{{ $app->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                            <div class="bg-white rounded-lg p-6 shadow-lg w-96 relative">
                                                <button onclick="closeInterview({{ $app->id }})" class="absolute top-2 right-3 text-gray-600 text-xl font-bold">&times;</button>
                                                <h3 class="text-lg font-semibold mb-4">Interview Details</h3>
                                                <div class="space-y-2">
                                                    <div class="flex">
                                                        <span class="w-24 font-semibold">HR</span>
                                                        <span class="text-gray-700">: {{ $app->interview->hr->user->name }}</span>
                                                    </div>
                                                    <div class="flex">
                                                        <span class="w-24 font-semibold">Time</span>
                                                        <span class="text-gray-700">: {{ $app->interview->interview_time }}</span>
                                                    </div>
                                                    <div class="flex">
                                                        <span class="w-24 font-semibold">Location</span>
                                                        <span class="text-gray-700">: {{ $app->interview->location }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <span class="text-gray-400 italic">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 px-4 py-6">You haven't applied to any jobs yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function showInterview(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeInterview(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }

        // Search + Filter
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('.application-row');

        function filterTable() {
            const search = searchInput.value.toLowerCase();
            const status = statusFilter.value;

            rows.forEach(row => {
                const title = row.querySelector('td').textContent.toLowerCase();
                const rowStatus = row.getAttribute('data-status');

                const matchSearch = title.includes(search);
                const matchStatus = !status || rowStatus === status;

                row.style.display = (matchSearch && matchStatus) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
    </script>
</x-app-layout>
