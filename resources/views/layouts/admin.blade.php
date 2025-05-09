<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard Admin Karaoke')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

  {{-- Sidebar --}}
  @include('components.sidebar')

  {{-- Konten Utama --}}
  <div class="flex-1 flex flex-col">

    {{-- Navbar --}}
    @include('components.navbarAdm')

    {{-- Isi Konten --}}
    <main class="p-6">
      @yield('content')
    </main>

  </div>
</div>

</body>
</html>
