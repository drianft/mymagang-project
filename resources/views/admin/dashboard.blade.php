<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css') {{-- untuk Laravel + Vite --}}
    <title>Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('components.admin-sidebar')

        {{-- Konten Utama --}}
        <main class="flex-1 p-6">
            {{-- Header --}}
            <h1 class="text-3xl font-bold mb-6">Welcome to the Dashboard</h1>

            {{-- Statistik Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white p-4 rounded shadow flex items-center">
                    <img src="{{ asset('images/JOB.svg') }}" alt="" class="w-10 h-10 bg-green-400 rounded-full p-2">
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Job Posting</h2>
                        <p>{{ $postCount }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded shadow flex items-center">
                    <img src="{{ asset('images/account.svg') }}" alt="" class="w-10 h-10 bg-orange-200 rounded-full p-2">
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Account</h2>
                        <p>{{ $userCount }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded shadow flex items-center">
                    <img src="{{ asset('images/company.svg') }}" alt="" class="w-10 h-10 bg-blue-400 rounded-full p-2">
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Company</h2>
                        <p>{{ $companyCount }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded shadow flex items-center">
                    <img src="{{ asset('images/applicant.svg') }}" alt="" class="w-10 h-10 bg-red-400 rounded-full p-2">
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Applicant</h2>
                        <p>{{ $applicationCount }}</p>
                    </div>
                </div>
            </div>

            {{-- Daftar Akun dan Recent Post --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Account List --}}
                <div class="bg-white rounded shadow overflow-y-auto max-h-[462px]">
                    <div class="sticky top-0 bg-white z-10 py-2 px-4 border-b">
                        <h2 class="text-xl font-semibold">Account List</h2>
                        <a href="#" class="text-blue-500 text-xs">view more..</a>
                    </div>
                    <table class="min-w-full text-left table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Joining Date</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">{{ $user->roles }}</td>
                                <td class="px-4 py-2">{{ $user->created_at->format('d-m-Y') }}</td>
                                <td class="px-4 py-2">
                                    <span class="{{ $user->status === 'active' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} text-xs px-2 py-1 rounded">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Recent Posts --}}
                <div class="bg-white rounded shadow p-4 max-h-[462px] overflow-y-auto">
                    <div class="sticky top-0 bg-white z-10 pb-2">
                        <h2 class="text-xl font-semibold">Recent Post</h2>
                    </div>

                    @foreach($posts as $post)
                    <div class="bg-[#e4e7ec] rounded-[25px] flex items-center px-4 py-3 mt-4">
                        <div class="w-16 h-16 bg-white rounded-md mr-4 shrink-0"></div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $post->job_title }}</h3>
                            <span class="text-xs px-2 py-1 rounded
                                {{ $post->working_hour === 'Full Time' ? 'bg-green-200 text-green-800' : 'bg-orange-200 text-orange-800' }}">
                                {{ $post->working_hour }}
                            </span>
                            <div class="mt-2 text-sm text-gray-600 flex gap-4">
                                <div>👥 420 Applicants</div>
                                <div>🔍 4200 Views</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</body>
</html>
