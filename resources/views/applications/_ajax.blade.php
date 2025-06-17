{{-- Table --}}
<table class="min-w-full bg-white border rounded shadow">
    <thead>
        <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
            <th class="px-4 py-2">Job Title</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Company</th>
            <th class="px-4 py-2">Applied On</th>
            <th class="px-4 py-2">Interview</th>
        </tr>
    </thead>
    <tbody id="appTable">
        @include('applications._table')
    </tbody>
</table>

{{-- Pagination --}}
<div id="pagination" class="max-w-screen-xl mx-auto flex items-center justify-center gap-8 mt-10 text-base font-semibold" x-data="{ page: {{ $applications->currentPage() }} }">
    {{-- Prev --}}
    <button
        x-on:click="page = Math.max(1, page - 1); $refs['page' + page]?.click()"
        class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
        :disabled="page <= 1"
    >
        &lt;
    </button>

    {{-- Page numbers --}}
    <div class="flex items-center gap-7">
        <div class="flex items-center gap-4 w-[400px] justify-center">
            @php
                $current = $applications->currentPage();
                $last = $applications->lastPage();
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
                <a href="{{ $applications->url(1) }}" class="text-gray-700 hover:text-black" x-ref="page1">1</a>
                <span class="text-gray-400 text-xl font-bold px-2">. . .</span>
            @endif

            @for ($i = $start; $i <= $end; $i++)
                @if ($i >= 1 && $i <= $last)
                    <a href="{{ $applications->url($i) }}"
                       x-ref="page{{ $i }}"
                       class="{{ $current == $i ? 'bg-gray-800 text-white rounded-full px-4 py-2 min-w-[44px] text-center' : 'text-gray-700 hover:text-black px-4 py-2 min-w-[44px] text-center' }}">
                        {{ $i }}
                    </a>
                @endif
            @endfor
        </div>
    </div>

    {{-- Next --}}
    <button
        x-on:click="page = Math.min({{ $last }}, page + 1); $refs['page' + page]?.click()"
        class="px-4 py-2 text-gray-500 hover:text-black disabled:text-gray-300"
        :disabled="page >= {{ $last }}"
    >
        &gt;
    </button>
</div>
