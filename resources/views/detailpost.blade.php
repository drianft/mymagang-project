<x-app-layout>
    <div class="bg-white">
        <div class="pt-6">
          <!-- Single Image Dummy -->
          <div class="mx-auto max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="w-full aspect-[2/1] overflow-hidden rounded-lg">
                @if ($post->image)
                    <img src="{{ asset('storage/job-images/' . $post->image) }}" alt="Job Image" class="object-cover w-full h-full">
                @else
                    <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image" class="object-cover w-full h-full">
                @endif
            </div>
          </div>

          <!-- Product info -->
          <div class="mx-auto max-w-2xl px-4 pt-10 pb-8 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">

            <!-- Title -->
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
              <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $post->job_title }}</h1>
            </div>

      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <h2 class="sr-only">Job information</h2>

        <!-- Job Info -->
        <div class="grid grid-cols-[150px_20px_auto] gap-x-2 gap-y-1">
          <p class="text-lg font-semibold text-gray-900">HR Name</p>
          <p class="text-lg font-semibold text-gray-900">:</p>
          <p class="text-lg font-normal text-gray-900">{{ $post->hr && $post->hr->user ? $post->hr->user->name : 'Unknown' }}</p>

          <p class="text-lg font-semibold text-gray-900">Company Name</p>
          <p class="text-lg font-semibold text-gray-900">:</p>
          <p class="text-lg font-normal text-gray-900">{{ $post->company && $post->company->user ? $post->company->user->name : 'Unknown' }}</p>

          <p class="text-lg font-semibold text-gray-900">Job Type</p>
          <p class="text-lg font-semibold text-gray-900">:</p>
          <p class="inline-block w-max rounded-md px-3 py-1 text-sm font-medium {{ $post->job_type === 'full-time' ? 'bg-green-100 text-green-700' : ($post->job_type === 'part-time' ? 'bg-orange-100 text-orange-700' : 'bg-gray-300 text-gray-700') }}">{{ ucfirst($post->job_type) }}</p>

          <p class="text-lg font-semibold text-gray-900">Working Hour</p>
          <p class="text-lg font-semibold text-gray-900">:</p>
          <p class="text-lg font-normal text-gray-900">{{ $post->working_hour }}</p>

          <p class="text-lg font-semibold text-gray-900">Salary</p>
          <p class="text-lg font-semibold text-gray-900">:</p>
          <p class="text-lg font-normal text-gray-900">Rp{{ number_format($post->salary, 2, ',', '.') }}</p>

        </div>

        <!-- Buttons -->
        <div class="mt-10 flex gap-4">
          <!-- Bookmark button -->
          <button type="button" class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-5 7 5V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
            </svg>
            Bookmark
          </button>

          <!-- Add to Cart button -->
          <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Apply for Jobs
          </button>
        </div>
      </div>


            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pr-8 lg:pt-6">
              <!-- Description and details -->
              <div>
                <h3 class="sr-only">Description</h3>
                <div class="space-y-6">
                  <p class="text-base text-gray-700">{{ $post->job_description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>