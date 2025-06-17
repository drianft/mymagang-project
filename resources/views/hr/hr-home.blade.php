<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Top Section -->
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-6 p-6">
                <!-- Promo Box -->
                <div class="lg:col-span-5 bg-gray-200 rounded-xl flex items-center justify-between overflow-hidden">
                    <div class="ml-6 flex-shrink-0">
                        <h1 class="text-5xl font-bold mb-6">2000+ Applicants<br>Available</h1>
                    </div>
                    <div class="flex-shrink-0 h-full flex items-end">
                        <img src="https://static.vecteezy.com/system/resources/previews/024/558/262/non_2x/businessman-isolated-illustration-ai-generative-free-png.png"
                            alt="Professional illustration"
                            class="max-h-[300px] w-auto hidden md:block object-contain rounded-r-xl">
                    </div>
                </div>

                <!-- Applications -->
                <div class="lg:col-span-4 bg-gray-200 rounded-xl p-6 flex flex-col h-full">
                    <h2 class="text-lg text-center font-bold mb-4">Your Applications</h2>
                    <ul class="space-y-4 text-sm">
                        <!-- Statistics Cards -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Applicants -->
                        <div class="bg-white p-4 rounded-lg flex flex-col items-center shadow-md">
                            <div class="bg-blue-100 p-2 rounded-full mb-2">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A4.992 4.992 0 0112 15c1.657 0 3.156.804 4.121 2.043M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="text-xl font-bold">{{ $applicantCount }}</div>
                            <div class="text-sm text-gray-500 mt-1">Applicants</div>
                        </div>

                        <!-- Accepted -->
                        <div class="bg-white p-4 rounded-lg flex flex-col items-center shadow-md">
                            <div class="bg-green-100 p-2 rounded-full mb-2">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="text-xl font-bold">{{ $acceptedCount }}</div>
                            <div class="text-sm text-gray-500 mt-1">Accepted</div>
                        </div>

                        <!-- Interview -->
                        <div class="bg-white p-4 rounded-lg flex flex-col items-center shadow-md">
                            <div class="bg-yellow-100 p-2 rounded-full mb-2">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-xl font-bold">{{ $interviewCount }}</div>
                            <div class="text-sm text-gray-500 mt-1">Interview</div>
                        </div>

                        <!-- Rejected -->
                        <div class="bg-white p-4 rounded-lg flex flex-col items-center shadow-md">
                            <div class="bg-red-100 p-2 rounded-full mb-2">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="text-xl font-bold">{{ $rejectedCount }}</div>
                            <div class="text-sm text-gray-500 mt-1">Rejected</div>
                        </div>
                    </div>
                </div>
            </div>
                  
            </div>

            <!-- My Job Posts -->
            <div class="px-6 mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="font-semibold text-lg">My Job Posts</h2>
                    <a href="{{ route('jobs.index') }}"
                        class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition">View All Posts →</a>
                </div>

                <div class="swiper saved-swiper my-8">
                    <!-- wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($jobs as $job)
                            <div class="swiper-slide max-w-[256px] bg-white rounded-xl p-4 shadow hover:shadow-lg transition-all duration-300" style="width: 256px;">
                                <div class="w-full h-40 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg mb-3 flex items-center justify-center overflow-hidden">

                                        <img src="{{ asset('storage/' . $job->image_post_url) }}" alt="Job Image" class="object-cover w-full h-full">

                                </div>
                                <p class="font-semibold text-lg truncate">{{ $job->job_title }}</p>
                                <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">
                                    {{ $job->job_type ?? 'Unknown HR' }}
                                </span>
                                <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                    <span>👥 {{ $job->working_hour }}</span>
                                    <span>👁️ {{ $job->status }}</span>
                                </div>
                                <div class="mt-4 flex gap-2 justify-center">
                                    <a href="{{ route('hr-post.edit', $job->id) }}"
                                        class="bg-yellow-600 text-white text-xs px-3 py-1 rounded hover:bg-yellow-700 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white text-xs px-3 py-1 rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination dot -->
                    <div class="swiper-pagination mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.saved-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: false,

                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
        </script>
    @endpush
</x-app-layout>
