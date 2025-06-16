<x-app-layout>
    <h1>My Applications</h1>

    @foreach ($applications as $app)
        <div class="application-card">
            <strong>{{ $app->post->title }}</strong><br>
            Status: {{ $app->application_status }}

            @if ($app->application_status == 'interview')
                <!-- Tombol buka popup -->
                <button onclick="showInterview({{ $app->id }})">View Interview</button>

                <!-- Modal popup -->
                <div id="modal-{{ $app->id }}" class="modal" style="display:none;">
                    <div class="modal-content">
                        <span onclick="closeInterview({{ $app->id }})" class="close">&times;</span>
                        <h3>Interview Details</h3>
                        <p><strong>HR:</strong> {{ $app->interview->hr_name ?? '-' }}</p>
                        <p><strong>Time:</strong> {{ $app->interview->time ?? '-' }}</p>
                        <p><strong>Location:</strong> {{ $app->interview->location ?? '-' }}</p>
                    </div>
                </div>
            @endif
        </div>
    @endforeach

    <script>
        function showInterview(id) {
            document.getElementById('modal-' + id).style.display = 'block';
        }

        function closeInterview(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }
    </script>

    <style>
        .modal { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-content { background: white; margin: 15% auto; padding: 20px; width: 300px; position: relative; }
        .close { position: absolute; top: 5px; right: 10px; cursor: pointer; }
    </style>
</x-app-layout>