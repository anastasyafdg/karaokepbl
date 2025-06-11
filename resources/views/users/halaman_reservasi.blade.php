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
            <input type="date" name="tanggal" id="tanggal_input" required 
                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Waktu Mulai</label>
              <input type="time" name="waktu_mulai" id="waktu_mulai_input" required 
                     class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Waktu Selesai</label>
              <input type="time" name="waktu_selesai" id="waktu_selesai_input" required 
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

        <input type="hidden" name="total_harga" id="total_harga_input" value="150000">

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
            <span class="font-medium" id="durasi_placeholder">- Jam</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Tanggal</span>
            <span class="font-medium" id="tanggal_placeholder">-</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Waktu</span>
            <span class="font-medium" id="waktu_placeholder">-</span>
          </div>
        </div>

        <div class="p-4 bg-blue-50 rounded-lg mb-6">
          <div class="flex justify-between items-center">
            <span class="font-bold text-gray-800">Total Pembayaran</span>
            <span class="text-2xl font-bold text-blue-600" id="total_harga_display">Rp0</span>
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
    const hargaPerJam = 50000;
    
    function formatRupiah(angka) {
      return 'Rp' + angka.toLocaleString('id-ID');
    }
    
    function formatTanggal(dateString) {
      if (!dateString) return '-';
      const date = new Date(dateString);
      return date.toLocaleDateString('id-ID', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      });
    }
    
    function hitungDurasi(waktuMulai, waktuSelesai) {
      if (!waktuMulai || !waktuSelesai) return 0;
      
      const [jamMulai, menitMulai] = waktuMulai.split(':').map(Number);
      const [jamSelesai, menitSelesai] = waktuSelesai.split(':').map(Number);
      
      const totalMenitMulai = jamMulai * 60 + menitMulai;
      const totalMenitSelesai = jamSelesai * 60 + menitSelesai;
      
      const selisihMenit = totalMenitSelesai - totalMenitMulai;
      return Math.max(0, selisihMenit / 60); // dalam jam
    }
    
    function updateRingkasan() {
      const tanggal = document.getElementById('tanggal_input').value;
      const waktuMulai = document.getElementById('waktu_mulai_input').value;
      const waktuSelesai = document.getElementById('waktu_selesai_input').value;
      
      // Update tanggal
      document.getElementById('tanggal_placeholder').textContent = formatTanggal(tanggal);
      
      // Update waktu
      if (waktuMulai && waktuSelesai) {
        document.getElementById('waktu_placeholder').textContent = `${waktuMulai} - ${waktuSelesai}`;
      } else {
        document.getElementById('waktu_placeholder').textContent = '-';
      }
      
      // Hitung durasi
      const durasi = hitungDurasi(waktuMulai, waktuSelesai);
      document.getElementById('durasi_placeholder').textContent = `${durasi} Jam`;
      
      // Hitung total harga
      const totalHarga = durasi * hargaPerJam;
      document.getElementById('total_harga_display').textContent = formatRupiah(totalHarga);
      document.getElementById('total_harga_input').value = totalHarga;
    }
    
    // Event listeners
    document.getElementById('tanggal_input').addEventListener('change', updateRingkasan);
    document.getElementById('waktu_mulai_input').addEventListener('change', updateRingkasan);
    document.getElementById('waktu_selesai_input').addEventListener('change', updateRingkasan);
    
    // Dropdown profile functionality
    document.addEventListener('DOMContentLoaded', function() {
      const profileButton = document.querySelector('.relative.group button');
      const dropdownMenu = document.querySelector('.relative.group .hidden');

      if (profileButton && dropdownMenu) {
        profileButton.addEventListener('click', function(e) {
          e.stopPropagation();
          dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
          if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
          }
        });

        dropdownMenu.addEventListener('click', function(e) {
          e.stopPropagation();
        });
      }
    });
  </script>
@endsection