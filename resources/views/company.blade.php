<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            {{-- Hero Section --}}
            <div class="relative mb-20">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 via-purple-600/20 to-indigo-600/20 rounded-3xl blur-3xl"></div>
                <div class="relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 md:p-16 shadow-2xl border border-white/50">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                        <div class="flex-1 max-w-xl">
                            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-full px-4 py-2 mb-6">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-medium text-slate-700">Live Company Database</span>
                            </div>
                            <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent leading-tight mb-6">
                                Discover Your Next Career Move
                            </h1>
                            <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                                Explore top companies with deep insights, real reviews, and career opportunities tailored for you.
                            </p>
                            <div class="relative group">
                                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-300"></div>
                                <div class="relative flex items-center bg-white rounded-xl shadow-lg border border-slate-200">
                                    <div class="absolute left-5 text-slate-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="w-full pl-12 pr-5 py-5 text-lg bg-transparent focus:outline-none placeholder-slate-400" 
                                        placeholder="Search companies, jobs, or industries..."
                                        id="searchInput"
                                    >
                                    <button class="mr-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="absolute -inset-4 bg-gradient-to-r from-blue-400 to-indigo-600 rounded-full blur-2xl opacity-30 animate-pulse"></div>
                            <div class="relative">
                                <img 
                                    src="https://images.unsplash.com/photo-1521791055366-0d553872125f?auto=format&fit=crop&w=400&q=80" 
                                    alt="Business professionals" 
                                    class="w-80 h-80 rounded-full object-cover shadow-2xl border-4 border-white/50"
                                    onerror="this.src='https://via.placeholder.com/320x320/6366f1/ffffff?text=Professional+Network'">
                                <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full shadow-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Section --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/50 hover:bg-white/80 transition-all duration-300">
                    <div class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-2">500+</div>
                    <div class="text-slate-600 font-medium">Companies Listed</div>
                </div>
                <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/50 hover:bg-white/80 transition-all duration-300">
                    <div class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">10K+</div>
                    <div class="text-slate-600 font-medium">Job Opportunities</div>
                </div>
                <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/50 hover:bg-white/80 transition-all duration-300">
                    <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">98%</div>
                    <div class="text-slate-600 font-medium">User Satisfaction</div>
                </div>
            </div>

            {{-- Filters --}}
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-12">
                <div class="flex items-center gap-4">
                    <h2 class="text-2xl font-bold text-slate-800">Featured Companies</h2>
                    <div class="hidden sm:flex items-center gap-2 text-sm text-slate-500">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span>Updated daily</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <select class="px-6 py-3 bg-white/80 backdrop-blur-sm border-2 border-slate-200 rounded-xl text-slate-700 font-medium cursor-pointer focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 shadow-sm hover:shadow-md" id="categorySelect">
                        <option>All Categories</option>
                        <option>🏢 Technology</option>
                        <option>🎓 Education</option>
                        <option>🏦 Banking & Finance</option>
                        <option>🏥 Healthcare</option>
                        <option>⚡ Energy & Utilities</option>
                        <option>📊 Government</option>
                    </select>
                    <button class="px-4 py-3 bg-white/80 backdrop-blur-sm border-2 border-slate-200 rounded-xl hover:bg-white transition-all duration-200 shadow-sm hover:shadow-md" id="viewToggle">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Company Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-16" id="companyGrid">
                @php
                    $companies = [
                        ['name' => 'Universitas Sumatera Utara', 'category' => 'Education', 'img' => 'https://images.unsplash.com/photo-1580584121334-99e3284d8a49', 'rating' => 4.8, 'jobs' => 25],
                        ['name' => 'Universitas Mikroskil', 'category' => 'Education', 'img' => 'https://images.unsplash.com/photo-1605379399642-870262d3d051', 'rating' => 4.6, 'jobs' => 15],
                        ['name' => 'PT Wilmar Nabati Indonesia', 'category' => 'Manufacturing', 'img' => 'https://images.unsplash.com/photo-1590650046871-72ad84a78f6e', 'rating' => 4.5, 'jobs' => 42],
                        ['name' => 'PT Bank Mandiri Tbk', 'category' => 'Banking', 'img' => 'https://images.unsplash.com/photo-1592496001020-d31bd8306518', 'rating' => 4.7, 'jobs' => 38],
                        ['name' => 'Telkom Indonesia', 'category' => 'Technology', 'img' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf', 'rating' => 4.4, 'jobs' => 52],
                        ['name' => 'Indosat Ooredoo Hutchison', 'category' => 'Technology', 'img' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3', 'rating' => 4.3, 'jobs' => 31],
                        ['name' => 'Badan Pusat Statistik', 'category' => 'Government', 'img' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4', 'rating' => 4.2, 'jobs' => 18],
                        ['name' => 'BPJS Kesehatan', 'category' => 'Healthcare', 'img' => 'https://images.unsplash.com/photo-1581092915254-5fe040ac65b0', 'rating' => 4.1, 'jobs' => 22],
                        ['name' => 'Universitas Indonesia', 'category' => 'Education', 'img' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad', 'rating' => 4.9, 'jobs' => 35],
                        ['name' => 'GoTo Financial', 'category' => 'Technology', 'img' => 'https://images.unsplash.com/photo-1605902711622-cfb43c4437c1', 'rating' => 4.6, 'jobs' => 28],
                        ['name' => 'Pertamina', 'category' => 'Energy', 'img' => 'https://images.unsplash.com/photo-1605902712030-0b3b6dff63f8', 'rating' => 4.5, 'jobs' => 45],
                        ['name' => 'PLN (Perusahaan Listrik Negara)', 'category' => 'Energy', 'img' => 'https://images.unsplash.com/photo-1528460033278-a6ba57020470', 'rating' => 4.3, 'jobs' => 33],
                    ];
                @endphp

                @foreach($companies as $company)
                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border border-white/50 hover:border-blue-200 company-card" data-category="{{ $company['category'] }}">
                        <div class="flex items-start justify-between mb-4">
                            <div class="relative">
                                <img 
                                    src="{{ $company['img'] }}?auto=format&fit=crop&w=80&q=80" 
                                    alt="{{ $company['name'] }}" 
                                    class="w-16 h-16 rounded-xl object-cover shadow-md group-hover:scale-110 transition-transform duration-300"
                                    onerror="this.src='https://via.placeholder.com/64x64/6366f1/ffffff?text=Logo'">
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex items-center gap-1 bg-amber-50 px-2 py-1 rounded-full">
                                <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="text-sm font-semibold text-amber-700">{{ $company['rating'] }}</span>
                            </div>
                        </div>
                        
                        <h3 class="font-bold text-slate-800 text-lg mb-2 group-hover:text-blue-600 transition-colors duration-200">{{ $company['name'] }}</h3>
                        
                        <div class="flex items-center justify-between text-sm text-slate-600 mb-4">
                            <span class="bg-slate-100 px-3 py-1 rounded-full">{{ $company['category'] }}</span>
                            <span class="font-medium">{{ $company['jobs'] }} jobs</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-sm text-slate-500">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span>Actively hiring</span>
                            </div>
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Load More Button --}}
            <div class="text-center mb-16">
                <button class="px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Load More Companies
                </button>
            </div>

            {{-- Enhanced Pagination --}}
            <div class="flex justify-center items-center gap-4">
                <button class="p-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors duration-200" id="prevPage">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 5; $i++)
                        <button class="w-10 h-10 rounded-lg font-semibold transition-all duration-300 {{ $i === 1 ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-600 hover:bg-slate-100' }}" 
                                data-page="{{ $i }}">
                            {{ $i }}
                        </button>
                    @endfor
                </div>
                <button class="p-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors duration-200" id="nextPage">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .company-card:hover {
            animation: float 0.3s ease-in-out;
        }
        
        .company-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 1rem;
        }
        
        .company-card:hover::before {
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced pagination functionality
            const paginationButtons = document.querySelectorAll('[data-page]');
            const prevButton = document.getElementById('prevPage');
            const nextButton = document.getElementById('nextPage');
            let currentPage = 1;

            function updatePagination(page) {
                paginationButtons.forEach(btn => {
                    btn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg');
                    btn.classList.add('text-slate-600', 'hover:bg-slate-100');
                });
                
                const activeBtn = document.querySelector(`[data-page="${page}"]`);
                if (activeBtn) {
                    activeBtn.classList.remove('text-slate-600', 'hover:bg-slate-100');
                    activeBtn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-indigo-600', 'text-white', 'shadow-lg');
                }
                currentPage = page;
            }

            paginationButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    updatePagination(parseInt(btn.dataset.page));
                });
            });

            prevButton.addEventListener('click', () => {
                if (currentPage > 1) updatePagination(currentPage - 1);
            });

            nextButton.addEventListener('click', () => {
                if (currentPage < 5) updatePagination(currentPage + 1);
            });

            // Enhanced search functionality
            const searchInput = document.getElementById('searchInput');
            const companyCards = document.querySelectorAll('.company-card');

            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                let visibleCount = 0;
                
                companyCards.forEach((card, index) => {
                    const companyName = card.querySelector('h3').textContent.toLowerCase();
                    const category = card.dataset.category.toLowerCase();
                    const matches = companyName.includes(searchTerm) || category.includes(searchTerm);
                    
                    if (matches) {
                        card.style.display = 'block';
                        card.style.animationDelay = `${index * 50}ms`;
                        card.classList.add('animate-fade-in');
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('animate-fade-in');
                    }
                });

                // Show/hide no results message
                const grid = document.getElementById('companyGrid');
                let noResultsMsg = document.getElementById('noResults');
                
                if (visibleCount === 0 && searchTerm.length > 0) {
                    if (!noResultsMsg) {
                        noResultsMsg = document.createElement('div');
                        noResultsMsg.id = 'noResults';
                        noResultsMsg.className = 'col-span-full text-center py-16';
                        noResultsMsg.innerHTML = `
                            <div class="text-6xl mb-4">🔍</div>
                            <h3 class="text-xl font-semibold text-slate-700 mb-2">No companies found</h3>
                            <p class="text-slate-500">Try adjusting your search terms or browse all categories</p>
                        `;
                        grid.appendChild(noResultsMsg);
                    }
                } else if (noResultsMsg) {
                    noResultsMsg.remove();
                }
            });

            // Category filter functionality
            const categorySelect = document.getElementById('categorySelect');
            categorySelect.addEventListener('change', (e) => {
                const selectedCategory = e.target.value;
                
                companyCards.forEach(card => {
                    const cardCategory = card.dataset.category;
                    if (selectedCategory === 'All Categories' || selectedCategory.includes(cardCategory)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // View toggle functionality
            const viewToggle = document.getElementById('viewToggle');
            const companyGrid = document.getElementById('companyGrid');
            let isListView = false;

            viewToggle.addEventListener('click', () => {
                if (isListView) {
                    companyGrid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-16';
                    viewToggle.innerHTML = '<svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>';
                } else {
                    companyGrid.className = 'flex flex-col gap-4 mb-16';
                    viewToggle.innerHTML = '<svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>';
                }
                isListView = !isListView;
            });

            // Add subtle animations on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });

            companyCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</x-app-layout>