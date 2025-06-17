<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Home') }}
        </h2>
    </x-slot>

    <!-- Top Section -->
    <div class="max-w-7xl mx-auto p-6">
        <!-- Promo Box -->
        <!-- Promo Box -->
        <div
            class="w-full max-w-6xl bg-white rounded-2xl flex flex-col md:flex-row items-center justify-between mx-auto overflow-hidden shadow-md border border-gray-200">

            <!-- Company Logo -->
            <div class="md:w-1/2 p-6 flex justify-center items-center bg-gray-50">
                <img src="{{ asset('images/logoCompany.jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('images/post_img_null.jpg') }}';"
                    class="w-full h-72 md:h-96 object-cover rounded-lg shadow-sm border border-gray-300"
                    alt="Company Logo">
            </div>

            <!-- Company Info -->
            <div class="md:w-1/2 p-8 space-y-4">
                <!-- Name -->
                <h1 class="text-4xl md:text-5xl font-semibold text-gray-800">
                    {{ $company->user->name }}
                </h1>

                <!-- Description (manual 3-line truncate effect) -->
                <div class="text-gray-700 text-lg leading-relaxed overflow-hidden relative" style="max-height: 4.5em;">
                    <p class="overflow-hidden text-ellipsis whitespace-normal break-words">
                        {{ $company->company_description }}
                    </p>

                    <!-- Fade gradient -->
                    <div class="absolute bottom-0 left-0 w-full h-6 bg-gradient-to-t from-white to-transparent"></div>
                </div>

                <!-- CTA -->
                <button
                    class="px-6 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-900 transition">
                    MANAGE PROFILE
                </button>
            </div>
        </div>



        <!-- Saved Jobs -->
        <div class="mt-10 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-2">
                <h2 class="font-semibold text-lg">Your Posts</h2>
                @auth
                    <a href="{{ route('jobs') }}"
                        class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View
                        Your Jobs →</a>
                @endauth
                @guest
                    <a href="{{ route('warnguest', ['page' => 'viewother']) }}"
                        class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View
                        Your Jobs →</a>
                @endguest
            </div>

            <div class="swiper saved-swiper">
                <div class="swiper-wrapper">
                    <!-- Slide -->
                    <a href="#" class="swiper-slide bg-gray-100 rounded-xl p-4 w-64 shadow block">
                        <div class="w-full h-40 bg-white rounded-lg mb-3"></div>
                        <p class="font-semibold">Frontend Developer</p>
                        <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part
                            Time</span>
                        <div class="text-xs text-gray-500 mt-2 flex gap-5">
                            <span>👥 420 Applicants</span>
                            <span>👁️ 4200 Views</span>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide bg-gray-100 rounded-xl p-4 w-64 shadow block">
                        <img src="{{ asset('images/test1.png') }}" class="w-full h-40 object-cover rounded-lg mb-3"
                            alt="Job image">
                        <p class="font-semibold">Frontend Developer</p>
                        <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part
                            Time</span>
                        <div class="text-xs text-gray-500 mt-2 flex gap-5">
                            <span>👥 420 Applicants</span>
                            <span>👁️ 4200 Views</span>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide bg-gray-100 rounded-xl p-4 w-64 shadow block">
                        <img src="{{ asset('images/test2.png') }}" class="w-full h-40 object-cover rounded-lg mb-3"
                            alt="Job image">
                        <p class="font-semibold">Frontend Developer</p>
                        <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part
                            Time</span>
                        <div class="text-xs text-gray-500 mt-2 flex gap-5">
                            <span>👥 420 Applicants</span>
                            <span>👁️ 4200 Views</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
