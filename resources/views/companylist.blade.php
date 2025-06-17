<x-app-layout>
    <div class="bg-[#F9FAFB] py-12">
        <div class="mx-auto max-w-screen-xl px-6">

            {{-- Header Section --}}
            <div class="relative bg-[#F4F5F7] rounded-2xl px-10 py-14 lg:flex items-center justify-between shadow-md mb-12 overflow-hidden">
                {{-- Left Content --}}
                <div class="lg:max-w-xl z-10">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3 leading-tight">
                        Get To Know Companies Like Never Before
                    </h1>
                    <p class="text-gray-500 mb-6">
                        Quick, clear insights to help you choose wisely.
                    </p>
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center">
                        <input id="search-input" type="text"
                               placeholder="Search Jobs"
                               class="w-full sm:max-w-md px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                               value="{{ request('search') }}">
                        <button id="search-btn" class="mt-3 sm:mt-0 sm:ml-3 bg-[#5A48FA] text-white px-5 py-2 rounded-md hover:bg-indigo-700 transition">
                            Search
                        </button>
                    </div>
                </div>

                {{-- Right Content with Image & Decorations --}}
                <div class="relative mt-10 lg:mt-0 flex-1 lg:flex hidden justify-center transform translate-x-20">
                    <div class="relative w-[230px] h-[230px]">
                        <!-- Decorative Shapes -->
                        <div class="absolute w-6 h-6 bg-[#8A93B2] rounded-full top-2 right-2 z-0"></div>
                        <div class="absolute w-11 h-11 bg-[#8A93B2] rounded-full bottom-[-18px] left-[-38px] z-0"></div>
                        <div class="absolute w-12 h-12 bg-[#3A3C49] rounded-br-full bottom-[-18px] right-[-65px] z-0"></div>
                        <div class="absolute w-12 h-12 bg-[#3A3C49] rounded-tl-full top-[-18px] left-[-65px] z-0"></div>

                        <!-- HR Woman Image -->
                        <img src="{{ asset('images/hrwoman.png') }}"
                             alt="HR Woman"
                             class="w-full h-full object-cover rounded-full border-4 border-white shadow-lg relative z-10">
                    </div>
                </div>
            </div>

            {{-- Grid Section --}}
            <div id="company-grid-container">
                @include('companies.partials.company_grid', ['companies' => $companies])
            </div>

            {{-- Pagination Section --}}
            <div class="max-w-screen-xl mx-auto flex items-center justify-center gap-8 mt-10 text-base font-semibold"
                 x-data="{ page: {{ $companies->currentPage() }} }">

                {{-- Prev Button --}}
                <button
                    x-on:click="page = Math.max(1, page - 1); $refs['page' + page]?.click()"
                    class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
                    :disabled="page <= 1"
                >&lt;</button>

                {{-- Numbered Pagination --}}
                <div class="flex items-center gap-7">
                    <div class="flex items-center gap-4 w-[400px] justify-center">
                        @php
                            $current = $companies->currentPage();
                            $last = $companies->lastPage();
                            if ($current >= $last - 3) {
                                $start = $last - 4;
                                $end = $last;
                            } elseif ($current <= 4) {
                                $start = 1;
                                $end = min($last, 7);
                            } else {
                                $start = $current - 1;
                                $end = $current + 3;
                            }
                        @endphp

                        @if ($start > 1)
                            <a href="{{ $companies->appends(['search' => request('search')])->url(1) }}"
                               class="text-gray-700 hover:text-black"
                               x-ref="page1">1</a>
                            <span class="text-gray-400 text-xl font-bold px-2">. . .</span>
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i >= 1 && $i <= $last)
                                <a href="{{ $companies->appends(['search' => request('search')])->url($i) }}"
                                   x-ref="page{{ $i }}"
                                   class="{{ $current == $i ? 'bg-gray-800 text-white rounded-full px-4 py-2 min-w-[44px] text-center' : 'text-gray-700 hover:text-black px-4 py-2 min-w-[44px] text-center' }}">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor
                    </div>
                </div>

                {{-- Next Button --}}
                <button
                    x-on:click="page = Math.min({{ $last }}, page + 1); $refs['page' + page]?.click()"
                    class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
                    :disabled="page >= {{ $last }}"
                >&gt;</button>
            </div>

        </div>
    </div>

    {{-- Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('search-input');
            const button = document.getElementById('search-btn');

            button.addEventListener('click', function () {
                const searchTerm = input.value;

                fetch(`{{ route('companies') }}?search=${encodeURIComponent(searchTerm)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('company-grid-container').innerHTML = html;
                })
                .catch(error => console.error('Search failed:', error));
            });
        });
    </script>
</x-app-layout>
