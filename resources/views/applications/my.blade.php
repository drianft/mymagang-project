<x-app-layout>
    <div class="min-w-full">
        <div class="max-w-6xl mx-auto p-6">
            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
            @endif

            <!-- Search + Filter -->
            <div class="flex justify-between items-center mb-4" id="filterForm">
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search jobs..." class="border px-3 py-2 rounded w-[450px]">
                <select name="status" id="statusFilter" class="border px-3 py-2 rounded w-[140px]">
                    <option value="">All Status</option>
                    <option value="accepted">Accepted</option>
                    <option value="pending">Pending</option>
                    <option value="interview">Interview</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <!-- Table + Pagination AJAX Wrapper -->
            <div id="ajaxWrapper">
                @include('applications._ajax', ['applications' => $applications])
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const ajaxWrapper = document.getElementById('ajaxWrapper');

        function fetchData(urlOrEvent = null) {
            let url = typeof urlOrEvent === 'string' ? urlOrEvent : null;
            const search = searchInput.value;
            const status = statusFilter.value;

            const fetchUrl = url ?? `/my-applications?search=${encodeURIComponent(search)}&status=${encodeURIComponent(status)}`;

            fetch(fetchUrl, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                ajaxWrapper.innerHTML = html;
                attachPaginationLinks();
                attachModalButtons();
            });
        }


        // Debounce input
        searchInput.addEventListener('input', () => {
            clearTimeout(window.typingTimer);
            window.typingTimer = setTimeout(fetchData, 300);
        });

        statusFilter.addEventListener('change', fetchData);

        function attachPaginationLinks() {
            document.querySelectorAll('#pagination a').forEach(link => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    fetchData(link.href);
                });
            });
        }

        // Init
        attachPaginationLinks();
        fetchData();

        function attachModalButtons() {
            document.querySelectorAll('[id^="modal-"]').forEach(modal => {
                modal.classList.add('hidden'); // jaga-jaga kalau udah kebuka sebelumnya
            });

            document.querySelectorAll('button[onclick^="showModal"]').forEach(btn => {
                const id = btn.getAttribute('onclick').match(/\d+/)[0];
                btn.onclick = () => {
                    document.getElementById(`modal-${id}`).classList.remove('hidden');
                };
            });

            document.querySelectorAll('button[onclick^="closeModal"]').forEach(btn => {
                const id = btn.getAttribute('onclick').match(/\d+/)[0];
                btn.onclick = () => {
                    document.getElementById(`modal-${id}`).classList.add('hidden');
                };
            });
        }
    </script>
</x-app-layout>
