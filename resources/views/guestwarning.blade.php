<x-app-layout>
    <div class="relative min-h-screen"> 
        <div class="@guest blur-sm pointer-events-none select-none @endguest transition duration-300">
            <div class="flex items-center justify-center min-h-screen bg-gray-100">
                <div class="p-8 text-center">
                    <h1 class="text-4xl font-bold text-red-600 mb-4">401</h1>
                    <p class="text-xl font-semibold mb-2">Unauthorized</p>
                    <p class="text-gray-600 mb-6">Kamu tidak punya akses ke halaman ini.</p>
                </div>
            </div>
        </div>

        @guest
            <div class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm mx-auto">
                    <h2 class="text-red-600 text-xl font-semibold mb-4">Kamu Belum Login!</h2>
                    <p class="mb-4">Silahkan login atau register dulu untuk mengakses halaman ini.</p>
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Register</a>
                    </div>
                </div>
            </div>
        @endguest
    </div>
</x-app-layout>