<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="bg-gray-100 p-6 rounded-lg flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold">The Smarter Way to Find Your Next Job</h1>
                <p class="text-gray-600">All the job insights you need, right at your fingertips.</p>
                <input type="text" placeholder="Search Jobs" class="mt-3 px-4 py-2 border rounded-md w-full">
            </div>
            <div>
                <img src="https://via.placeholder.com/100" alt="Person" class="rounded-full">
            </div>
        </div>

        <div class="flex justify-end mb-4">
            <select class="border px-4 py-2 rounded">
                <option>Categories</option>
            </select>
        </div>

        <div class="grid grid-cols-4 gap-4">
            @foreach($posts as $post)
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="font-semibold">{{ $job->title }}</h2>
                <span class="inline-block px-2 py-1 text-sm rounded {{ $job->type == 'Full Time' ? 'bg-green-200 text-green-800' : 'bg-orange-200 text-orange-800' }}">
                    {{ $post->working_hour }}
                </span>
                {{-- <p class="text-gray-500 text-sm mt-2">{{ $job->applicants }} Applicants</p>
                <p class="text-gray-500 text-sm">{{ number_format($job->views) }} Views</p> --}}
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $jobs->links() }}
        </div>
    </div>
</x-app-layout>