@foreach($bookmarkedPosts as $post)
@php
    $bookmarked = Auth::user()->applier->bookmarkedPosts->contains($post->id);
@endphp
<div class="relative group">
    <a href="{{ route('jobs.show', $post->id) }}" class="block">
        <div class="bg-gray-100 rounded-xl p-4 border shadow hover:shadow-md transition-all h-80 flex flex-col justify-between">
            <div>
                {{-- Job Image --}}
                <div class="h-40 w-full bg-gray-100 flex items-center justify-center mb-2 overflow-hidden">
                    @if ($post->image_post_url)
                        <img src="{{ asset('storage/job-images/' . $post->image_post_url) }}" alt="Job Image" class="object-cover w-full h-full">
                    @else
                        <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image" class="object-cover w-full h-full">
                    @endif
                </div>

                {{-- Job Title and Bookmark --}}
                <div class="flex justify-between items-start mb-2">
                    <div class="font-semibold text-sm text-gray-800">
                        {{ $post->job_title }}
                    </div>
                    <button type="button"
                            class="toggle-bookmark ml-2"
                            data-post-id="{{ $post->id }}"
                            data-bookmarked="{{ $bookmarked ? 'true' : 'false' }}">
                        <span class="bookmark-icon">
                            @if ($bookmarked)
                                {{-- Solid bookmark icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24" class="w-6 h-6 text-blue-600">
                                    <path fill-rule="evenodd"
                                        d="M6.75 3A2.25 2.25 0 004.5 5.25v15.636a.75.75 0
                                        001.14.64l6.36-3.816 6.36 3.816a.75.75 0
                                        001.14-.64V5.25A2.25 2.25 0 0017.25 3H6.75z"
                                        clip-rule="evenodd" />
                                </svg>
                            @else
                                {{-- Outline bookmark icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 3.75H6.75A2.25 2.25 0 004.5
                                        6v14.25l7.5-4.5 7.5 4.5V6a2.25
                                        2.25 0 00-2.25-2.25z" />
                                </svg>
                            @endif
                        </span>
                    </button>
                </div>

                {{-- Job Type Badge --}}
                <span class="text-xs px-2 py-1 rounded font-medium
                    {{ $post->job_type === 'full-time' ? ' bg-green-100 text-green-700' : ($post->job_type === 'part-time' ? ' bg-orange-100 text-orange-700' : ' bg-gray-300 text-gray-700') }}">
                    {{ ucfirst($post->job_type) }}
                </span>
            </div>

            {{-- Stats --}}
            <div class="mt-3 text-xs text-gray-500 flex justify-between">
                <div>{{ $post->total_appliers }} Applicants</div>
                <div>{{ $post->total_views }} Views</div>
            </div>
        </div>
    </a>
</div>
@endforeach
</div>
