<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mikkeu Pangpang Karaoke</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite CSS & JS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <!-- Font Awesome (optional) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-white min-h-screen flex flex-col">

  <!-- Navbar Guest -->
  @include('components.guestNavbar')

  <!-- Main Content -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('components.footer')

</body>
</html>
