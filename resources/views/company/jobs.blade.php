<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Job Posts') }}
        </h2>
    </x-slot>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Company Posts</h3>
                        <div class="relative inline-block">
                            <select class="appearance-none border border-gray-300 bg-white px-4 py-2 rounded-md shadow-sm pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option>All Categories</option>
                                <option>Full-time</option>
                                <option>Part-time</option>
                                <option>Freelance</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach ($posts as $post)
                        <a href="#" class="block hover:transform hover:scale-105 transition-transform duration-200">
                            <div class="bg-white rounded-xl p-4 border shadow hover:shadow-lg transition-all h-80 flex flex-col justify-between">
                                <div>
                                    <div class="h-40 w-full bg-gray-100 flex items-center justify-center mb-4 overflow-hidden rounded-lg">
                                        @if ($post->image_post_url)
                                            <img src="{{ asset('storage/' . $post->image_post_url) }}" alt="Job Image" class="object-cover w-full h-full">
                                        @else
                                            <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image" class="object-cover w-full h-full">
                                        @endif
                                    </div>
                                    <div class="mb-3 font-semibold text-gray-800 line-clamp-2">
                                        {{ $post->job_title }}
                                    </div>
                                    <span class="inline-block text-xs px-3 py-1 rounded-full font-medium
                                        {{ $post->job_type === 'full-time' ? 'bg-green-100 text-green-700' : ($post->job_type === 'part-time' ? 'bg-orange-100 text-orange-700' : 'bg-indigo-100 text-indigo-700') }}">
                                        {{ ucfirst($post->job_type) }}
                                    </span>
                                </div>
                                <div class="mt-4 text-xs text-gray-500 flex justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                        {{ $post->total_appliers }} Applicants
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ $post->total_views }} Views
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <!-- Pagination (jangan lupa tetap include $posts dari controller) -->
                    <div class="mt-8 flex items-center justify-center gap-7">
                        {{-- copy pagination code yang sama dari sebelumnya --}}
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
