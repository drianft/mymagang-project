@forelse ($applications as $app)
<tr class="border-t application-row" data-status="{{ strtolower($app->application_status) }}">
    <td class="px-4 py-2">{{ $app->post->job_title ?? '-' }}</td>
    <td class="px-4 py-2">
        @php
            $status = $app->application_status;
            $colorClass = match($status) {
                'pending' => 'bg-yellow-100 text-yellow-800',
                'interview' => 'bg-blue-100 text-blue-800',
                'rejected' => 'bg-red-100 text-red-800',
                'accepted' => 'bg-green-100 text-green-800',
                default => 'bg-gray-100 text-gray-800',
            };
        @endphp

        <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $colorClass }}">
            {{ ucfirst($status) }}
        </span>
    </td>
    <td class="px-4 py-2">{{ $app->post->company->user->name }}</td>
    <td class="px-4 py-2">{{ $app->created_at->format('d M Y') }}</td>
    <td class="px-4 py-2">
        @if (in_array($app->application_status, ['interview', 'accepted', 'rejected']))
        <button onclick="showModal({{ $app->id }})" class="text-blue-400 px-3 py-1 hover:text-blue-700 transition">
            View
        </button>

        <!-- Modal -->
        <div id="modal-{{ $app->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 shadow-lg w-96 relative text-center">
                <button onclick="closeModal({{ $app->id }})" class="absolute top-2 right-3 text-gray-600 text-xl font-bold">&times;</button>

                @if ($app->application_status == 'interview')
                    <h3 class="text-2xl font-bold text-blue-600 mb-2">🗓️ Interview Scheduled!</h3>
                    <p class="text-gray-700 mb-4">
                        Great news! You've been selected for an interview for the position of <strong>{{ $app->post->job_title }}</strong>. <br>
                        Please review the details below and make sure to be prepared!
                    </p>
                    <div class="space-y-2 text-left">
                        <div class="flex">
                            <span class="w-24 font-semibold">HR</span>
                            <span class="text-gray-700">: {{ $app->interview->hr->user->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-24 font-semibold">Time</span>
                            <span class="text-gray-700">: {{ $app->interview->interview_time }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-24 font-semibold">Location</span>
                            <span class="text-gray-700">: {{ $app->interview->location }}</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500">
                        📌 Tip: Dress professionally, arrive 10 minutes early, and don’t forget to bring a copy of your resume!
                    </p>
                @elseif ($app->application_status == 'accepted')
                    <h3 class="text-2xl font-bold text-green-600 mb-2">🎉 Congratulations!</h3>
                    <p class="text-gray-700">You have been <strong>accepted</strong> for the job <br> <strong>{{ $app->post->job_title }}</strong>. <br> We'll contact you shortly for the next steps.</p>
                @elseif ($app->application_status == 'rejected')
                    <h3 class="text-2xl font-bold text-red-600 mb-2">We're Sorry 😔</h3>
                    <p class="text-gray-700">You were not selected for <strong>{{ $app->post->job_title }}</strong>.<br> But don't give up — keep applying and stay motivated!</p>
                @endif
            </div>
        </div>
    @else
        <span class="text-gray-400 px-3 py-1">View</span>
    @endif

    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-gray-500 px-4 py-6">You haven't applied to any jobs yet.</td>
</tr>
@endforelse