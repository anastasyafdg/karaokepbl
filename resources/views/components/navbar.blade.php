<!-- Google Font Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<header class="bg-blue-200 shadow-md font-[Inter]" x-data="{ open: false, profileOpen: false }">
  <nav class="container mx-auto px-4 py-4 relative flex items-center justify-between">

    <!-- POJOK KIRI: Mikkeu Pangpang -->
    <div class="flex items-center space-x-2">
      <button @click="open = !open" class="md:hidden mr-2 focus:outline-none">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      <h1 class="text-xl md:text-2xl font-bold text-primary hover:text-blue-700 transition-colors cursor-pointer tracking-wide">
        🎤 Mikkeu Pangpang
      </h1>
    </div>

    <!-- TENGAH (absolute center): Menu + Logo -->
    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 items-center space-x-8 text-lg font-semibold">
      <a href="{{ route('landing') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Beranda</a>
      <a href="{{ route('ruangan.index') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Ruangan</a>
      <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang"
        class="h-12 w-12 rounded-full object-cover shadow-md hover:scale-105 transition-transform duration-300">
      <a href="{{ route('ulasan') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Ulasan</a>
      <a href="{{ route('kontak') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Kontak</a>
    </div>

    <!-- POJOK KANAN: Profile -->
    <div class="relative ml-4" @click.away="profileOpen = false">
      <button @click="profileOpen = !profileOpen" class="focus:outline-none">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile"
          class="w-10 h-10 rounded-full border-2 border-blue-300 shadow hover:scale-105 transition-transform duration-300">
      </button>

      <!-- Dropdown Profile -->
      <div x-show="profileOpen" x-transition
        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
        <a href="edit_profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
        <a href="riwayat" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
        <hr class="border-gray-200 my-1">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- MENU MOBILE -->
  <div x-show="open" x-transition class="md:hidden px-4 mt-2">
    <ul class="flex flex-col items-center space-y-4 bg-white rounded shadow-md p-4 text-lg font-semibold">
      <li><a href="{{ route('landing') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Beranda</a></li>
      <li><a href="{{ route('ruangan.index') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Ruangan</a></li>
      <li><a href="{{ route('ulasan') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Ulasan</a></li>
      <li><a href="{{ route('kontak') }}" class="text-gray-800 hover:text-yellow-400 transition-colors">Kontak</a></li>
      </li>
    </ul>
  </div>
</header>

<!-- Alpine JS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
