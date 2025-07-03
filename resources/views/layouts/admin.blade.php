<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard Admin Karaoke')</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 font-sans">

 <div class="flex">

  <!-- Sidebar -->
  @include('components.sidebar')

  <!-- Konten Utama -->
  <div class="ml-48 flex-1 min-h-screen">

    <!-- Navbar -->
    @include('components.navbarAdm')

    <!-- Bar sambutan -->
    @auth
      @if (Auth::user()->role == 'admin') 
        <div class="mt-20 text-white text-center py-2 bg-green-600">
          Selamat datang, {{ Auth::user()->nama }}
        </div>
      @endif
    @endauth

    <!-- Konten -->
    <main class="p-6 mt-20">
      @yield('content')
    </main>

  </div>
</div>


  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
