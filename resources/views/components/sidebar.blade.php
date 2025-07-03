<div class="fixed top-0 left-0 h-screen w-48 bg-gradient-to-b from-blue-300 to-blue-800 text-white p-4 flex flex-col shadow-md z-40 overflow-y-auto">
  <h3 class="text-2xl font-bold mb-6 flex items-center">
    <i class="fas fa-th-large mr-2"></i> Menu
  </h3>

  <nav class="flex flex-col gap-2">
    <a href="{{ route('admin_dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-home"></i> <span>Beranda</span>
    </a>
    <a href="{{ route('data_pengunjung') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-users"></i> <span>Data Pengunjung</span>
    </a>
    <a href="{{ route('pesan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-envelope"></i> <span>Pesan Pengunjung</span>
    </a>
    <a href="{{ route('data_ruangan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-door-closed"></i> <span>Data Ruangan</span>
    </a>
    <a href="{{ route('data_reservasi') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-receipt"></i> <span>Data Reservasi</span>
    </a>
    <a href="{{ route('data_pembayaran') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-credit-card"></i> <span>Data Pembayaran</span>
    </a>
    <a href="{{ route('admin.ulasan.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
      <i class="fas fa-comment-alt"></i> <span>Ulasan</span>
    </a>
    
  </nav>
</div>
