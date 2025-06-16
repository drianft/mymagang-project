<x-app-layout>
    <div class="w-full">
        <!-- Hero background -->
        <img src="{{ asset('images/bgcompany.png') }}" alt="{{ asset('images/post_img_null.jpg') }}" class="w-full h-[400px] bg-cover bg-center relative">

        <div class="w-full bg-white pb-20">
            <!-- Card Utama -->
            <div class="max-w-6xl mx-auto overflow-visible relative">
                <div class="w-full border-b border-black">
                    <!-- Logo Bulat Absolute -->
                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-40 h-40 bg-[#2d2d35] rounded-full flex flex-col justify-center items-center text-white text-3xl font-bold absolute -top-20 left-10 border-[6px] border-white z-10">

                    <!-- Nama dan Sosial Media -->
                    <div class="pl-60 pt-8 pb-4">
                      <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                      <div class="flex items-center space-x-6 text-sm text-gray-600 mt-2">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{{ $user->email }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ $user->phone_number }}</span>
                        </div>
                      </div>
                    </div>
                </div>

              <!-- 2 Kolom Konten -->
              <div class="flex flex-col md:flex-row px-10 py-10 gap-10 text-sm px-4">

                <!-- Kiri: Info Kontak -->
                <div class="w-full md:w-1/3 space-y-4 text-gray-700">
                  <div>
                    <p class="font-semibold"><i class="fa-solid fa-location-dot pr-3"></i>Address:</p>
                    <p>{{ $user->address }}</p>
                  </div>
                  <div>
                    <p class="font-semibold"><i class="fa-solid fa-building pr-3"></i>Industry:</p>
                    <p>{{ ucfirst($user->company->industry) }}</p>
                  </div>
                  <div>
                    <p class="font-semibold"><i class="fa-solid fa-calendar pr-3"></i>Joined at:</p>
                    <p>{{ $user->company->created_at->format('d M Y') }}</p>
                  </div>
                </div>

                <!-- Kanan: Deskripsi -->
                <div class="w-full md:w-2/3 text-gray-700 space-y-4">
                  <p>
                    {{ $user->company->company_description }}
                  </p>
                </div>

              </div>
            </div>
          </div>


</x-app-layout>