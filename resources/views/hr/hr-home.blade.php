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
                        @forelse ($jobs as $job)
                            @foreach ($job->applications as $application)
                                <li class="flex items-center justify-between p-3 rounded-md">
                                    <div class="flex items-center gap-3">
                                        <div class="relative w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300 flex-shrink-0">
                                            <img src="{{ optional($application->applier->user)->profile_photo_url ?? 'https://via.placeholder.com/100' }}" alt="{{ optional($application->user)->name ?? 'Unknown' }}" class="w-full h-full object-cover">

                                            <p class="font-semibold truncate">{{ optional($application->applier->user)->name }}</p>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="font-semibold truncate">{{ optional($application->applier->user)->name ?? 'Unknown User' }}</p>
                                            <p class="text-xs text-gray-500 truncate">{{ $job->job_title }}</p>
                                        </div>
                                    </div>
                                    <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded flex-shrink-0">{{ strtoupper($application->status) }}</span>
                                </li>
                            @endforeach
                        @empty
                            <li class="text-center text-gray-500">No Applications Yet</li>
                        @endforelse
                    </ul>
                    <div class="flex justify-center mt-8">
                        <a href="{{ route('hr-dashboard') }}"
                            class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                            Go to Dashboard
                        </a>
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
                                    @if ($job->image)
                                        <img src="{{ asset('storage/job-images/' . $job->image) }}" alt="Job Image" class="object-cover w-full h-full">
                                    @else
                                        <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image" class="object-cover w-full h-full">
                                    @endif
                                </div>
                                <p class="font-semibold text-lg truncate">{{ $job->job_title }}</p>
                                <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">
                                    {{ $job->job_type ?? 'Unknown HR' }}
                                </span>
                                <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                    <span>👥 {{ $job->applicants_count }} Applicants</span>
                                    <span>👁️ {{ $job->views_count }} Views</span>
                                </div>
                                <div class="mt-4 flex gap-2 justify-center">
                                    <a href="{{ route('jobs.edit', $job->id) }}"
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
