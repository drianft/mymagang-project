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
                <p>Content for card 1.</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/account.svg') }}" alt="" class="w-10 h-10 bg-orange-200 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Account</h2>
                <p>Content for card 2.</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/company.svg') }}" alt="" class="w-10 h-10 bg-blue-400 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Company</h2>
                <p>Content for card 3.</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 flex items-center">
            <img src="{{ asset('images/applicant.svg') }}" alt="" class="w-10 h-10 bg-red-400 rounded-full p-2">
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Applicant</h2>
                <p>Content for card 4.</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 mb-5 mt-5 h-61 gap-4">
        <div class="bg-white p-4 max-h-[462px] overflow-y-auto rounded shadow">
            <div class="sticky top-0 text-xl font-semibold bg-white py-2 z-10">
                <h2 class="text-xl font-semibold">Account List</h2>
                <a href="" class="text-blue-500 text-xs left-2">view more..</a>
            </div>
            <div>
                <table class="w-full text-left">
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
                        @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>

                        <!-- <td class="px-4 py-2">{{ ucfirst($user->role) }}</td> -->
                        <td class="px-4 py-2">
                        <form method="POST" action="{{ route('admin.users.updateRole', $user->id) }}">
                            @csrf
                            @method('PUT')
                                <select name="role" onchange="this.form.submit()" class="px-2 py-1 bg-gray-100 rounded-md text-sm focus:outline-none">
                                <option value="applier" {{ $user->role === 'applier' ? 'selected' : '' }}>Applier</option>
                                <option value="hr" {{ $user->role === 'hr' ? 'selected' : '' }}>HR</option>
                            </select>
                            </form>
                        </td>


                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y') }}</td>


                        <!-- <td class="px-4 py-2 capitalize">{{ $user->status }}</td> -->
                                <td class="px-4 py-2">
                            <form method="POST" action="{{ route('admin.users.updateStatus', $user->id) }}">
                                    @csrf
                                @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="px-2 py-1 bg-gray-100 rounded-md text-sm focus:outline-none">
                            <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            </form>
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
            <div class="w-[484px] h-[115px] bg-[#e4e7ec] rounded-[25px] flex items-center px-4 relative ml-10 mt-5">
                <!-- Rectangle putih di kiri (image placeholder) -->
                <div class="w-16 h-16 bg-white rounded-md mr-4 shrink-0"></div>
                <!-- Textual Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-semibold text-gray-800">Frontend Developer</h3>
                        <span class="bg-orange-200 text-orange-800 text-xs px-2 py-1 rounded">Part Time</span>
                    </div>

                    <div class="mt-2 text-sm text-gray-600 flex gap-4">
                        <div>👥 420 Applicants</div>
                        <div>🔍 4200 Views</div>
                    </div>
                </div>
            </div>

            <div class="w-[484px] h-[115px] bg-[#e4e7ec] rounded-[25px] flex items-center px-4 relative overflow-hidden ml-10 mt-5">
                <!-- Rectangle putih di kiri (image placeholder) -->
                <div class="w-16 h-16 bg-white rounded-md mr-4 shrink-0"></div>
                <!-- Textual Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-semibold text-gray-800">{{$posts->job_description}}</h3>
                        <span class="bg-orange-200 text-orange-800 text-xs px-2 py-1 rounded">Part Time</span>
                    </div>

                    <div class="mt-2 text-sm text-gray-600 flex gap-4">
                        <div>👥 420 Applicants</div>
                        <div>🔍 4200 Views</div>
                    </div>
                </div>
            </div>

            <div class="w-[484px] h-[115px] bg-[#e4e7ec] rounded-[25px] flex items-center px-4 relative overflow-hidden ml-10 mt-5">
                <!-- Rectangle putih di kiri (image placeholder) -->
                <div class="w-16 h-16 bg-white rounded-md mr-4 shrink-0"></div>
                <!-- Textual Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-semibold text-gray-800">Frontend Developer</h3>
                        <span class="bg-orange-200 text-orange-800 text-xs px-2 py-1 rounded">Part Time</span>
                    </div>

                    <div class="mt-2 text-sm text-gray-600 flex gap-4">
                        <div>👥 420 Applicants</div>
                        <div>🔍 4200 Views</div>
                    </div>
                </div>
            </div>

            <div class="w-[484px] h-[115px] bg-[#e4e7ec] rounded-[25px] flex items-center px-4 relative overflow-hidden ml-10 mt-5">
                <!-- Rectangle putih di kiri (image placeholder) -->
                <div class="w-16 h-16 bg-white rounded-md mr-4 shrink-0"></div>
                <!-- Textual Content -->
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-semibold text-gray-800">Frontend Developer</h3>
                        <span class="bg-orange-200 text-orange-800 text-xs px-2 py-1 rounded">Part Time</span>
                    </div>

                    <div class="mt-2 text-sm text-gray-600 flex gap-4">
                        <div>👥 420 Applicants</div>
                        <div>🔍 4200 Views</div>
                    </div>
                </div>
            </div>
        </div>

@endsection
