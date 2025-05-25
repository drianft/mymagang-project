{{-- <x-app-layout>
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="container mx-auto px-4">
            {{-- Header
            <div class="bg-[#F2F4F7] rounded-2xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between mb-10 relative overflow-hidden shadow-md">
                <div class="flex-1">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">The Smarter Way to Find Your Next Job</h1>
                    <p class="text-gray-600 mt-2 text-sm md:text-base">All the job insights you need, right at your fingertips.</p>
                    <div class="mt-4">
                        <input type="text"
                               placeholder="Search Jobs"
                               class="w-72 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    </div>
                </div>
                <div class="relative mt-6 md:mt-0 md:ml-6">
                    <!-- Bulatan dekoratif besar -->
                    <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-indigo-200 rounded-full z-0"></div>
                    <!-- Gambar -->
                    <img src="{{ asset('images/hrwoman.png') }}"
                         alt="Person"
                         class="w-28 h-28 rounded-full border-4 border-white shadow-lg z-10 relative object-cover">
                </div>
            </div>

            {{-- Filter Dropdown
            <div class="flex justify-end mb-6">
                <select class="border px-4 py-2 rounded-md shadow-sm">
                    <option>Categories</option>
                </select>
            </div>

            {{-- Job Cards Grid
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($posts as $post)
                    <div class="bg-white rounded-xl p-4 border shadow hover:shadow-md transition-all h-40 flex flex-col justify-between">
                        <div>
                            <div class="mb-2 font-semibold text-sm text-gray-800">
                                {{ $post->job_title }}
                            </div>
                            <span class="text-xs px-2 py-1 rounded font-medium
                            {{ $post->job_type === 'full-time' ? ' bg-green-100 text-green-700' : ($post->job_type === 'part-time' ? ' bg-orange-100 text-orange-700' : ' bg-gray-300 text-gray-400') }}">
                            {{ ucfirst($post->job_type) }}
                        </span>

                        </div>
                        <div class="mt-3 text-xs text-gray-500 flex justify-between">
                            <div>{{ $post->total_appliers }} Applicants</div>
                            <div>{{ $post->total_views }} Views</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination Bullets
            <div class="flex justify-center mt-10 space-x-2">
                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <a href="{{ $posts->url($i) }}"
                       class="w-3 h-3 rounded-full transition-all duration-200 {{ $posts->currentPage() == $i ? 'bg-indigo-600' : 'bg-gray-300' }}">
                    </a>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-app-layout>
    <div class="bg-[#F9FAFB] min-h-screen py-12">
        <div class="mx-auto max-w-screen-xl px-6">

{{-- Hero Header --}}
<div class="relative bg-[#F4F5F7] rounded-2xl px-10 py-12 flex items-center justify-between shadow-md mb-12 overflow-hidden">
    {{-- Left Side --}}
    <div class="max-w-xl z-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-2 leading-tight">The Smarter Way to Find Your Next Job</h1>
        <p class="text-gray-500 mb-6">All the job insights you need, right at your fingertips.</p>
        <div class="flex">
            <input type="text"
                   placeholder="Search Jobs"
                   class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <button class="ml-2 bg-[#5A48FA] text-white px-5 py-2 rounded-md hover:bg-indigo-700 transition">Search</button>
        </div>
    </div>

    {{-- Right Side Image (repositioned + improved circles) --}}
    <div class="relative w-[180px] h-[180px] z-10 translate-x-[-50px]">
        <!-- Improved Decorative Circles -->
        <div class="absolute w-24 h-24 bg-[#E3E2FD] rounded-full bottom-[-10px] right-[-10px] z-0"></div>
        <div class="absolute w-8 h-8 bg-[#C9C8FA] rounded-full top-2 left-[-10px] z-0"></div>
        <div class="absolute w-14 h-14 border-4 border-[#D9D8FE] rounded-full top-3 right-6 z-0"></div>
        <div class="absolute w-28 h-28 bg-[#DCDCFB] rounded-br-[90px] top-[110px] left-[-30px] z-0 rotate-12"></div>

        <!-- HR Woman Image -->
        <img src="{{ asset('images/hrwoman.png') }}"
             alt="HR Woman"
             class="absolute bottom-0 right-0 w-[180px] h-[180px] object-cover rounded-full border-4 border-white shadow-lg z-10">
    </div>
</div>



            {{-- Dropdown --}}
            <div class="flex justify-end mb-6">
                <div class="relative inline-block">
                    <select class="appearance-none border border-gray-300 bg-white px-4 py-2 rounded-md shadow-sm pr-8 text-gray-700">
                        <option>Categories</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M5.516 7.548l4.49 4.665 4.49-4.665L15.5 9l-5 5.2L5.5 9z"/></svg>
                    </div>
                </div>
            </div>

            {{-- Job Cards --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white rounded-xl p-4 border shadow hover:shadow-md transition-all h-44 flex flex-col justify-between">
                        <div>
                            <div class="mb-2 font-semibold text-sm text-gray-800 truncate">
                                {{ $post->title ?? 'Frontend Developer' }}
                            </div>
                            <span class="text-xs px-2 py-1 rounded font-medium inline-block
                                {{ $post->type == 'Full Time' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ $post->type ?? 'Full Time' }}
                            </span>
                        </div>
                        <div class="mt-3 text-[11px] text-gray-500 flex justify-between">
                            <div>{{ $post->applicants ?? 0 }} Applicants</div>
                            <div>{{ number_format($post->views ?? 0) }} Views</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-between mt-10 px-6">
                {{-- Prev Button --}}
                <button
                    x-on:click="page = Math.max(1, page - 1); $refs['page' + page].click()"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
                    Prev
                </button>

                {{-- Dot Pagination --}}
                <div class="flex space-x-2">
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <a href="{{ $posts->url($i) }}"
                           x-ref="page{{ $i }}"
                           class="w-3 h-3 rounded-full transition
                            {{ $posts->currentPage() == $i ? 'bg-indigo-600' : 'bg-gray-300' }}">
                        </a>
                    @endfor
                </div>

                {{-- Next Button --}}
                <button
                    x-on:click="page = Math.min({{ $posts->lastPage() }}, page + 1); $refs['page' + page].click()"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
                    Next
                </button>
            </div>



        </div>
    </div>
</x-app-layout>

