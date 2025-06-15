<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @endpush
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Top Section -->
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-6 p-6">
                <!-- Promo Box -->
                <div class="lg:col-span-5 bg-gray-200 rounded-xl flex items-center justify-between overflow-hidden">
                    <div class="ml-6 flex-shrink-0">
                        <h1 class="text-5xl font-bold mb-6">2000+ Applicants<br>Available</h1>
                    </div>
                    <div class="flex-shrink-0 h-full flex items-end">
                        <img src="https://static.vecteezy.com/system/resources/previews/024/558/262/non_2x/businessman-isolated-illustration-ai-generative-free-png.png"
                            alt="Professional illustration"
                            class="max-h-[300px] w-auto hidden md:block object-contain rounded-r-xl">
                    </div>
                </div>

                <!-- Applications -->
                <div class="lg:col-span-4 bg-gray-200 rounded-xl p-6 flex flex-col h-full">
                    <h2 class="text-lg text-center font-bold mb-4">Your Applications</h2>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center justify-between p-3 rounded-md ">
                            <div class="flex items-center gap-3">
                                <div class="relative w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300 flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face"
                                        alt="Pace Innocentius" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold truncate">Pace Innocentius</p>
                                    <p class="text-xs text-gray-500 truncate">Full-Stack Web Developer - Laravel</p>
                                </div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded flex-shrink-0">PENDING</span>
                        </li>

                        <li class="flex items-center justify-between  p-3 rounded-md shadow-sm hover:shadow transition">
                            <div class="flex items-center gap-3">
                                <div class="relative w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300 flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face"
                                        alt="Idnaw Ifoor" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold truncate">Idnaw Ifoor</p>
                                    <p class="text-xs text-gray-500 truncate">Frontend Developer</p>
                                </div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded flex-shrink-0">PENDING</span>
                        </li>

                        <li class="flex items-center justify-between  p-3 rounded-md shadow-sm hover:shadow transition">
                            <div class="flex items-center gap-3">
                                <div class="relative w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300 flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face"
                                        alt="Mbappe" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold truncate">Mbappe</p>
                                    <p class="text-xs text-gray-500 truncate">Marketing Assistant</p>
                                </div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded flex-shrink-0">PENDING</span>
                        </li>

                        <li class="flex items-center justify-between  p-3 rounded-md shadow-sm hover:shadow transition">
                            <div class="flex items-center gap-3">
                                <div class="relative w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300 flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=100&h=100&fit=crop&crop=face"
                                        alt="Steven Grant" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold truncate">Steven Grant</p>
                                    <p class="text-xs text-gray-500 truncate">Social Media Specialist</p>
                                </div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded flex-shrink-0">PENDING</span>
                        </li>
                    </ul>
                    <div class="flex justify-center mt-8">
                        <button type="submit" 
                                class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                            Go to Dashboard
                        </button>
                    </div>
                </div>
            </div>

            <!-- My Job Posts -->
            <div class="px-6 mt-6">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="font-semibold text-lg">My Job Posts</h2>
                    <a href="jobs"
                        class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition">View All Posts
                        →</a>
                </div>

                <div class="swiper saved-swiper">
                    <div class="swiper-wrapper">
                        <!-- Job Post Slides -->
                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div
                                class="w-full h-40 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg mb-3 flex items-center justify-center overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=300&h=200&fit=crop"
                                    alt="Frontend Developer" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">Frontend Developer</p>
                            <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part
                                Time</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 420 Applicants</span>
                                <span>👁️ 4200 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>

                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div class="w-full h-40 rounded-lg mb-3 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?w=300&h=200&fit=crop"
                                    alt="Backend Developer" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">Backend Developer</p>
                            <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded inline-block mt-1">Full
                                Time</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 85 Applicants</span>
                                <span>👁️ 1250 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>

                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div class="w-full h-40 rounded-lg mb-3 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=300&h=200&fit=crop"
                                    alt="UI/UX Designer" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">UI/UX Designer</p>
                            <span class="bg-indigo-500 text-indigo-800 text-xs px-2 py-1 rounded inline-block mt-1">Freelance</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 156 Applicants</span>
                                <span>👁️ 2100 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>
                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div class="w-full h-40 rounded-lg mb-3 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=300&h=200&fit=crop"
                                    alt="UI/UX Designer" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">UI/UX Designer</p>
                            <span
                                class="bg-purple-200 text-purple-800 text-xs px-2 py-1 rounded inline-block mt-1">Contract</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 156 Applicants</span>
                                <span>👁️ 2100 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>
                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div class="w-full h-40 rounded-lg mb-3 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=300&h=200&fit=crop"
                                    alt="UI/UX Designer" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">UI/UX Designer</p>
                            <span
                                class="bg-purple-200 text-purple-800 text-xs px-2 py-1 rounded inline-block mt-1">Contract</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 156 Applicants</span>
                                <span>👁️ 2100 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>
                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div class="w-full h-40 rounded-lg mb-3 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=300&h=200&fit=crop"
                                    alt="UI/UX Designer" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">UI/UX Designer</p>
                            <span
                                class="bg-purple-200 text-purple-800 text-xs px-2 py-1 rounded inline-block mt-1">Contract</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 156 Applicants</span>
                                <span>👁️ 2100 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-yellow-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>

                        <div class="swiper-slide bg-gray-100 rounded-xl p-4 shadow block" style="width: 256px;">
                            <div
                                class="w-full h-40 bg-gradient-to-br from-green-400 to-green-600 rounded-lg mb-3 flex items-center justify-center overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=300&h=200&fit=crop"
                                    alt="Marketing Manager" class="w-full h-full object-cover">
                            </div>
                            <p class="font-semibold">Marketing Manager</p>
                            <span
                                class="bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded inline-block mt-1">Remote</span>
                            <div class="text-xs text-gray-500 mt-2 flex gap-5">
                                <span>👥 234 Applicants</span>
                                <span>👁️ 3800 Views</span>
                            </div>
                            <div class="mt-2 flex gap-2">
                                <button
                                    class="bg-yellow-600 text-white text-xs px-2 py-1 rounded hover:bg-blue-700 transition">Edit</button>
                                <button
                                    class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700 transition">Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <!-- Improved Recent Applications Section -->
            <div class="px-6 mt-10">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Recent Applications</h2>
                    <a href="hr-dashboard" class="flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                        View All Applications
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <!-- Table-like header -->
                    <div class="grid grid-cols-12 gap-4 px-6 py-3 bg-gray-50 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="col-span-4">Candidate</div>
                        <div class="col-span-3">Position</div>
                        <div class="col-span-2">Applied Date</div>
                        <div class="col-span-2">Status</div>
                        <div class="col-span-1 text-right">Actions</div>
                    </div>

                    <!-- Application Items -->
                    <div class="divide-y divide-gray-200">
                        <!-- Application 1 -->
                        <div class="grid grid-cols-12 gap-4 items-center p-4 hover:bg-gray-50 transition-colors">
                            <div class="col-span-4 flex items-center space-x-4">
                                <div class="relative flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                         src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face" 
                                         alt="Sarah Johnson">
                                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white"></span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Sarah Johnson</p>
                                    <p class="text-sm text-gray-500">sarah@example.com</p>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <p class="text-gray-900 font-medium">Frontend Developer</p>
                                <p class="text-sm text-gray-500">Engineering</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-900">2 hours ago</p>
                                <p class="text-xs text-gray-500">Jun 12, 2023</p>
                            </div>
                            <div class="col-span-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    New Application
                                </span>
                            </div>
                            <div class="col-span-1 flex justify-end">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-50 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Application 2 -->
                        <div class="grid grid-cols-12 gap-4 items-center p-4 hover:bg-gray-50 transition-colors">
                            <div class="col-span-4 flex items-center space-x-4">
                                <div class="relative flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                         src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face" 
                                         alt="Michael Chen">
                                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white"></span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Michael Chen</p>
                                    <p class="text-sm text-gray-500">michael@example.com</p>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <p class="text-gray-900 font-medium">Backend Developer</p>
                                <p class="text-sm text-gray-500">Engineering</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-900">5 hours ago</p>
                                <p class="text-xs text-gray-500">Jun 12, 2023</p>
                            </div>
                            <div class="col-span-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    In Review
                                </span>
                            </div>
                            <div class="col-span-1 flex justify-end">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-50 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Application 3 -->
                        <div class="grid grid-cols-12 gap-4 items-center p-4 hover:bg-gray-50 transition-colors">
                            <div class="col-span-4 flex items-center space-x-4">
                                <div class="relative flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                         src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face" 
                                         alt="Emily Davis">
                                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white"></span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Emily Davis</p>
                                    <p class="text-sm text-gray-500">emily@example.com</p>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <p class="text-gray-900 font-medium">UI/UX Designer</p>
                                <p class="text-sm text-gray-500">Design</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-900">1 day ago</p>
                                <p class="text-xs text-gray-500">Jun 11, 2023</p>
                            </div>
                            <div class="col-span-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Shortlisted
                                </span>
                            </div>
                            <div class="col-span-1 flex justify-end">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-50 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Application 4 -->
                        <div class="grid grid-cols-12 gap-4 items-center p-4 hover:bg-gray-50 transition-colors">
                            <div class="col-span-4 flex items-center space-x-4">
                                <div class="relative flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face" 
                                         alt="David Wilson">
                                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-gray-300 ring-2 ring-white"></span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">David Wilson</p>
                                    <p class="text-sm text-gray-500">david@example.com</p>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <p class="text-gray-900 font-medium">Marketing Manager</p>
                                <p class="text-sm text-gray-500">Marketing</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-900">2 days ago</p>
                                <p class="text-xs text-gray-500">Jun 10, 2023</p>
                            </div>
                            <div class="col-span-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            </div>
                            <div class="col-span-1 flex justify-end">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-50 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- View All Button (Mobile) -->
                    <div class="px-4 py-3 bg-gray-50 text-center sm:hidden border-t border-gray-200">
                        <a href="hr-dashboard" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                            View All Applications
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            // Initialize Swiper
            document.addEventListener('DOMContentLoaded', function() {
                const swiper = new Swiper('.saved-swiper', {
                    slidesPerView: 'auto',
                    spaceBetween: 16,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 16,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 24,
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>