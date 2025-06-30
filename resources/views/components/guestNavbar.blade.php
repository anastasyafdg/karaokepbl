<nav class="bg-blue-200 text-black px-4 py-3 shadow-md">
  <div class="max-w-7xl mx-auto flex items-center justify-between relative">

    <!-- Logo & Toggle (Mobile) -->
    <div class="flex items-center space-x-3">
      <!-- Hamburger Menu -->
      <button onclick="toggleMobileNav()" class="md:hidden focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
      </button>

      <!-- Logo Tengah (Ditampilkan di Mobile) -->
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-cover rounded-full md:hidden">
    </div>

    <!-- Tengah Navbar (Desktop Only) -->
    <div class="hidden md:flex absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 items-center space-x-8">
      <!-- Menu Kiri -->
      <div class="flex space-x-6">
        <a href="{{ url('dashboard1') }}" class="font-semibold hover:underline">Beranda</a>
        <a href="{{ url('login') }}" class="font-semibold hover:underline">Ruangan</a>
      </div>

      <!-- Logo -->
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-cover rounded-full">

      <!-- Menu Kanan -->
      <div class="flex space-x-6">
        <a href="{{ url('login') }}" class="font-semibold hover:underline">Ulasan</a>
        <a href="{{ url('kontak') }}" class="font-semibold hover:underline">Kontak</a>
      </div>
    </div>

    <!-- Tombol Masuk -->
    <div class="ml-auto">
      <a href="{{ url('login') }}" class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-700 inline-block">Masuk</a>
    </div>
  </div>

  <!-- Mobile Menu (Hidden by default) -->
  <div id="mobile-menu" class="md:hidden hidden mt-2 space-y-2 px-4">
    <a href="{{ url('dashboard1') }}" class="block font-semibold">Beranda</a>
    <a href="{{ url('login') }}" class="block font-semibold">Ruangan</a>
    <a href="{{ url('login') }}" class="block font-semibold">Ulasan</a>
    <a href="{{ url('kontak') }}" class="block font-semibold">Kontak</a>
  </div>
</nav>

<!-- Toggle JS -->
<script>
  function toggleMobileNav() {
    const menu = document.getElementById("mobile-menu");
    menu.classList.toggle("hidden");
  }
</script>
