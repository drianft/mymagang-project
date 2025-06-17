<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative bg-[#F4F5F7] rounded-2xl px-10 py-14 lg:flex items-center justify-between shadow-md mb-12 overflow-hidden">
            {{-- Left Content --}}
            <div class="lg:max-w-xl z-10">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3 leading-tight">
                    Your Saved Jobs in One Place
                </h1>
                <p class="text-gray-500 mb-6">
                    Review the jobs you've bookmarked and apply when you're ready.
                </p>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center">
                    <input type="text" id="search-input"
                           placeholder="Search Jobs"
                           class="w-full sm:max-w-md px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    <button id="search-button" class="mt-3 sm:mt-0 sm:ml-3 bg-[#5A48FA] text-white px-5 py-2 rounded-md hover:bg-indigo-700 transition">
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

        @if ($bookmarkedPosts->isEmpty())
            <p class="text-gray-500 text-center">You have no bookmarked jobs yet.</p>
        @else
        <div id="job-grid-container">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @include('bookmarked.partials.job_grid')
            </div>
        </div>
        @endif
    </div>

    <script>
document.addEventListener('DOMContentLoaded', () => {
    function fetchJobs() {
        const searchTerm = document.getElementById('search-input').value;

        const params = new URLSearchParams();
        if (searchTerm) params.append('search', searchTerm);

        fetch(`/bookmarked/search?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(res => res.text())
        .then(html => {
            document.querySelector('#job-grid-container').innerHTML = `
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    ${html}
                </div>`;
            attachBookmarkListeners(); // re-attach bookmark toggle listeners after reload
        })
        .catch(err => console.error('Fetch jobs error:', err));
    }

    document.getElementById('search-button').addEventListener('click', () => {
        fetchJobs();
    });

    // Attach bookmark toggle listeners (copas dari kamu)
    function attachBookmarkListeners() {
        document.querySelectorAll('.toggle-bookmark').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const postId = this.dataset.postId;
                const iconContainer = this.querySelector('.bookmark-icon');

                fetch('/bookmarks/toggle', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ post_id: postId }),
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'added') {
                        this.dataset.bookmarked = 'true';
                        iconContainer.innerHTML = solidIcon();
                    } else if (data.status === 'removed') {
                        this.dataset.bookmarked = 'false';
                        iconContainer.innerHTML = outlineIcon();

                        const postCard = this.closest('.relative.group');
                        if (postCard) postCard.remove();
                    }
                })
                .catch(err => console.error('Bookmark toggle error:', err));
            });
        });
    }

    function solidIcon() {
        return `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 24 24" class="w-6 h-6 text-blue-600">
                  <path fill-rule="evenodd"
                        d="M6.75 3A2.25 2.25 0 004.5 5.25v15.636a.75.75 0
                           001.14.64l6.36-3.816 6.36 3.816a.75.75 0
                           001.14-.64V5.25A2.25 2.25 0 0017.25 3H6.75z"
                        clip-rule="evenodd" />
               </svg>`;
    }

    function outlineIcon() {
        return `<svg xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.25 3.75H6.75A2.25 2.25 0 004.5
                           6v14.25l7.5-4.5 7.5 4.5V6a2.25
                           2.25 0 00-2.25-2.25z" />
               </svg>`;
    }

    // Run once on page load to attach bookmark listeners on initial content
    attachBookmarkListeners();
});

    </script>
</x-app-layout>
