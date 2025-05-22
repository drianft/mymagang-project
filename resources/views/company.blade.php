<x-app-layout>
    <style>
        .hero-section {
            background: linear-gradient(135deg, #e8ecf4 0%, #d4dceb 100%);
            border-radius: 20px;
            padding: 60px 40px;
            margin-bottom: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            flex: 1;
            max-width: 500px;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.2;
            margin-bottom: 16px;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
            color: #5a6c7d;
            margin-bottom: 32px;
            line-height: 1.5;
        }
        
        .search-container {
            position: relative;
            max-width: 400px;
        }
        
        .search-input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 16px;
            background: white;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            font-size: 18px;
        }
        
        .hero-image {
            flex-shrink: 0;
            position: relative;
            margin-left: 40px;
        }
        
        .hero-image img {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .floating-circle {
            position: absolute;
            width: 60px;
            height: 60px;
            background: #34495e;
            border-radius: 50%;
            bottom: -10px;
            right: -10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .controls {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 32px;
        }
        
        .category-select {
            padding: 12px 20px;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            background: white;
            font-size: 14px;
            color: #2c3e50;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .category-select:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .company-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
            margin-bottom: 40px;
        }
        
        .company-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .company-card:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        
        .company-logo {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }
        
        .company-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            line-height: 1.3;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 40px;
        }
        
        .pagination-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #bdc3c7;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .pagination-dot.active {
            background: #2c3e50;
            transform: scale(1.2);
        }
        
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
                padding: 40px 20px;
            }
            
            .hero-image {
                margin-left: 0;
                margin-top: 32px;
            }
            
            .hero-image img {
                width: 200px;
                height: 200px;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .company-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Hero Section --}}
            <div class="hero-section">
                <div class="hero-content">
                    <h1 class="hero-title">Get to Know Companies Like Never Before</h1>
                    <p class="hero-subtitle">Quick, clear insights to help you choose wisely.</p>
                    <div class="search-container">
                        <div class="search-icon">🔍</div>
                        <input type="text" class="search-input" placeholder="Search Jobs" id="searchInput">
                    </div>
                </div>
                <div class="hero-image">
                    <img src="/api/placeholder/280/280" alt="Business meeting handshake">
                    <div class="floating-circle"></div>
                </div>
            </div>

            {{-- Controls --}}
            <div class="controls">
                <select class="category-select" id="categorySelect">
                    <option>Categories</option>
                    <option>Technology</option>
                    <option>Education</option>
                    <option>Banking</option>
                    <option>Healthcare</option>
                </select>
            </div>

            {{-- Company Grid --}}
            <div class="company-grid" id="companyGrid">
                @php
                    $companies = [
                        'Universitas Sumatera Utara',
                        'Universitas Mikroskil',
                        'PT Wilmar Nabati Indonesia',
                        'PT Bank Mandiri Tbk',
                        'Universitas Sumatera Utara',
                        'Universitas Mikroskil',
                        'PT Wilmar Nabati Indonesia',
                        'PT Bank Mandiri Tbk',
                        'Universitas Sumatera Utara',
                        'Universitas Mikroskil',
                        'PT Wilmar Nabati Indonesia',
                        'PT Bank Mandiri Tbk'
                    ];
                @endphp

                @foreach($companies as $company)
                    <div class="company-card">
                        <img src="/api/placeholder/48/48" alt="{{ $company }}" class="company-logo">
                        <span class="company-name">{{ $company }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="pagination">
                @for($i = 1; $i <= 5; $i++)
                    <div class="pagination-dot {{ $i === 1 ? 'active' : '' }}" data-page="{{ $i }}"></div>
                @endfor
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pagination functionality
            document.querySelectorAll('.pagination-dot').forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    document.querySelectorAll('.pagination-dot').forEach(d => d.classList.remove('active'));
                    dot.classList.add('active');
                });
            });

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const companyCards = document.querySelectorAll('.company-card');
                
                companyCards.forEach(card => {
                    const companyName = card.querySelector('.company-name').textContent.toLowerCase();
                    if (companyName.includes(searchTerm)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Category filter functionality
            document.getElementById('categorySelect').addEventListener('change', (e) => {
                const selectedCategory = e.target.value;
                // Add your category filtering logic here
                console.log('Selected category:', selectedCategory);
            });
        });
    </script>
</x-app-layout>