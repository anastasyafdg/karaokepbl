<header class="bg-blue-200 shadow-md">
  <nav class="border-gray-200 px-4 lg:px-6 py-4">
    <div class="flex flex-wrap justify-between items-center max-w-screen-xl mx-auto">

      <!-- Logo (Tengah) -->
      <div class="flex flex-1 justify-center order-2 lg:order-1">
        <ul class="flex items-center space-x-8 text-sm font-medium">
          <li><a href="/landing" class="text-gray-800 hover:text-yellow-400 transition">Beranda</a></li>
          <li><a href="/ruangan" class="text-gray-800 hover:text-yellow-400 transition">Ruangan</a></li>
          <li>
            <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="h-10 w-10 rounded-full object-cover">
          </li>
          <li><a href="/ulasan" class="text-gray-800 hover:text-yellow-400 transition">Ulasan</a></li>
          <li><a href="/kontak" class="text-gray-800 hover:text-yellow-400 transition">Kontak</a></li>
        </ul>
      </div>

      <!-- Profile Dropdown (Kanan) -->
      <div class="relative order-3">
        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex mx-3 text-sm bg-white rounded-full focus:ring-2 focus:ring-blue-500" type="button">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full border-2 border-blue-300" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="user photo">
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownAvatar" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-48">
          <div class="py-1 text-sm text-gray-700">
            <a href="/edit_profile" class="block px-4 py-2 hover:bg-gray-100">Edit Profil</a>
            <a href="/riwayat" class="block px-4 py-2 hover:bg-gray-100">Riwayat Pemesanan</a>
          </div>
          <div class="py-1 text-sm text-gray-700">
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
