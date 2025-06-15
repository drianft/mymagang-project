<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Hello, Deodarren
                </h2>
                <p class="text-sm text-gray-600 mt-1">Friday, 09 May 2025</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
                <div class="relative w-full sm:w-96">
                    <div class="relative text-gray-400">
                        <!-- Search icon -->
                        
                    
                        <!-- Input box -->
                        <input type="text" id="searchInput"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Search applicants..." />
                    </div>
                    
                </div>

                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <select id="statusFilter"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="all">All Statuses</option>
                        <option value="Under Review">Under Review</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Declined">Declined</option>
                        <option value="Interview Scheduled">Interview Scheduled</option>
                    </select>

                    <select id="positionFilter"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="all">All Positions</option>
                        <option value="Senior Developer">Senior Developer</option>
                        <option value="Product Designer">Product Designer</option>
                        <option value="Sales Manager">Sales Manager</option>
                        <option value="Office Administrator">Office Administrator</option>
                    </select>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="applicationsTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applicant</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Position</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applied On</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Education</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Experience</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="applicantsTableBody">
                            <!-- Application Row 1 -->
                            <tr class="hover:bg-gray-50 transition-colors applicant-row" data-status="Under Review"
                                data-position="Senior Developer">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                            <span class="text-blue-600 font-medium">AJ</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Andrian James Siregar</div>
                                            <div class="text-sm text-gray-500">andrianjin9@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Senior Developer</div>
                                    <div class="text-sm text-gray-500">Engineering</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">09/05/2025</div>
                                    <div class="text-sm text-gray-500">2 days ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Computer Science, MIT
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                        View details
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m9 5 7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-blue-800">
                                    Under Review
                                </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button
                                            class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Application Row 2 -->
                            <tr class="hover:bg-gray-50 transition-colors applicant-row" data-status="Accepted"
                                data-position="Product Designer">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                            <span class="text-purple-600 font-medium">JL</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">James Lebron</div>
                                            <div class="text-sm text-gray-500">jamesgaming1223@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Product Designer</div>
                                    <div class="text-sm text-gray-500">Design</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">08/05/2025</div>
                                    <div class="text-sm text-gray-500">3 days ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Visual Arts, NYU
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                        View details
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m9 5 7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Accepted
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Application Row 3 -->
                            <tr class="hover:bg-gray-50 transition-colors applicant-row" data-status="Declined"
                                data-position="Sales Manager">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                            <span class="text-red-600 font-medium">MS</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Michael Scott</div>
                                            <div class="text-sm text-gray-500">mscott@dundermifflin.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Sales Manager</div>
                                    <div class="text-sm text-gray-500">Sales</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">05/05/2025</div>
                                    <div class="text-sm text-gray-500">6 days ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Business Administration
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                        View details
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m9 5 7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Declined
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Application Row 4 -->
                            <tr class="hover:bg-gray-50 transition-colors applicant-row"
                                data-status="Interview Scheduled" data-position="Office Administrator">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <span class="text-yellow-600 font-medium">PD</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Pamela Beesly</div>
                                            <div class="text-sm text-gray-500">pbeesly@dundermifflin.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Office Administrator</div>
                                    <div class="text-sm text-gray-500">Operations</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">03/05/2025</div>
                                    <div class="text-sm text-gray-500">1 week ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Arts & Communication
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                        View details
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m9 5 7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Interview
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button
                                            class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#"
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of
                                <span class="font-medium">24</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                aria-label="Pagination">
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page"
                                    class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#"
                                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#"
                                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <span
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                    ...
                                </span>
                                <a href="#"
                                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    8
                                </a>
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <!-- Card 1 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-lg bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-500 ml-3">Total Applicants</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">169</div>
                        <div class="flex items-center">
                            <span class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                +32 From last month
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-lg bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-500 ml-3">Accepted</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">42</div>
                        <div class="flex items-center">
                            <span class="text-green-600 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                +8 From last month
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-lg bg-yellow-100">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-500 ml-3">Pending Review</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">87</div>
                        <div class="flex items-center">
                            <span class="text-red-600 text-sm font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 13a1 1 0 100-2H9.414l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 13H12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                -5 From last month
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const positionFilter = document.getElementById('positionFilter');
            const applicantRows = document.querySelectorAll('.applicant-row');

            function filterApplicants() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedStatus = statusFilter.value;
                const selectedPosition = positionFilter.value;

                applicantRows.forEach(row => {
                    const name = row.querySelector('td:first-child div.ml-4 div:first-child').textContent
                        .toLowerCase();
                    const email = row.querySelector('td:first-child div.ml-4 div:last-child').textContent
                        .toLowerCase();
                    const education = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    const status = row.dataset.status;
                    const position = row.dataset.position;

                    // Check search term
                    const matchesSearch = searchTerm === '' ||
                        name.includes(searchTerm) ||
                        email.includes(searchTerm) ||
                        education.includes(searchTerm);

                    // Check status filter
                    const matchesStatus = selectedStatus === 'all' || status === selectedStatus;

                    // Check position filter
                    const matchesPosition = selectedPosition === 'all' || position === selectedPosition;

                    // Show/hide row based on all filters
                    if (matchesSearch && matchesStatus && matchesPosition) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Add event listeners
            searchInput.addEventListener('input', filterApplicants);
            statusFilter.addEventListener('change', filterApplicants);
            positionFilter.addEventListener('change', filterApplicants);

            // Initialize the filter
            filterApplicants();
        });
    </script>
</x-app-layout>
