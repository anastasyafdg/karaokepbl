<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mikkeu Pangpang Karaoke</title>

  <!-- Tailwind CSS + Flowbite -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flowbite@2.2.1/dist/flowbite.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-[#d3e2fc] min-h-screen flex items-center justify-center p-4">

  <!-- Main content area -->
  <main class="w-full max-w-screen-md mx-auto">
    @yield('content')
  </main>

</body>
</html>