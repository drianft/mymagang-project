<x-app-layout>
    <div class=" mt-10 min-h-[55vh] flex items-center justify-center">
        <div class="p-6 bg-white rounded-xl shadow text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">You haven't applied for any jobs yet</h2>
            <p class="text-gray-600">Let's find your dream job together. Start exploring now!</p>

            <a href="{{ route('jobs') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Explore Jobs
            </a>
        </div>
    </div>
</x-app-layout>