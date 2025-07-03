<div class="fixed top-0 left-48 right-0 z-50 flex items-center justify-between bg-white p-4 shadow-md">


  <!-- Kiri: Logo dan Info Admin -->
  <div class="flex items-center space-x-4">
    <img src="images/logo.png" alt="Logo" class="w-12 h-12 rounded-full object-cover">
    <div>
      <h4 class="text-lg font-semibold">Halo, semangat Kerjanya</h4>
      <small class="text-gray-500">Admin (@admin)</small>
    </div>
  </div>

  <!-- Kanan: Tombol Logout dengan Flowbite -->
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Keluar
    </button>
    </form>
</div>
