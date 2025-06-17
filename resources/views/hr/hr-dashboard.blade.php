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
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
                <form method="GET" action="{{ route('hr-dashboard') }}" class="mb-4">
                    <input type="text" name="search" placeholder="Search by name..." value="{{ request('search') }}" class="border rounded px-4 py-2" />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                </form>

                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <select id="statusFilter"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="all">All Statuses</option>
                        <option value="Under Review">Under Review</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Declined">Declined</option>
                        <option value="Interview Scheduled">Interview Scheduled</option>
                    </select>

                    <select id="positionFilter"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="all">All Positions</option>
                        <option value="Senior Developer">Senior Developer</option>
                        <option value="Product Designer">Product Designer</option>
                        <option value="Sales Manager">Sales Manager</option>
                        <option value="Office Administrator">Office Administrator</option>
                    </select>
                </div>
            </div>

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
                                            <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($appl->applied_at)->format('d/m/Y') }}
                                            </div>
                                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appl->applied_at)->diffForHumans() }}</div>
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
                                            <form action="{{ route('application.update', $appl->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="Accepted">
                                                <button type="submit" class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('application.update', $appl->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="Rejected">
                                                <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('application.update', $appl->id) }}" method="POST">
                                                @csrf
                                                @method('PUT') <!-- Atau 'PATCH' -->
                                                <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-50">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                    </path>
                                                </svg>
                                            </button>
                                            </form>
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

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mx-40">
                <!-- Card 1 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-lg bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-500 ml-3">Total Applicants</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">{{ $applicantCount }}</div>
                        <div class="flex items-center">
                            <span class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                +32 From last month
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-lg bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-500 ml-3">Accepted</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">{{ $acceptedCount }}</div>
                        <div class="flex items-center">
                            <span class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                +8 From last month
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-lg bg-yellow-100">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-500 ml-3">Pending Review</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">{{ $pendingCount }}</div>
                        <div class="flex items-center">
                            <span class="text-red-600 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 13a1 1 0 100-2H9.414l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 13H12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                -5 From last month
                            </span>
                        </div>
                    </div>
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
        });
    </script>
</x-app-layout>
