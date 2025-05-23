<!DOCTYPE html>
<html lang="en">
    <head>
          <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/User</title>
    @vite('resources/css/app.css') {{-- untuk project Laravel + Vite --}}
    </head>
<body class="bg-white">

    <div class="flex h-screen">
  <!-- Sidebar -->
@include('components.admin-sidebar')


        <!-- Main Content -->
           <main class="flex-1 p-6 bg-gray-100 bg-[#E8EBEE] overflow-y-auto">
               <div class="mt-4 p-6 bg-white rounded-lg shadow-md bg-[#E8EBEE]">
                 <h1 class="text-2xl font-semibold text-gray-900">Recent Application</h1>
                  </div>


             <main class="flex-1 p-6 bg-gray-100 bg-[#E8EBEE] overflow-y-auto">
               <div class="mt-4 p-6 bg-white rounded-lg shadow-md bg-[#E8EBEE]">
                  <div class="overflow-x-auto">
               <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr class="text-left">
                    <th class="pb-3 font-medium text-gray-500">Applicant</th>
                    <th class="pb-3 font-medium text-gray-500">Job Post</th>
                    <th class="pb-3 font-medium text-gray-500">Status</th>
                    <th class="pb-3 font-medium text-gray-500">Date</th>
                    <th class="pb-3 font-medium text-gray-500">Post</th>
                </tr>
                <tr><td colspan="5" class="border-b border-gray-200"></td></tr>
              </thead>
             <tbody class="divide-y divide-gray-200">

              @foreach($application as $application)
               <tr class="hover:bg-gray-50">
               <td class="py-4 text-sm font-medium text-gray-900">{{ $application->applicant_name }}</td>
               <td class="py-4 text-sm text-gray-600">{{ $application->job_title }}</td>
               <td class="py-4">
               <span class="px-2 py-1 text-xs font-medium rounded
               @if($application->status == 'Pending') bg-yellow-100 text-yellow-800
               @elseif($application->status == 'Interview') bg-blue-100 text-blue-800
               @elseif($application->status == 'Rejected') bg-red-100 text-red-800
               @else bg-green-100 text-green-800 @endif">
               {{ $application->status }}
               </span>
                </td>
                  <td class="py-4 text-sm text-gray-600">
                    {{ $application->date ? $application->date->format('d/m/Y') : '——' }}
                      </td>
                     <td class="py-4">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View</a>
                              </td>
                        </tr>
                @endforeach


                <!-- ini data dummy  -->
                <tr class="hover:bg-gray-50">
                    <td class="py-4 text-sm font-medium text-gray-900">Jhon Piter</td>
                    <td class="py-4 text-sm text-gray-600">Accounting Intern</td>
                    <td class="py-4">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-yellow-100 text-yellow-800">Pending</span>
                    </td>
                    <td class="py-4 text-sm text-gray-600">23/04/2025</td>
                    <td class="py-4">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="py-4 text-sm font-medium text-gray-900">James Smith</td>
                    <td class="py-4 text-sm text-gray-600">Software Engineer</td>
                    <td class="py-4">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-blue-100 text-blue-800">Interview</span>
                    </td>
                    <td class="py-4 text-sm text-gray-600">22/04/2025</td>
                    <td class="py-4">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>


                <tr class="hover:bg-gray-50">
                    <td class="py-4 text-sm font-medium text-gray-900">Barca</td>
                    <td class="py-4 text-sm text-gray-600">Graphic Designer</td>
                    <td class="py-4">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-red-100 text-red-800">Rejected</span>
                    </td>
                    <td class="py-4 text-sm text-gray-600">——</td>
                    <td class="py-4">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>


                <tr class="hover:bg-gray-50">
                    <td class="py-4 text-sm font-medium text-gray-900">Garnacho</td>
                    <td class="py-4 text-sm text-gray-600">Sales & Marketing</td>
                    <td class="py-4">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-yellow-100 text-yellow-800">Pending</span>
                    </td>
                    <td class="py-4 text-sm text-gray-600">20/04/2025</td>
                    <td class="py-4">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>


                <tr class="hover:bg-gray-50">
                    <td class="py-4 text-sm font-medium text-gray-900">Pedri</td>
                    <td class="py-4 text-sm text-gray-600">Accounting</td>
                    <td class="py-4">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-800">Accepted</span>
                    </td>
                    <td class="py-4 text-sm text-gray-600">20/04/2025</td>
                    <td class="py-4">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>
                </tbody>
                </table>
                <!-- sampai sini untuk data dummy -->

                         </div>
                      </div>
                </div>
               </div>
            </main>
    </div>

    <script>
        // Dropdown functionality
        document.querySelectorAll('button[aria-controls]').forEach(button => {
            button.addEventListener('click', () => {
                const isExpanded = button.getAttribute('aria-expanded') === 'true';
                const dropdownContent = document.getElementById(button.getAttribute('aria-controls'));

                button.setAttribute('aria-expanded', !isExpanded);
                dropdownContent.classList.toggle('hidden');
                button.querySelector('svg:last-child').classList.toggle('rotate-180');
            });
        });
    </script>
</body>
</html>
