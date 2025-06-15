<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('hr-posts.update', $job->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Form fields sama seperti create, tapi dengan value -->
                        <div class="grid grid-cols-12 gap-4 items-center">
                            <label class="col-span-3 text-sm font-medium text-gray-700">
                                Job Title:
                            </label>
                            <div class="col-span-9">
                                <input type="text" 
                                       name="title" 
                                       value="{{ old('title', $job->title) }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Tambahkan field lainnya sesuai kebutuhan -->
                        <!-- ... -->

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