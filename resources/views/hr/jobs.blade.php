<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Job Listings') }} --}}
        </h2>
    </x-slot>

    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Create Post Button -->
            <div class="flex justify-end mb-6">
                <a href="{{ route('hr-post.create') }}"
                    class="bg-white border border-gray-200 text-black font-semibold px-6 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    Create a post
                </a>
            </div>


            <!-- Enhanced Job Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($jobs as $job)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden group">

                        <!-- Job Image -->
                        <div class="w-full h-40 overflow-hidden">
                            <img src="{{ asset('storage/' . $job->image_post_url) }}" alt="{{ $job->job_title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <div class="p-4">

                            <!-- Job Title and Company -->
                            <div class="mb-3">
                                <h3 class="font-semibold text-gray-800 text-lg mb-1">{{ $job->job_title }}</h3>
                                <p class="text-sm text-gray-600">{{ $job->company_name }}</p>
                            </div>

                            <!-- Job Type Badge -->
                            <div class="mb-3">
                                <span class="px-2 py-1 text-xs font-medium rounded
                                @if($job->job_type == 'freelance') bg-gray-300 text-gray-800
                                @elseif($job->job_type == 'part-time') bg-orange-100 text-orange-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ ucfirst($job->job_type) }}
                            </span>
                            </div>

                            <!-- Job Details -->
                            <div class="space-y-2 mb-3">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                    {{ $job->salary }} /bulan
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                    {{ $address }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                    {{ $job->working_hour }}
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="text-xs text-gray-500 mb-4 flex justify-between">
                                <span class="flex items-center">
                                    👥 {{ $job->applicants_count }} Pelamar
                                </span>
                                <span class="flex items-center">
                                    👁️ {{ $job->views_count }} Dilihat
                                </span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('hr-post.edit', $job->id) }}"
                                class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">
                                    Edit
                                </a>

                                <a href="{{ route('hr-post.show', $job->id) }}"
                                class="bg-blue-600 text-white text-xs px-2 py-1 rounded hover:bg-blue-700 transition">
                                    View
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Improved Pagination -->
            <!-- Real Functional Pagination -->
            @if ($jobs->hasPages())
                <div class="mt-10 flex justify-between items-center flex-wrap gap-4">
                    {{-- Tombol Previous --}}
                    @if ($jobs->onFirstPage())
                        <span class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-400 bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M12.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $jobs->previousPageUrl() }}"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M12.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z" />
                            </svg>
                        </a>
                    @endif

                    {{-- Nomor Halaman --}}
                    <div class="flex gap-1 flex-wrap">
                        @for ($i = 1; $i <= $jobs->lastPage(); $i++)
                            <a href="{{ $jobs->url($i) }}"
                            class="w-10 h-10 flex items-center justify-center rounded-lg border text-sm font-medium
                            {{ $i == $jobs->currentPage() ? 'bg-blue-600 text-white border-blue-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' }}">
                                {{ $i }}
                            </a>
                        @endfor
                    </div>

                    {{-- Tombol Next --}}
                    @if ($jobs->hasMorePages())
                        <a href="{{ $jobs->nextPageUrl() }}"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                            </svg>
                        </a>
                    @else
                        <span class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-400 bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                            </svg>
                        </span>
                    @endif
                </div>
            @endif


        </div>
    </div>
</x-app-layout>
