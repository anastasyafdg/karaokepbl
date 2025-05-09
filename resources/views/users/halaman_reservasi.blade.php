@extends('layouts.app')

@section('content')
  <!-- Konten Utama -->
  <main class="container mx-auto px-4 py-8 max-w-6xl">
    <h1 class="text-3xl font-bold text-white mb-2">Pembayaran Reservasi</h1>
    <p class="text-white mb-8">Lengkapi informasi pemesanan Anda</p>

    <form action="{{ url('konfirmasi_pembayaran') }}" method="post" class="flex flex-col lg:flex-row gap-8">
      @csrf

      <!-- Informasi Pemesanan -->
      <div class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100 flex-1">
        <h2 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
          <i class="fas fa-calendar-check mr-3 text-blue-500"></i> Informasi Pemesanan
        </h2>

        <div class="space-y-5">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Reservasi</label>
            <input type="date" name="tanggal" required 
                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Waktu Mulai</label>
              <input type="time" name="waktu_mulai" required 
                     class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Waktu Selesai</label>
              <input type="time" name="waktu_selesai" required 
                     class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan Tambahan</label>
            <textarea name="catatan" rows="3" 
                      class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all" 
                      placeholder="Contoh: untuk paket snacknya saya mau nugget..."></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Metode Pembayaran</label>
            <div class="relative">
              <select name="metode_pembayaran" required 
                      class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 appearance-none transition-all">
                <option value="transfer">Bank Transfer</option>
                <option value="e-wallet">E-Wallet</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-400"></i>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="total_harga" value="150000">

        <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 mt-8 py-3.5 rounded-lg font-semibold text-white shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
          <i class="fas fa-credit-card mr-2"></i> Bayar Sekarang
        </button>
      </div>

      <!-- Ringkasan Pembayaran -->
      <div class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100 lg:max-w-md w-full h-fit sticky top-24">
        <h2 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
          <i class="fas fa-receipt mr-3 text-blue-500"></i> Ringkasan Pesanan
        </h2>

        <div class="flex items-start gap-5 mb-6 pb-6 border-b border-gray-100">
          <img src="{{ asset('images/paketA.png') }}" alt="Ruangan" class="h-24 w-24 object-cover rounded-lg shadow">
          <div>
            <p class="font-bold text-gray-800">SA001 - Paket A</p>
            <p class="text-sm text-gray-500 mb-2">Small Room (Maks. 5 orang)</p>
            <div class="flex items-center text-yellow-400 text-sm">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="text-gray-500 ml-2">4.5 (128 ulasan)</span>
            </div>
          </div>
        </div>

        <div class="space-y-3 mb-6">
          <div class="flex justify-between">
            <span class="text-gray-600">Harga per jam</span>
            <span class="font-medium">Rp50.000</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Durasi</span>
            <span class="font-medium">3 Jam</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Tanggal</span>
            <span class="font-medium" id="tanggal_placeholder">-</span>
          </div>
        </div>

        <div class="p-4 bg-blue-50 rounded-lg mb-6">
          <div class="flex justify-between items-center">
            <span class="font-bold text-gray-800">Total Pembayaran</span>
            <span class="text-2xl font-bold text-blue-600">Rp150.000</span>
          </div>
        </div>

        <ul class="text-gray-500 text-sm space-y-2">
          <li class="flex items-start">
            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
            <span>Harga sudah termasuk pajak & layanan</span>
          </li>
          <li class="flex items-start">
            <i class="fas fa-info-circle text-blue-400 mr-2 mt-0.5"></i>
            <span>Pembatalan bisa dikenakan biaya 20%</span>
          </li>
        </ul>
      </div>
    </form>
  </main>
  <script>
    // Update tanggal placeholder saat input tanggal berubah
    document.querySelector('input[name="tanggal"]').addEventListener('change', function() {
      const formattedDate = new Date(this.value).toLocaleDateString('id-ID', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      });
      document.getElementById('tanggal_placeholder').textContent = formattedDate;
    });
    // Dropdown icon profile
    document.addEventListener('DOMContentLoaded', function() {
    const profileButton = document.querySelector('.relative.group button');
    const dropdownMenu = document.querySelector('.relative.group .hidden');

    // Toggle dropdown saat tombol profile diklik
    profileButton.addEventListener('click', function(e) {
      e.stopPropagation();
      dropdownMenu.classList.toggle('hidden');
    });

    // Tutup dropdown ketika klik di luar
    document.addEventListener('click', function(e) {
      if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });

    // Mencegah dropdown tertutup saat mengklik menu dropdown itu sendiri
    dropdownMenu.addEventListener('click', function(e) {
      e.stopPropagation();
    });
  });
  </script>
@endsection