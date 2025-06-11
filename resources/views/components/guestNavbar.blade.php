<nav class="bg-blue-200 text-black p-4">
  <div class="max-w-7xl mx-auto flex items-center justify-between relative">

    <!-- Tengah Navbar -->
    <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center space-x-8">

      <!-- Kiri Menu -->
      <div class="flex space-x-6">
        <a href="{{ url('dashboard1') }}" class="font-semibold hover:underline">Beranda</a>
        <a href="{{ url('login') }}" class="font-semibold hover:underline">Ruangan</a>
      </div>

      <!-- Logo -->
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-cover rounded-full">

      <!-- Kanan Menu -->
      <div class="flex space-x-6">
        <a href="{{ url('login') }}" class="font-semibold hover:underline">Ulasan</a>
        <a href="{{ url('kontak') }}" class="font-semibold hover:underline">Kontak</a>
      </div>
    </div>

    <!-- Pojok Kanan: Tombol Masuk -->
    <div class="ml-auto">
      <a href="{{ url('login') }}" class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-700 inline-block">Masuk</a>
    </div>

  </div>
</nav>
