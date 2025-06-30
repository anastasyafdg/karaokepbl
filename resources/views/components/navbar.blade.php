<!-- Tambahkan Google Font Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<header class="bg-blue-200 shadow-md font-[Inter]">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center">

      <!-- Menu Tengah -->
      <ul class="flex flex-1 justify-center items-center space-x-8 md:space-x-8 mx-auto text-lg font-semibold">
        <li>
          <a href="{{ route('landing') }}" class="text-gray-800 hover:text-yellow-400 transition-colors duration-300">Beranda</a>
        </li>
        <li>
          <a href="{{ route('ruangan.index') }}" class="text-gray-800 hover:text-yellow-400 transition-colors duration-300">Ruangan</a>
        </li>
        <li class="mx-4 md:mx-8">
          <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="h-12 w-12 rounded-full object-cover mx-auto shadow-md hover:scale-105 transition-transform duration-300">
        </li>
        <li>
          <a href="{{ route('ulasan') }}" class="text-gray-800 hover:text-yellow-400 transition-colors duration-300">Ulasan</a>
        </li>
        <li>
          <a href="{{ route('kontak') }}" class="text-gray-800 hover:text-yellow-400 transition-colors duration-300">Kontak</a>
        </li>
      </ul>

      <!-- Nama Aplikasi -->
      <header class="absolute top-4 left-4 space-x-8 md:space-x-8 mx-auto">
        <h1 class="text-2xl font-bold text-primary hover:text-blue-700 transition-colors duration-300 cursor-pointer tracking-wide">
          🎤 Mikkeu Pangpang
        </h1>
      </header>

      <!-- Profile Icon di Kanan -->
      <div class="relative ml-auto" x-data="{ open: false }" @click.away="open = false">
        <button @click="open = !open" class="focus:outline-none">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile"
            class="w-10 h-10 rounded-full border-2 border-blue-300 shadow hover:scale-105 transition-transform duration-300">
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="transform opacity-0 scale-95"
          x-transition:enter-end="transform opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="transform opacity-100 scale-100"
          x-transition:leave-end="transform opacity-0 scale-95"
          class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
          <a href="edit_profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">Edit Profil</a>
          <a href="riwayat" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">Riwayat Pemesanan</a>
          <hr class="border-gray-200 my-1">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
              Logout
            </button>
          </form>
        </div>
      </div>

    </div>
  </nav>
</header>

<!-- Tambahkan Alpine JS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
