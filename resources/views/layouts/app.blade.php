<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mikkeu Pangpang Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-900">
  @include('components.navbar')

  @auth
    @if (Auth::user()->role == 'pengunjung')
      <div class="text-white text-center py-2 bg-blue-800">
          Selamat datang, {{ Auth::user()->nama }}
      </div>
    @endif
  @endauth

  <main>
    @yield('content')
  </main>

  @include('components.footer')
</body>
</html>