<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Hello, Deodarren
                </h2>
                <p class="text-sm text-gray-600 mt-1">Friday, 09 May 2025</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <form method="GET" action="{{ route('hr-dashboard') }}" class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6 w-full">

            {{-- Search Input --}}
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by name or status"
                class="border px-4 py-2 rounded w-full sm:w-1/3" />

            {{-- Filter Dropdowns --}}
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select name="status"
                    class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="">All Statuses</option>
                    <option value="accepted" {{ request('application_status') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ request('application_status') == 'Rejected' ? 'selected' : '' }}>Declined</option>
                    <option value="Interview Scheduled" {{ request('appliaction_status') == 'Interview Scheduled' ? 'selected' : '' }}>Interview Scheduled</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Filter
            </button>
        </form>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="applicationsTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applicant</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Position</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applied On</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Education</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Experience</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="applicantsTableBody">
                            @foreach ($jobs as $job)
                            @foreach ($job->applications as $appl)
                                <tr class="hover:bg-gray-50 transition-colors applicant-row"
                                    data-status="{{ $appl->status }}"
                                    data-position="{{ $job->job_title }}">

                                    <!-- Foto dan Nama -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-600 font-medium">
                                                    {{ strtoupper(substr($appl->applier->user->name, 0, 2)) }}
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $appl->applier->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $appl->applier->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Job Position -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $job->job_title }}</div>
                                        <div class="text-sm text-gray-500">{{ $job->category ?? 'General' }}</div>
                                    </td>

                                    <!-- Application Date -->

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($appl->created_at)->format('d/m/Y') }}
                                            </div>
                                        </td>



                                    <!-- Education (Optional, jika ada field) -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $appl->applier->education ?? 'Not Provided' }}
                                    </td>

                                    <!-- View Details Button -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('application.show', $appl->id) }}"
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                            View details
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </td>

                                    <!-- Status Badge -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                             @if($appl->application_status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($appl->application_status == 'interview') bg-blue-100 text-blue-800
                                            @elseif($appl->application_status == 'rejected') bg-red-100 text-red-800
                                            @else bg-green-100 text-green-800 @endif">
                                            {{ ucfirst($appl->application_status) }}
                                        </span>
                                    </td>

                                    <!-- Action Buttons -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <!-- Tombol Accept -->
                                                <form action="{{ route('application.update', $appl->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="application_status" value="Accepted">

                                                    <button type="submit" class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </button>
                                                </form>

                                                <form action="{{ route('application.update', $appl->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="application_status" value="Rejected">

                                                    <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </form>



                                            <!-- Tombol titik 3 -->
                                        @foreach ($applications as $application)
                                                    <!-- Tombol titik 3 (langsung buka modal, tanpa form) -->
                                                    <button type="button" onclick="openModal('{{ $application->id }}')" class="text-gray-500 hover:text-black">
                                                        ⋮
                                                    </button>

                                                    <!-- Modal -->
                                                    <div id="modal-{{ $application->id }}" class="fixed inset-0 z-50 hidden items-center justify-center">
                                                        <div onclick="closeModal('{{ $application->id }}')" class="absolute inset-0 bg-black bg-opacity-50"></div>

                                                        <div class="relative bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg z-50">
                                                            <div class="flex justify-between items-center mb-4">
                                                                <h2 class="text-xl font-semibold">Set Interview</h2>
                                                                <button onclick="closeModal('{{ $application->id }}')">✕</button>
                                                            </div>

                                                            <!-- Form interview -->
                                                            <form action="{{ route('interview.store', $application->id) }}" method="POST" class="space-y-4">
                                                                @csrf
                                                                <div>
                                                                    <label class="block text-sm text-gray-600">Interview Time</label>
                                                                    <input type="datetime-local" name="interview_time" required class="w-full px-4 py-2 border rounded-lg">
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm text-gray-600">Location</label>
                                                                    <input type="text" name="location" required class="w-full px-4 py-2 border rounded-lg">
                                                                </div>

                                                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg">
                                                                    Save Interview
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach





                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach


                        </tbody>
                    </table>
                </div>

                @if ($applications->hasPages())
                    <!-- Pagination -->
                    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <!-- Previous -->
                                    @if ($applications->onFirstPage())
                                        <span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-500 cursor-not-allowed">
                                            <span class="sr-only">Previous</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    @else
                                        <a href="{{ $applications->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Previous</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif

                                    <!-- Page Number -->
                                    @for ($i = 1; $i <= $applications->lastPage(); $i++)
                                        <a href="{{ $applications->url($i) }}" class="relative inline-flex items-center px-4 py-2 border {{ $applications->currentPage() == $i ? 'bg-blue-50 border-blue-500 text-blue-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' }} text-sm font-medium">
                                            {{ $i }}
                                        </a>
                                    @endfor

                                    <!-- Next -->
                                    @if ($applications->hasMorePages())
                                        <a href="{{ $applications->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Next</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @else
                                        <span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-500 cursor-not-allowed">
                                            <span class="sr-only">Next</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="max-w-screen-xl mx-auto flex items-center justify-center gap-8 mt-10 text-base font-semibold" x-data="{ page: {{ $applications->currentPage() }} }">
                {{-- Prev Button --}}
                    <button
                        x-on:click="page = Math.max(1, page - 1); $refs['page' + page]?.click()"
                        class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
                        :disabled="page <= 1"
                    >
                        &lt;
                    </button>

                        {{-- Pagination --}}
                        <div class="flex items-center gap-7">
                            <div class="flex items-center gap-4 w-[400px] justify-center">
                                @php
                                    $current = $applications->currentPage();
                                    $last = $applications->lastPage();
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

                                {{-- Always show page 1 --}}
                                @if ($start > 1)
                                    <a href="{{ $applications->url(1) }}"
                                    class="text-gray-700 hover:text-black"
                                    x-ref="page1">1</a>
                                    <span class="text-gray-400 text-xl font-bold px-2">. . .</span>
                                @endif

                                {{-- Dynamic range --}}
                                @for ($i = $start; $i <= $end; $i++)
                                    @if ($i >= 1 && $i <= $last)
                                        <a href="{{ $applications->url($i) }}" x-ref="page{{ $i }}" class="{{ $current == $i ? 'bg-gray-800 text-white rounded-full px-4 py-2 min-w-[44px] text-center' : 'text-gray-700 hover:text-black px-4 py-2 min-w-[44px] text-center' }}">
                                            {{ $i }}
                                        </a>
                                    @endif
                                @endfor
                            </div>
                        </div>

                        {{-- Next Button --}}
                    <button
                        x-on:click="page = Math.min({{ $last }}, page + 1); $refs['page' + page]?.click()"
                        class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
                        :disabled="page >= {{ $last }}"
                    >
                        &gt;
                    </button>
                    </div>


            </div>
        </div>
    </div>


    <script>
        const mobileMenuButton = document.querySelector("[aria-controls='mobile-menu']");
                const mobileMenu = document.getElementById("mobile-menu");

                if (mobileMenu) {
                    mobileMenu.classList.add("hidden");
                }

                mobileMenuButton.addEventListener("click", function () {
                    if (mobileMenu) {
                    mobileMenu.classList.toggle("hidden");
                    }
                });

                new Swiper('.saved-swiper', {
                slidesPerView: 1.2,
                spaceBetween: 16,
                breakpoints: {
                640: { slidesPerView: 2.2 },
                768: { slidesPerView: 3.5 },
                1024: { slidesPerView: 5 },
                },
            });

            new Swiper('.new-swiper', {
                slidesPerView: 1.5,
                spaceBetween: 12,
                breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 5 },
                },
            });
            function toggleDropdown(id) {
            const dropdown = document.getElementById('dropdown-' + id);
            dropdown.classList.toggle('hidden');
            }





    function openModal(id) {
        const modal = document.getElementById('modal-' + id);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById('modal-' + id);
        if (modal) {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    }




    </script>
</x-app-layout>
