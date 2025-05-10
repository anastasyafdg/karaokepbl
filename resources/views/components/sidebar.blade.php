<div class="w-64 bg-gradient-to-b from-blue-300 to-blue-800 text-white p-6 flex flex-col">
  <h3 class="text-2xl font-bold mb-6"><i class="fas fa-th-large mr-2"></i> Menu</h3>
  <nav class="flex flex-col gap-3">
    <a href="{{ route('admin_dashboard') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
      <i class="fas fa-home"></i> Beranda
    </a>
    <a href="{{ route('data_pengunjung') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
      <i class="fas fa-users"></i> Data Pengunjung
    </a>
    <a href="{{ route('ulasan') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
      <i class="fas fa-comment-alt"></i> Ulasan
    </a>
    <a href="{{ route('transaksi') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
      <i class="fas fa-receipt"></i> Transaksi
    </a>
    <a href="{{ route('paket_admin') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
      <i class="fas fa-box-open"></i> Paket Ruangan
    </a>
    <a href="{{ route('data_ruangan') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
      <i class="fas fa-door-closed"></i> Data Ruangan
    </a>
  </nav>
</div>
