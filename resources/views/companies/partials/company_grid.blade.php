<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
    @foreach($companies as $user)
        <a href="{{ route('company.show', $user->id) }}" class="block">
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