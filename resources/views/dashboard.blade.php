<x-app-layout>
    <!-- Top Section -->
    <div class="grid grid-cols-1 lg:grid-cols-9 gap-6 max-w-7xl mx-auto p-6">
      <!-- Promo Box -->
      <div class="lg:col-span-5 bg-gray-200 rounded-xl flex items-center justify-between">
        <div class="ml-6">
          <h1 class="text-5xl font-bold mb-6">2000+ Jobs<br>Available</h1>
          <a href="#" class="inline-block border border-gray-700 px-4 py-2 rounded-md hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm hover:border-2">EXPLORE NOW</a>
        </div>
        <img src="images/hrwoman.png" alt="HR Woman" class="max-h-[380px] hidden md:block object-cover mr-6 mt-6">
      </div>

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
    </div>

    <!-- Saved Jobs -->
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-between items-center mb-2">
        <h2 class="font-semibold text-lg">Saved Jobs</h2>
        <a href="#" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Jobs →</a>
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
          <!-- Sisa tambahin saja, di tampilan maks hanya muncul 5 -->
        </div>
      </div>
    </div>
    
    <!-- New Jobs -->
    <div class="max-w-7xl mx-auto px-6 mt-6">
      <div class="flex justify-between items-center mb-2">
        <h2 class="font-semibold text-lg">New Jobs</h2>
        <a href="#" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Jobs →</a>
      </div>
      <div class="swiper new-swiper">
        <div class="swiper-wrapper">
          <!-- Slide -->
          <div class="swiper-slide bg-white rounded-xl p-4 w-64 shadow">
            <p class="font-semibold">Frontend Developer</p>
            <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded">Full Time</span>
            <div class="text-xs text-gray-500 mt-2 flex gap-5">
              <span>👥 420 Applicants</span>
              <span>👁️ 4200 Views</span>
            </div>
          </div>
          <!-- Sisa tambahin saja, di tampilan maks hanya muncul 5 -->
        </div>
      </div>
    </div>
    
    <!-- Explore Companies -->
    <div class="max-w-7xl mx-auto px-6 mt-6">
      <div class="flex justify-between items-center mb-2">
        <h2 class="font-semibold text-lg">Explore Companies</h2>
        <a href="#" class="text-sm text-neutral-700 hover:text-black hover:font-semibold transition duration-150 ease-in-out text-sm">View Other Companies →</a>
      </div>
      <div class="flex flex-wrap gap-4">
        <div class="bg-white flex items-center gap-2 px-4 py-2 rounded-md shadow text-sm">
          <img src="images/test1.png" class="w-5 h-5 object-contain rounded-full" /> Universitas Sumatera Utara
        </div>
        <div class="bg-white flex items-center gap-2 px-4 py-2 rounded-md shadow text-sm">
          <img src="images/logo2.png" class="w-5 h-5 object-contain rounded-full" /> Universitas Mikroskil
        </div>
        <div class="bg-white flex items-center gap-2 px-4 py-2 rounded-md shadow text-sm">
          <img src="images/logo3.png" class="w-5 h-5 object-contain rounded-full" /> PT Wilmar Nabati Indonesia
        </div>
        <div class="bg-white flex items-center gap-2 px-4 py-2 rounded-md shadow text-sm">
          <img src="images/logo4.png" class="w-5 h-5 object-contain rounded-full" /> PT Bank Mandiri Tbk
        </div>
      </div>
    </div>
</x-app-layout>
