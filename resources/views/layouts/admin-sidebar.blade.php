<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar with Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="flex bg-gray-100 min-h-screen">

  <!-- Sidebar -->
  <aside style="background-color: #3A3C49; " class="w-64 shadow-md hidden md:block">
    <div class="p-4 text-xl font-semibold border-b">My Magang</div>
    <div style="background-color: #1B1C22" class="p-4 text-white">
        <div class="p-2 flex m-1">
            <img src="/logo" alt="logo" class="p-2 h-10 bg-white rounded-full w-10">
            <div class="p-1 m-0">
                <h1 class="text-sm">PT. Magang</h1>
                <h2 class="text-xs">Magang</h2>
            </div>
        </div>
    </div>
    <nav class="p-4 space-y-2">
    <h1 class="text-grey-500 font-bold"> MAIN </h1>
      <a href="#" class="block px-4 py-2 rounded text-white hover:bg-gray-100 hover:text-black ">🏠 Dashboard</a>
    <h1 class="text-grey-500 font-bold"> MANAGEMENT</h1>
      <a href="#" class="block px-4 py-2 rounded text-white hover:bg-gray-100 hover:text-black">📁 Job Posting</a>
      <a href="#" class="block px-4 py-2 rounded text-white hover:bg-gray-100 hover:text-black">📊 User Account</a>
      <a href="#" class="block px-4 py-2 rounded text-white hover:bg-gray-100 hover:text-black">⚙️ Companies</a>
      <a href="#" class="block px-4 py-2 rounded text-white hover:bg-gray-100 hover:text-black">⚙️ Applications</a>
    <h1 class="text-grey-500 font-bold"> SETTINGS</h1>
      <a href="#" class="block px-4 py-2 rounded text-white hover:bg-gray-100 hover:text-black">⚙️ Log Out</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 p-6 bg-[#E8EAEE]">
    @yield('content')
  </div>

  <!-- Mobile Sidebar (hidden by default) -->
  <div id="mobileSidebar" class="fixed top-0 left-0 w-64 h-full bg-white shadow-md z-50 hidden">
    <div class="p-4 text-xl font-semibold border-b flex justify-between items-center">
      My Dashboard
      <button id="closeBtn" class="text-gray-500 text-xl">&times;</button>
    </div>
    <nav class="p-4 space-y-2">
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">🏠 Home</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">📁 Projects</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">📊 Reports</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">⚙️ Settings</a>
    </nav>
  </div>

  <script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeBtn = document.getElementById('closeBtn');

    menuBtn.addEventListener('click', () => {
      mobileSidebar.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
      mobileSidebar.classList.add('hidden');
    });
  </script>

</body>
</html>

