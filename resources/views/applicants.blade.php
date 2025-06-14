<x-app-layout>
    <div class="flex flex-col h-screen bg-gray-50 p-6 w-full">
        {{-- Search and Filter --}}
        <div class="flex items-center space-x-4 mb-4 w-full">
            <input type="text" placeholder="Searching..."
                class="flex-grow rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
            <select
                class="rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                <option>Categories</option>
                <option>Category 1</option>
                <option>Category 2</option>
            </select>
            <button aria-label="Previous" class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300">
                ←
            </button>
            <button aria-label="Next" class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300">
                →
            </button>
        </div>

        {{-- Table Container with scroll --}}
        <div class="flex-grow overflow-y-auto rounded-lg shadow bg-white border border-gray-200 w-full">
            <table class="min-w-full w-full table-auto border-collapse">
                <thead class="bg-gray-100 text-gray-700 font-semibold sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-3 border border-gray-200 text-center">Applicant</th>
                        <th class="px-6 py-3 border border-gray-200 text-center">Position</th>
                        <th class="px-6 py-3 border border-gray-200 text-center">APPLIED</th>
                        <th class="px-6 py-3 border border-gray-200 text-center">HR Name</th>
                        <th class="px-6 py-3 border border-gray-200 text-center">Job Name</th>
                        <th class="px-6 py-3 border border-gray-200 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $applicants = [
                            [
                                'Applicant' => '18/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Accepted',
                            ],
                            [
                                'Applicant' => '19/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Pending',
                            ],
                            [
                                'Applicant' => '20/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Rejected',
                            ],
                            [
                                'Applicant' => '21/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Accepted',
                            ],
                            [
                                'Applicant' => '22/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Pending',
                            ],
                            [
                                'Applicant' => '23/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Rejected',
                            ],
                            [
                                'Applicant' => '24/05/2025',
                                'Position' => 'View Position',
                                'APPLIED' => 'Universitas Mikroskil',
                                'hr' => 'Andrian Kuruyuk',
                                'job' => 'UI/UX Designer',
                                'status' => 'Accepted',
                            ],
                        ];
                    @endphp

                    @foreach ($applicants as $applicant)
                        <tr class="border border-gray-200">
                            <td class="px-6 py-4 border border-gray-200 whitespace-nowrap text-center">
                                {{ $applicant['Applicant'] }}</td>
                            <td
                                class="px-6 py-4 border border-gray-200 text-blue-600 hover:underline cursor-pointer whitespace-nowrap text-center">
                                {{ $applicant['Position'] }}</td>
                            <td class="px-6 py-4 border border-gray-200 font-semibold whitespace-nowrap text-center">
                                {{ $applicant['APPLIED'] }}</td>
                            <td class="px-6 py-4 border border-gray-200 font-semibold whitespace-nowrap text-center">
                                {{ $applicant['hr'] }}</td>
                            <td class="px-6 py-4 border border-gray-200 whitespace-nowrap text-center">
                                {{ $applicant['job'] }}</td>
                            <td class="px-6 py-4 border border-gray-200 whitespace-nowrap text-center">
                                @php
                                    $status = strtolower($applicant['status']);
                                    $statusBg = match ($status) {
                                        'accepted' => '#50C878',
                                        'pending' => '#B0B0B0',
                                        'rejected' => '#E63946',
                                        default => '#ccc',
                                    };
                                    $textColor = $status === 'pending' ? '#000000' : '#fff';
                                @endphp
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide text-center"
                                    style="background-color: {{ $statusBg }}; color: {{ $textColor }}; min-width: 5rem;">
                                    {{ $applicant['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
