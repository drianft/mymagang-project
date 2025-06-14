<div>
    <!-- Search Input -->
    <div class="mb-4">
        <input type="text" wire:model.debounce.300ms="search" 
               placeholder="Search applications..." 
               class="w-full px-4 py-2 border rounded-lg">
    </div>

    <!-- Applications Table -->
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <!-- Table Header -->
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Applicant</th>
                    <!-- Tambahkan kolom lainnya -->
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td class="px-6 py-4">{{ $application->name }}</td>
                    <!-- Tambahkan kolom lainnya -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $applications->links() }}
    </div>
</div>