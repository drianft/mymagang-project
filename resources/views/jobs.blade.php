<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Listings') }}
        </h2>
    </x-slot>

    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Create Post Button -->
            <div class="flex justify-end mb-6">
                <a href="{{ route('hr-posts') }}"
                    class="bg-white border border-gray-200 text-black font-semibold px-6 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    Create a post
                </a>
            </div>

            <!-- Enhanced Job Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ([
        ['title' => 'Senior UX Designer', 'company' => 'TechCorp', 'type' => 'Full Time', 'salary' => 'Rp85.000.000 - Rp115.000.000', 'location' => 'Remote', 'posted' => '2 days ago', 'applicants' => 45, 'views' => 320, 'image' => 'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?w=300&h=200&fit=crop', 'hours' => '09:00 - 17:00'],
        ['title' => 'Frontend Developer', 'company' => 'WebSolutions', 'type' => 'Contract', 'salary' => 'Rp65.000.000 - Rp95.000.000', 'location' => 'Jakarta', 'posted' => '1 week ago', 'applicants' => 72, 'views' => 890, 'image' => 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?w=300&h=200&fit=crop', 'hours' => '10:00 - 18:00'],
        ['title' => 'Data Scientist', 'company' => 'DataInsights', 'type' => 'Full Time', 'salary' => 'Rp100.000.000+', 'location' => 'Bandung', 'posted' => '3 days ago', 'applicants' => 28, 'views' => 156, 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=300&h=200&fit=crop', 'hours' => '08:00 - 16:00'],
        ['title' => 'Product Manager', 'company' => 'InnovateCo', 'type' => 'Full Time', 'salary' => 'Rp115.000.000 - Rp145.000.000', 'location' => 'Remote', 'posted' => 'Just now', 'applicants' => 15, 'views' => 89, 'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=300&h=200&fit=crop', 'hours' => 'Fleksibel'],
        ['title' => 'DevOps Engineer', 'company' => 'CloudTech', 'type' => 'Full Time', 'salary' => 'Rp95.000.000 - Rp130.000.000', 'location' => 'Surabaya', 'posted' => '5 days ago', 'applicants' => 67, 'views' => 445, 'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=300&h=200&fit=crop', 'hours' => '12:00 - 19:00'],
        ['title' => 'Marketing Specialist', 'company' => 'GrowthHub', 'type' => 'Part Time', 'salary' => 'Rp45.000.000 - Rp60.000.000', 'location' => 'Bali', 'posted' => '1 day ago', 'applicants' => 34, 'views' => 267, 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=300&h=200&fit=crop', 'hours' => '13:00 - 17:00'],
        ['title' => 'iOS Developer', 'company' => 'MobileFirst', 'type' => 'Contract', 'salary' => 'Rp80.000.000 - Rp110.000.000', 'location' => 'Remote', 'posted' => '2 weeks ago', 'applicants' => 91, 'views' => 623, 'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=300&h=200&fit=crop', 'hours' => 'Fleksibel'],
        ['title' => 'Backend Engineer', 'company' => 'API Masters', 'type' => 'Full Time', 'salary' => 'Rp110.000.000+', 'location' => 'Yogyakarta', 'posted' => '4 days ago', 'applicants' => 53, 'views' => 378, 'image' => 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?w=300&h=200&fit=crop', 'hours' => '09:30 - 17:30'],
    ] as $job)
                    <div
                        class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden group">
                        <!-- Job Image -->
                        <div class="w-full h-40 overflow-hidden">
                            <img src="{{ $job['image'] }}" alt="{{ $job['title'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <div class="p-4">
                            <!-- Job Title and Company -->
                            <div class="mb-3">
                                <h3 class="font-semibold text-gray-800 text-lg mb-1">{{ $job['title'] }}</h3>
                                <p class="text-sm text-gray-600">{{ $job['company'] }}</p>
                            </div>

                            <!-- Job Type Badge -->
                            <div class="mb-3">
                                <span
                                    class="text-xs font-medium px-2 py-1 rounded-full inline-block {{ $job['type'] == 'Full Time' ? 'bg-green-200 text-green-800' : ($job['type'] == 'Part Time' ? 'bg-yellow-200 text-yellow-800' : 'bg-purple-200 text-purple-800') }}">
                                    {{ $job['type'] }}
                                </span>
                            </div>

                            <!-- Job Details -->
                            <div class="space-y-2 mb-3">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $job['salary'] }} /bulan
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $job['location'] }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $job['hours'] }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Posted {{ $job['posted'] }}
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="text-xs text-gray-500 mb-4 flex justify-between">
                                <span class="flex items-center">
                                    👥 {{ $job['applicants'] }} Pelamar
                                </span>
                                <span class="flex items-center">
                                    👁️ {{ $job['views'] }} Dilihat
                                </span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">
                                    Edit
                                </button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Improved Pagination -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-600">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">8</span> of <span
                        class="font-medium">24</span> results
                </p>
                <div class="flex gap-1">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-blue-500 bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">1</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">2</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">3</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>