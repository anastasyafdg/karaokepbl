@extends('layouts.admin')

@section('content')
<main class="p-6">
  <!-- Judul Halaman -->
  <div class="flex justify-between items-center mb-4">
    <h5 class="text-xl font-semibold flex items-center text-gray-900">
      <i class="fas fa-home mr-2"></i> Beranda
    </h5>
  </div>
  <hr class="mb-6 border-gray-200" />

  <!-- Kartu Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Kartu 1 -->
    <div class="relative bg-white rounded-lg border border-gray-200 shadow-md p-6">
      <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
      <h6 class="text-lg font-semibold flex items-center mb-2 text-gray-900">
        <i class="fas fa-box-open mr-2 text-purple-500"></i> Jumlah Ruangan
      </h6>
      <p class="text-sm text-gray-700">Total: <span class="font-medium">{{ $totalRuangan }}</span></p>
    </div>

    <!-- Kartu 2 -->
    <div class="relative bg-white rounded-lg border border-gray-200 shadow-md p-6">
      <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
      <h6 class="text-lg font-semibold flex items-center mb-2 text-gray-900">
        <i class="fas fa-users mr-2 text-purple-500"></i> Jumlah Pengunjung
      </h6>
      <p class="text-sm text-gray-700">Total: <span class="font-medium">{{ $totalPengunjung }}</span></p>
    </div>

    <!-- Kartu 3 -->
    <div class="relative bg-white rounded-lg border border-gray-200 shadow-md p-6">
      <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
      <h6 class="text-lg font-semibold flex items-center mb-2 text-gray-900">
        <i class="fas fa-comment-alt mr-2 text-purple-500"></i> Ulasan Pengunjung
      </h6>
      <p class="text-sm text-gray-700">Total: <span class="font-medium">{{ $totalUlasan }}</span></p>
    </div>

        <!-- Kartu 4 -->
    <div class="relative bg-white rounded-lg border border-gray-200 shadow-md p-6">
      <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
      <h6 class="text-lg font-semibold flex items-center mb-2 text-gray-900">
        <i class="fas fa-envelope mr-2 text-purple-500"></i> Pesan Dari Pengunjung
      </h6>
      <p class="text-sm text-gray-700">Total: <span class="font-medium">{{ $totalPesan }}</span></p>
    </div>

        <!-- Kartu 3 -->
    <div class="relative bg-white rounded-lg border border-gray-200 shadow-md p-6">
      <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
      <h6 class="text-lg font-semibold flex items-center mb-2 text-gray-900">
        <i class="fas fa-receipt mr-2 text-purple-500"></i> Jumlah Reservasi Ruangan
      </h6>
      <p class="text-sm text-gray-700">Total: <span class="font-medium">{{ $totalReservasi }}</span></p>
    </div>

        <!-- Kartu 3 -->
    <div class="relative bg-white rounded-lg border border-gray-200 shadow-md p-6">
      <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
      <h6 class="text-lg font-semibold flex items-center mb-2 text-gray-900">
        <i class="fas fa-credit-card mr-2 text-purple-500"></i> Jumlah Pembayaran
      </h6>
      <p class="text-sm text-gray-700">Total: <span class="font-medium">{{ $totalPembayaran }}</span></p>
    </div>

  </div>
</main>
@endsection
