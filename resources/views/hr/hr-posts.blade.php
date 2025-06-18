<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Company Info Section -->
                    <div class="flex justify-end mb-8">
                        <div class="flex items-center space-x-3">

                            <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200 shadow-sm flex items-center justify-center bg-white">
                                <img src="{{ $company->user->profile_photo_url ?? 'https://via.placeholder.com/40' }}"
                                    alt="{{ $company->user->name }}"
                                    class="w-8 h-8 object-contain">
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $company->user->name }}
                            </h3>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Job Details Form -->
                    <form method="POST" action="{{ route('hr-post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Looking For Section -->
                        <div class="grid grid-cols-12 gap-4 items-center">
                            <label for="job_position" class="col-span-3 text-sm font-medium text-gray-700">
                                Looking for :
                            </label>
                            <div class="col-span-9">
                                <input type="text"
                                       id="job_title"
                                       name="job_title"
                                       placeholder="Enter job Title here..."
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="grid grid-cols-12 gap-4 items mt-4">
                            <label for="image_post_url" class="col-span-3 text-sm font-medium text-gray-700">
                                Job Image :
                            </label>
                            <div class="col-span-9">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <input type="file"
                                               id="image_post_url"
                                               name="image_post_url"
                                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                        <label for="image_post_url"
                                               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                                            Choose File
                                        </label>
                                    </div>
                                    <span id="file-name" class="text-sm text-gray-500"></span>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                            </div>
                        </div>

                        <!-- Job Description Section -->
                        <div class="grid grid-cols-12 gap-4 mt-4">
                            <label for="job_description" class="col-span-3 text-sm font-medium text-gray-700">
                                Job description :
                            </label>
                            <div class="col-span-9 relative">
                                <textarea id="job_description"
                                          name="job_description"
                                          rows="8"
                                          placeholder="Enter job description here..."
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50"></textarea>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div class="grid grid-cols-12 gap-4 items mt-4">
                            <label for="working_hour" class="col-span-3 text-sm font-medium text-gray-700">
                                Working Hour :
                            </label>
                            <div class="col-span-9">
                                <input type="text"
                                       id="working_hour"
                                       name="working_hour"
                                       placeholder="Example: 09:00-17:00 or Flexible"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <p class="mt-1 text-xs text-gray-500">
                                    Enter time range (e.g., 08:00-16:00) or "Flexible"
                                </p>
                            </div>
                        </div>

                        <!-- Salary -->
                        <div class="grid grid-cols-12 gap-4 items mt-4">
                            <label for="salary" class="col-span-3 text-sm font-medium text-gray-700">
                                Salary :
                            </label>
                            <div class="col-span-9">
                                <input type="text"
                                       id="salary"
                                       name="salary"
                                       placeholder="Example: Rp5.000.000 - Rp8.000.000 or Negotiable"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <p class="mt-1 text-xs text-gray-500">
                                    Enter salary range or "Negotiable" or "Confidential"
                                </p>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="grid grid-cols-12 gap-4 items mt-4">
                            <label for="job_category" class="col-span-3 text-sm font-medium text-gray-700">
                                Category :
                            </label>
                            <div class="col-span-9">
                                <select id="job_category"
                                        name="job_category"
                                        class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 w-auto">
                                    <option value="Full-Time" selected>Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                                Create Post
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Show selected file name
        document.getElementById('image_post_url').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            document.getElementById('file-name').textContent = fileName;
        });

    </script>
</x-app-layout>
