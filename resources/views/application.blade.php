<x-app-layout>
    {{-- @if($applications->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white">
                <tr class="text-left text-sm font-bold text-blue-600">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Applicant</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Company</th>
                    <th class="px-4 py-3">HR</th>
                    <th class="px-4 py-3">Posted On</th>
                    <th class="px-4 py-3">Post</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                @foreach($applications as $application)
                    <tr>
                        <td class="px-4 py-3 text-gray-700">#{{ $application->id }}</td>
                        <td class="px-4 py-3 text-gray-800">{{ $application->applier->name }}</td>
                        <td class="px-4 py-3 text-gray-800">{{ $application->applier->email }}</td>
                        <td class="px-4 py-3 text-gray-800">{{ $application->applier->phone }}</td>
                        <td class="px-4 py-3">
                            @php
                                $status = strtolower($application->status);
                                $colors = [
                                    'active' => 'bg-green-100 text-green-700',
                                    'not active' => 'bg-red-100 text-red-700',
                                    'disabled' => 'bg-yellow-100 text-yellow-700',
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded text-xs font-medium {{ $colors[$status] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $application->post->company->name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $application->post->hr->name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $application->post->created_at->format('F d') }}
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('jobs.show', $application->post->id) }}"
                               class="border border-blue-400 text-blue-600 px-3 py-1 text-sm rounded hover:bg-blue-50 transition">
                                View Job
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        {{-- <div class="mt-4">
            {{ $applications->links() }}
        </div> --}}
    {{-- @else --}}
    <div class=" mt-10 min-h-[55vh] flex items-center justify-center">
        <div class="p-6 bg-white rounded-xl shadow text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">You haven't applied for any jobs yet</h2>
            <p class="text-gray-600">Let's find your dream job together. Start exploring now!</p>

            <a href="{{ route('jobs') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Explore Jobs
            </a>
        </div>
    </div>

    {{-- @endif --}}
</x-app-layout>
