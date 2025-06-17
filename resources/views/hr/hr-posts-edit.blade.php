<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Job Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('hr-post.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Job Title -->
                        <div class="grid grid-cols-12 gap-4 items-center">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Job Title:
                            </label>
                            <div class="col-span-9">
                                <input type="text" name="job_title"
                                       value="{{ old('job_title', $post->job_title) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div class="grid grid-cols-12 gap-4 items-center mt-4">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Job Description:
                            </label>
                            <div class="col-span-9">
                                <textarea name="job_description" rows="4"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('job_description', $post->job_description) }}</textarea>
                            </div>
                        </div>

                        <!-- Working Hour -->
                        <div class="grid grid-cols-12 gap-4 items-center mt-4">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Working Hour:
                            </label>
                            <div class="col-span-9">
                                <input type="text" name="working_hour"
                                       value="{{ old('working_hour', $post->working_hour) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Salary -->
                        <div class="grid grid-cols-12 gap-4 items-center mt-4">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Salary:
                            </label>
                            <div class="col-span-9">
                                <input type="text" name="salary"
                                       value="{{ old('salary', $post->salary) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Job Category -->
                        <div class="grid grid-cols-12 gap-4 items-center mt-4">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Job Category:
                            </label>
                            <div class="col-span-9">
                                <input type="text" name="job_category"
                                       value="{{ old('job_category', $post->category) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="grid grid-cols-12 gap-4 items-center mt-4">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Change Image (Optional):
                            </label>
                            <div class="col-span-9">
                                <input type="file" name="image_post_url"
                                       class="w-full  py-2  border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <!-- Show current image -->
                        @if ($post->image_post_url)
                            <div class="grid grid-cols-12 gap-4 items-center mt-4">
                                <label class="col-span-3 text-sm font-medium text-gray-700">
                                    Current Image:
                                </label>
                                <div class="col-span-9">
                                    <img src="{{ asset('storage/' . $post->image_post_url) }}" alt="Job Image" class="w-48 rounded-md shadow">
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex justify-end mt-8 space-x-4">
                            <a href="{{ route('jobs.index') }}"
                               class="px-6 py-2 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                                Update Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
