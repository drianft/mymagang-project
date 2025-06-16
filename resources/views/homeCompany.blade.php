  <!-- Top Section -->
  <div class="max-w-7xl mx-auto p-6">
    <!-- Promo Box -->
    <div class="w-full max-w-6xl bg-gray-200 rounded-xl flex items-center justify-between mx-auto">
      <div class="ml-6 mb-8">
        <img src="{{ asset('images/logoCompany.jpg') }}" class="max-h-[380px] hidden md:block object-cover mr-6 mt-6 rounded-xl">
      </div>
      <div class="flex-1">
        <h1 class="text-5xl font-semibold mb-2">{{$user->name}}</h1>
        <p class="text-gray-700 mb-4 text-lg leading-relaxed">
          {{$user->company->company_description}}
        </p>
        <button class="px-5 py-2 bg-white border border-gray-600 rounded-lg text-sm text-gray-800 hover:bg-gray-300 hover:text-black font-medium shadow-sm transition duration-150">
          MANAGE PROFILE
        </button>
      </div>
    </div>

    <!-- Saved Jobs -->
    <div class="mt-10 max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center mb-2">
            <h2 class="font-semibold text-lg">Your Posts</h2>
            @auth
                <a href="{{ route('jobs') }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Your Jobs →</a>
            @endauth
            @guest
                <a href="{{ route('warnguest', ['page' => 'viewother']) }}" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Your Jobs →</a>
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