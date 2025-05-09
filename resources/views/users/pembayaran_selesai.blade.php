@extends('layouts.app')

@section('content')
  <!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row justify-center items-start gap-6">
      <!-- Left Panel -->
      <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 w-full lg:w-2/3 shadow-lg border border-blue-100">
        <div class="text-center mb-6">
          <i class="fas fa-check-circle text-6xl text-green-500 mb-4 animate-bounce"></i>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Pembayaran Berhasil!</h1>
          <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 text-sm font-medium inline-flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            Pembayaran Anda telah diterima. Pemesanan Anda akan dikonfirmasi setelah diverifikasi oleh admin kami!
          </div>
        </div>
        
        <div class="text-center text-gray-700 mb-8">
          <p class="text-lg mb-4">
            Terima kasih telah melakukan pemesanan di <span class="font-bold text-indigo-600">MikkeuPangpang Karaoke</span>.
          </p>
          <div class="inline-block bg-white rounded-lg px-6 py-4 shadow-sm">
            <p class="text-gray-600">
              <i class="far fa-calendar-alt mr-2 text-indigo-500"></i>
              <strong>18 April 2025</strong> pukul <strong>13:00</strong>
            </p>
          </div>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="ruangan" class="bg-white hover:bg-gray-100 px-6 py-3 rounded-lg shadow text-gray-700 font-medium transition duration-300 flex items-center justify-center">
            <i class="fas fa-door-open mr-2 text-blue-500"></i>
            Lihat detail ruangan</a>
          <a href="riwayat" class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 px-6 py-3 rounded-lg text-white font-medium transition duration-300 flex items-center justify-center">
            <i class="far fa-list-alt mr-2"></i>
            Lihat pemesanan saya</a>
        </div>
      </div>

      <!-- Right Panel -->
      <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 w-full lg:w-1/3 shadow-lg border border-blue-100">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 flex items-center justify-center">
          <i class="fas fa-receipt mr-3 text-blue-500"></i>
          Detail Pembayaran
        </h2>
        
        <div class="flex items-center space-x-4 mb-6 p-4 bg-white rounded-lg shadow-sm">
          <img src="{{ asset('images/paketA.png') }}" alt="Ruangan" class="h-16 w-16 object-cover rounded-lg border border-gray-200">
          <div>
            <p class="font-semibold text-gray-800">SA001 - Paket A</p>
            <p class="text-sm text-gray-600">Small Room (maks. 5 orang)</p>
            <div class="flex items-center mt-1">
              <i class="fas fa-star text-yellow-400 text-xs mr-1"></i>
              <span class="text-xs text-gray-500">4.8 (120 ulasan)</span>
            </div>
          </div>
        </div>
        
        <div class="space-y-3 mb-4">
          <div class="flex justify-between items-center">
            <span class="text-gray-600"><i class="far fa-calendar mr-2 text-blue-400"></i> Tanggal</span>
            <span class="font-medium">18 April 2025</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600"><i class="far fa-clock mr-2 text-blue-400"></i> Waktu</span>
            <span class="font-medium">13:00 - 16:00</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600"><i class="fas fa-hourglass-half mr-2 text-blue-400"></i> Durasi</span>
            <span class="font-medium">3 Jam</span>
          </div>
        </div>
        
        <hr class="my-4 border-gray-300 border-dashed">
        
        <div class="space-y-3 mb-4">
          <div class="flex justify-between items-center">
            <span class="text-gray-600">Harga per jam</span>
            <span>Rp. 50.000</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600">Durasi</span>
            <span>3 Jam × Rp. 50.000</span>
          </div>
        </div>
        
        <hr class="my-4 border-gray-300 border-dashed">
        
        <div class="space-y-3">
          <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-700">Total Harga</span>
            <span class="text-lg font-bold text-red-600">Rp. 150.000</span>
          </div>
          <div class="flex justify-between items-center text-sm">
            <span class="text-gray-600"><i class="far fa-credit-card mr-2 text-blue-400"></i> Metode Pembayaran</span>
            <span class="font-medium">Transfer Bank</span>
          </div>
        </div>
        
        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
          <p class="text-sm text-blue-800 flex items-center">
            <i class="fas fa-info-circle mr-2 text-blue-500"></i>
            Pembayaran akan diverifikasi dalam 1×24 jam. Cek email untuk konfirmasi.
          </p>
        </div>
      </div>
    </div>
  </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
  const profileButton = document.querySelector('.relative.group button');
  const dropdownMenu = document.querySelector('.relative.group .hidden');

  profileButton.addEventListener('click', function(e) {
    e.stopPropagation();
    dropdownMenu.classList.toggle('hidden');
  });

  // Tutup dropdown ketika klik di luar
  document.addEventListener('click', function(e) {
    if (!dropdownMenu.contains(e.target) {
      dropdownMenu.classList.add('hidden');
    }
  });

  // Mencegah dropdown tertutup saat mengklik menu
  dropdownMenu.addEventListener('click', function(e) {
    e.stopPropagation();
  });
});
  </script>
@endsection