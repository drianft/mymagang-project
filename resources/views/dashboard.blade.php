<x-app-layout>

    @php
        $user = Auth::user();
    @endphp
    @if(!$user || ($user && $user->roles == 'applier'))
   <!-- Top Section -->
    <div class="grid grid-cols-1 lg:grid-cols-9 gap-6 max-w-7xl mx-auto p-6">
        <!-- Promo Box -->
        <div class="lg:col-span-5 bg-gray-200 rounded-xl flex items-center justify-between">
            <div class="ml-6">
                <h1 class="text-5xl font-bold mb-6">2000+ Jobs<br>Available</h1>
                @auth
                <a href="{{ route('jobs') }}" class="inline-block border border-gray-700 px-4 py-2 rounded-md hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm hover:border-2">EXPLORE NOW</a>
                @endauth
                @guest
                <a href="{{ route('warnguest', ['page' => 'explore']) }}" class="inline-block border border-gray-700 px-4 py-2 rounded-md hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm hover:border-2">EXPLORE NOW</a>
                @endguest
            </div>
            <img src="{{ asset('images/hrwoman.png') }}" alt="HR Woman" class="max-h-[380px] hidden md:block object-cover mr-6 mt-6">
        </div>

        @auth
            <!-- Applications -->
            <div class="lg:col-span-4 bg-gray-200 rounded-xl p-6 flex flex-col h-full">
                <h2 class="text-lg text-center font-bold mb-4">Your Applications</h2>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                            <img src="images/test1.png" class="w-8 h-8 rounded-full" />
                            <div>
                                <p class="font-semibold">Universitas Sumatera Utara</p>
                                <p class="text-xs text-gray-500">Full-Stack Web Developer</p>
                            </div>
                            </div>
                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">ACCEPTED</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                            <img src="images/logo2.png" class="w-8 h-8 rounded-full" />
                            <div>
                                <p class="font-semibold">Universitas Mikroskil</p>
                                <p class="text-xs text-gray-500">Frontend Developer</p>
                            </div>
                            </div>
                            <span class="bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded">DECLINED</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                            <img src="images/logo3.png" class="w-8 h-8 rounded-full" />
                            <div>
                                <p class="font-semibold">PT Wilmar Nabati Indonesia</p>
                                <p class="text-xs text-gray-500">Marketing Assistant</p>
                            </div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded">PENDING</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                            <img src="images/logo4.png" class="w-8 h-8 rounded-full" />
                            <div>
                                <p class="font-semibold">PT Bank Mandiri Tbk</p>
                                <p class="text-xs text-gray-500">Social Media Specialist</p>
                            </div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded">PENDING</span>
                        </li>
                    </ul>
                <p class="text-lg text-center text-neutral-700 mt-auto cursor-pointer hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">Show more</p>
            </div>
        @endauth

        @guest
            <div class="lg:col-span-4 bg-gray-200 rounded-xl p-6 flex flex-col h-full items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mb-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 1.104-.896 2-2 2s-2-.896-2-2 .896-2 2-2 2 .896 2 2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19c-4 0-7-1.79-7-4v-1a4 4 0 018 0v1c0 2.21-3 4-7 4z" />
                </svg>
                <p class="mb-4 text-gray-600 text-center">Log in or sign up to check the status of your job application.</p>

                <!-- Tombol login dan register sejajar -->
                <div class="flex gap-4">
                    <button onclick="window.location='{{ route('login') }}'" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Login
                    </button>
                    <button onclick="window.location='{{ route('register') }}'" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                        Sign Up
                    </button>
                </div>
            </div>
        @endguest
    </div>


    <!-- Saved Jobs -->
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center mb-2">
            <h2 class="font-semibold text-lg">Saved Jobs</h2>
            @auth
                <a href="{{ route('jobs') }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Saved Jobs →</a>
            @endauth
            @guest
                <a href="{{ route('warnguest', ['page' => 'viewother']) }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Saved Jobs →</a>
            @endguest

        </div>
        <div class="swiper saved-swiper">
            <div class="swiper-wrapper">
                <!-- Slide -->
                <a href="#" class="swiper-slide bg-gray-100 rounded-xl p-4 w-64 shadow block">
                    <!-- Gambar -->
                    <div class="w-full h-40 bg-white rounded-lg mb-3"></div>
                    <p class="font-semibold">Frontend Developer</p>
                    <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part Time</span>
                    <div class="text-xs text-gray-500 mt-2 flex gap-5">
                        <span>👥 420 Applicants</span>
                        <span>👁️ 4200 Views</span>
                    </div>
                </a>


                <a href="#" class="swiper-slide bg-gray-100 rounded-xl p-4 w-64 shadow block">
                    <!-- Gambar -->
                    <img src="images/test1.png" class="w-full h-40 object-cover rounded-lg mb-3" alt="Job image">

                    <p class="font-semibold">Frontend Developer</p>
                    <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part Time</span>
                        <div class="text-xs text-gray-500 mt-2 flex gap-5">
                        <span>👥 420 Applicants</span>
                        <span>👁️ 4200 Views</span>
                    </div>
                </a>

                <a href="#" class="swiper-slide bg-gray-100 rounded-xl p-4 w-64 shadow block">
                    <!-- Gambar -->
                    <img src="images/test2.png"
                    class="w-full h-40 object-cover rounded-lg mb-3"
                    alt="Job image">

                    <p class="font-semibold">Frontend Developer</p>
                    <span class="bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded inline-block mt-1">Part Time</span>
                    <div class="text-xs text-gray-500 mt-2 flex gap-5">
                        <span>👥 420 Applicants</span>
                        <span>👁️ 4200 Views</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- New Jobs -->
    <div class="max-w-7xl mx-auto px-6 mt-6">
        <div class="flex justify-between items-center mb-2">
            <h2 class="font-semibold text-lg">New Jobs</h2>
            @auth
                <a href="{{ route('jobs') }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Jobs →</a>
            @endauth
            @guest
                <a href="{{ route('warnguest', ['page' => 'viewother']) }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Jobs →</a>
            @endguest
        </div>

        <div class="swiper new-swiper">
            <div class="swiper-wrapper">
                @foreach($posts as $post)
                @auth
                    <a href="{{ route('posts.show', $post->id) }}" class="swiper-slide bg-gray-100 rounded-xl p-4 border shadow hover:shadow-md transition-all h-80 flex flex-col justify-between relative">
                @endauth
                @guest
                    <a href="{{ route('warnguest', ['page' => 'postdesc']) }}" class="swiper-slide bg-gray-100 rounded-xl p-4 border shadow hover:shadow-md transition-all h-80 flex flex-col justify-between relative">
                @endguest

                        {{-- Gambar --}}
                        <div class="h-40 w-full bg-gray-100 flex items-center justify-center mb-2 overflow-hidden">
                            @if ($post->image)
                                <img src="{{ asset('storage/job-images/' . $post->image) }}" alt="Job Image" class="object-cover w-full h-full">
                            @else
                                <img src="{{ asset('images/post_img_null.jpg') }}" alt="Default Image" class="object-cover w-full h-full">
                            @endif
                        </div>

                        {{-- Title --}}
                        <div class="mb-2 font-semibold text-sm text-gray-800">
                            {{ $post->job_title }}
                        </div>

                        {{-- Job Type Badge --}}
                        <span class="text-xs px-2 py-1 mb-[40px] inline-block rounded font-medium
                            {{ $post->job_type === 'full-time' ? 'bg-green-100 text-green-700' :
                               ($post->job_type === 'part-time' ? 'bg-orange-100 text-orange-700' : 'bg-gray-300 text-gray-700') }}">
                            {{ ucfirst($post->job_type) }}
                        </span>

                        {{-- Stats --}}
                        <div class="mt-3 text-xs text-gray-500 flex justify-between absolute bottom-5 left-4 right-4">
                            <div>{{ $post->total_appliers }} Applicants</div>
                            <div>{{ $post->total_views }} Views</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


  <!-- Explore Companies -->
  <div class="max-w-7xl mx-auto px-6 mt-6">
    <div class="flex justify-between items-center mb-2">
      <h2 class="font-semibold text-lg">Explore Companies</h2>
      @auth
        <a href="{{ route('companies') }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Companies →</a>
      @endauth
      @guest
        <a href="{{ route('warnguest', ['page' => 'viewother']) }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Companies →</a>
      @endguest
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
        @foreach($companies as $user)
            @auth
                <a href="{{ route('company.show', $user->id) }}" class="block">
            @endauth
            @guest
                <a href="{{ route('warnguest', ['page' => 'desc']) }}" class="block">
            @endguest
                <div class="w-full bg-gray-100 rounded-xl p-3 flex items-center space-x-4 hover:shadow-md transition-all">
                    {{-- Logo perusahaan --}}
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white flex items-center justify-center overflow-hidden">
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="object-cover w-full h-full">
                    </div>

                    {{-- Detail perusahaan --}}
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-sm text-gray-900 truncate">
                            {{ $user->name }}
                        </div>

                        <div class="flex items-center space-x-2 mt-1">
                            <span class="text-xs font-medium px-2 py-0.5 rounded
                                {{ match($user->industry) {
                                    'tech' => 'bg-blue-100 text-blue-700',
                                    'finance' => 'bg-indigo-100 text-indigo-700',
                                    'healthcare' => 'bg-green-100 text-green-700',
                                    'education' => 'bg-purple-100 text-purple-700',
                                    'sales' => 'bg-pink-100 text-pink-700',
                                    'engineering' => 'bg-orange-100 text-orange-700',
                                    'law' => 'bg-gray-300 text-gray-800',
                                    'fnb' => 'bg-yellow-100 text-yellow-700',
                                    'logistic' => 'bg-amber-100 text-amber-700',
                                    default => 'bg-slate-100 text-slate-700',
                                } }}">
                                {{ ucfirst($user->industry) }}
                            </span>
                        </div>

                        {{-- Lokasi atau info tambahan --}}
                        <p class="text-xs text-gray-500 mt-1 truncate">
                            {{ $user->address ?? 'Alamat tidak tersedia' }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

  </div>

{{-- Cek jika user adalah admin --}}
@elseif(auth()->user()->roles == 'admin')

{{-- Konten Utama --}}
<main class="flex-1 p-8">

    {{-- Header --}}
    <h1 class="text-4xl font-bold mb-8">Welcome to the Dashboard</h1>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <img src="{{ asset('images/JOB.svg') }}" alt="" class="w-12 h-12 bg-green-400 rounded-full p-2">
            <div class="ml-5">
                <h2 class="text-xl font-semibold">Job Posting</h2>
                <p>{{ $postCount }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <img src="{{ asset('images/account.svg') }}" alt="" class="w-12 h-12 bg-orange-200 rounded-full p-2">
            <div class="ml-5">
                <h2 class="text-xl font-semibold">Account</h2>
                <p>{{ $userCount }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <img src="{{ asset('images/company.svg') }}" alt="" class="w-12 h-12 bg-blue-400 rounded-full p-2">
            <div class="ml-5">
                <h2 class="text-xl font-semibold">Company</h2>
                <p>{{ $companyCount }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <img src="{{ asset('images/applicant.svg') }}" alt="" class="w-12 h-12 bg-red-400 rounded-full p-2">
            <div class="ml-5">
                <h2 class="text-xl font-semibold">Applicant</h2>
                <p>{{ $applicationCount }}</p>
            </div>
        </div>

    </div>

    {{-- Daftar Akun dan Recent Post --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Account List --}}
        <div class="bg-white rounded-lg shadow overflow-y-auto max-h-[500px]">
            <div class="sticky top-0 bg-white z-10 py-4 px-6 border-b">
                <h2 class="text-2xl font-semibold">Account List</h2>
                <a href="#" class="text-blue-500 text-sm">View More..</a>
            </div>
            <table class="min-w-full bg-white text-left table-auto">
                <thead class="sticky top-[90px] bg-white text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Joining Date</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach($users as $account)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $account->name }}</td>
                        <td class="px-6 py-4">{{ $account->email }}</td>
                        <td class="px-6 py-4">{{ ucfirst($account->roles) }}</td>
                        <td class="px-6 py-4">{{ $account->created_at->format('d-m-Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="{{ $account->status === 'active' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} text-sm px-3 py-1 rounded-full">
                                {{ ucfirst($account->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Recent Posts --}}
        <div class="bg-white rounded-lg shadow px-6 max-h-[500px] overflow-y-auto">
            <div class="sticky top-0 bg-white z-10 w-full h-20 pb-4 pt-6 border-b border-black-100">
                <h2 class="text-2xl font-semibold">Recent Post</h2>
            </div>

            @foreach($posts as $post)
            <div class="bg-[#e4e7ec] rounded-[25px] flex items-center px-6 py-4 mt-5">
                <img src="{{ $post->image_post_url != null ? asset('storage/job-images/' . $post->image) : asset('images/post_img_null.jpg') }}" class="w-50 h-20 rounded-md mr-6 shrink-0"></img>
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->job_title }}</h3>
                    <span class="text-sm px-3 py-1 rounded-md
                        {{ $post->job_type === 'full-time' ? 'bg-green-200 text-green-800' : 'bg-orange-200 text-orange-800' }}">
                        {{ ucfirst($post->job_type) }}
                    </span>
                    <div class="mt-3 text-sm text-gray-600 flex gap-6">
                        <div>👥 {{ $post->total_appliers }} Appliers</div>
                        <div>🔍 {{ $post->total_views }} Views</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</main>



@elseif($user->roles == 'hr')
    @include('hr.dashboard')
@elseif($user->roles == 'company')
    @include('company.dashboard')
@endif

</x-app-layout>
