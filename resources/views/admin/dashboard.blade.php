@extends('layouts.admin-sidebar')

@section('title', 'Dashboard')

@section('content')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=description" />


    <button id="menuBtn" class="md:hidden mb-4 bg-blue-600 text-white px-4 py-2 rounded">
      Toggle Menu
    </button>
    <h1 class="p-2 bg-white text-2xl font-bold mb-4">Welcome to the Dashboard </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/JOB.svg') }}" alt="" class="w-10 h-10 bg-green-400 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Job Posting</h2>
                <p>{{ $postCount }}</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/account.svg') }}" alt="" class="w-10 h-10 bg-orange-200 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Account</h2>
                <p>{{$userCount}}</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/company.svg') }}" alt="" class="w-10 h-10 bg-blue-400 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Company</h2>
                <p>{{ $companyCount }}</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/applicant.svg') }}" alt="" class="w-10 h-10 bg-red-400 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Applicant</h2>
                <p>{{ $applicationCount }}</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 mb-5 mt-5 gap-4">
    <div class="bg-white rounded shadow overflow-x-auto max-h-[462px]">
        <div class="sticky top-0 text-xl font-semibold bg-white py-2 z-10">
            <h2 class="text-xl font-semibold ml-4 mt-2">Account List</h2>
            <a href="" class="text-blue-500 text-xs ml-4">view more..</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-max min-w-full text-left table-auto">
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
                        <td class="px-4 py-2">{{ $user->role }}</td>
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
    </div>




        <div class="bg-white max-h-[462px] overflow-y-auto rounded shadow pb-5">
            <div class="sticky  top-0 text-xl font-semibold bg-white py-2 z-10  ">
                <h2 class="ml-4 mt-2">Recent Post</h2>
            </div>

            @foreach($posts as $post)
            <div class="w-[484px] h-[115px] bg-[#e4e7ec] rounded-[25px] flex items-center px-4 relative overflow-hidden ml-10 mt-5">
                <!-- Rectangle putih di kiri (image placeholder) -->
                <div class="w-16 h-16 bg-white rounded-md mr-4 shrink-0"></div>

                <!-- Textual Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $post->job_description }}</h3>
                    </div>
                    <span class="
                        text-xs px-2 py-1 rounded
                        {{ $post->working_hour === 'Full Time' ? 'bg-green-200 text-green-800' : 'bg-orange-200 text-orange-800' }}
                    ">
                        {{ $post->working_hour }}
                    </span>

                    <div class="mt-2 text-sm text-gray-600 flex gap-4">
                        <div>👥 420 Applicants</div>
                        <div>🔍 4200 Views</div>
                    </div>
                </div>
            </div>
            @endforeach



@endsection
