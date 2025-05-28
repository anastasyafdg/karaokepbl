@extends('layouts.app')

@section('content')
  <!-- Main Content -->
  <main class="max-w-6xl mx-auto my-8 grid grid-cols-1 lg:grid-cols-2 gap-8 px-4">
    
    <!-- Payment Info Card -->
    <section class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
          <i class="fas fa-credit-card mr-3 text-blue-500"></i> Informasi Pembayaran
        </h2>
        <div class="bg-red-100 text-red-600 px-4 py-2 rounded-full flex items-center">
          <i class="fas fa-clock mr-2"></i>
          <span class="font-semibold" id="timer">30:00</span>
        </div>
      </div>

      <!-- Bank Transfer Details -->
      <div class="bg-blue-50 p-4 rounded-lg mb-6">
        <h3 class="font-semibold text-lg mb-3 text-gray-800">
          <i class="fas fa-university mr-2 text-blue-500"></i> Detail Bank Transfer
        </h3>
        
        <div class="space-y-3">
          <div class="flex justify-between items-center">
            <span class="text-black">Nama Bank:</span>
            <span class="font-medium">Bank Negara Indonesia</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-black">Nomor Rekening:</span>
              <div class="flex items-center">
                <span class="mr-2">12345678910</span>
                <button class="text-gray-600 hover:text-gray-600 copy-btn">
                  <i class="far fa-copy"></i>
                </button>
              </div>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-black">Nama Pengguna:</span>
            <span class="font-medium">MikkeuPangpang Karaoke</span>
          </div>
          <div class="flex justify-between items-center pt-3 mt-3 border-t border-blue-100">
            <span class="text-gray-800 font-bold">Total Pembayaran:</span>
            <span class="text-xl font-bold text-blue-600">Rp150.000</span>
          </div>
        </div>
      </div>

      <!-- Upload Payment Proof -->
      <div class="mb-6">
        <h3 class="font-semibold text-lg mb-3 text-gray-800">
          <i class="fas fa-upload mr-2 text-blue-500"></i> Unggah Bukti Pembayaran
        </h3>
        
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer">
          <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
          <p class="text-gray-500 mb-2">Drag & drop file bukti pembayaran atau</p>
          <button class="bg-blue-50 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-blue-100 transition-colors">
            Pilih File
          </button>
          <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG (Maks. 5MB)</p>
        </div>
      </div>

      <!-- Payment Form -->
      <form action="{{ url('pembayaran_selesai') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tanggal" value="2025-04-18">
        <input type="hidden" name="waktu_mulai" value="13:00">
        <input type="hidden" name="waktu_selesai" value="16:00">
        <input type="hidden" name="catatan" value="Tidak ada">
        <input type="hidden" name="metode_pembayaran" value="Bank Transfer">
        <input type="hidden" name="total_harga" value="150000">
        
        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 py-3.5 rounded-lg font-semibold text-white shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
          <i class="fas fa-check-circle mr-2"></i> Konfirmasi Pembayaran
        </button>
      </form>

      <!-- Payment Info -->
      <div class="mt-6 text-sm text-gray-600 space-y-2">
        <p class="flex items-start">
          <i class="fas fa-info-circle text-blue-400 mr-2 mt-0.5"></i>
          <span>Setelah melakukan pembayaran, unggah bukti pembayaran Anda untuk mengkonfirmasi pemesanan.</span>
        </p>
        <p class="flex items-start">
          <i class="fas fa-clock text-orange-400 mr-2 mt-0.5"></i>
          <span>Pembayaran harus diselesaikan dalam batas waktu yang ditentukan.</span>
        </p>
      </div>
    </section>

    <!-- Order Summary Card -->
    <section class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100 h-fit sticky top-24">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">
        <i class="fas fa-receipt mr-3 text-blue-500"></i> Ringkasan Pesanan
      </h2>

      <!-- Room Info -->
      <div class="flex items-start gap-4 mb-6 pb-6 border-b border-gray-100">
        <img src="{{ asset('images/paketA.png') }}" alt="Ruangan" class="h-24 w-24 object-cover rounded-lg shadow">
        <div>
          <h3 class="font-bold text-gray-800">SA001 - Paket A</h3>
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

      <!-- Booking Details -->
      <div class="space-y-4 mb-6">
        <div class="flex justify-between">
          <div class="text-gray-600">
            <i class="far fa-calendar-alt mr-2"></i> Tanggal
          </div>
          <span class="font-medium">18 April 2025</span>
        </div>
        <div class="flex justify-between">
          <div class="text-gray-600">
            <i class="far fa-clock mr-2"></i> Waktu
          </div>
          <span class="font-medium">13:00 - 16:00</span>
        </div>
        <div class="flex justify-between">
          <div class="text-gray-600">
            <i class="fas fa-hourglass-half mr-2"></i> Durasi
          </div>
          <span class="font-medium">3 Jam</span>
        </div>
      </div>

      <!-- Price Breakdown -->
      <div class="space-y-3 mb-6">
        <div class="flex justify-between">
          <span class="text-gray-600">Harga per jam</span>
          <span class="font-medium">Rp50.000</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Durasi</span>
          <span class="font-medium">3 Jam</span>
        </div>
      </div>

      <!-- Total Payment -->
      <div class="p-4 bg-blue-50 rounded-lg mb-6">
        <div class="flex justify-between items-center">
          <span class="font-bold text-gray-800">Total Pembayaran</span>
          <span class="text-2xl font-bold text-blue-600">Rp150.000</span>
        </div>
      </div>

      <!-- Payment Status -->
      <div class="flex justify-between items-center mb-6">
        <span class="text-gray-600">Status Pembayaran:</span>
        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
          <i class="fas fa-clock mr-1"></i> Menunggu Pembayaran
        </span>
      </div>

      <!-- Additional Info -->
      <div class="text-sm text-gray-600 space-y-2">
        <p class="flex items-start">
          <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
          <span>Semua harga sudah termasuk pajak dan biaya layanan.</span>
        </p>
        <p class="flex items-start">
          <i class="fas fa-exclamation-triangle text-orange-400 mr-2 mt-0.5"></i>
          <span>Setelah pembayaran, uang reservasi tidak dikembalikan apabila reservasi ingin dibatalkan.</span>
        </p>
      </div>
    </section>
  </main>
  <!-- Timer Script -->
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
    // Periksa apakah yang diklik bukan bagian dari dropdown atau tombol profile
    if (!dropdownMenu.contains(e.target) && !profileButton.contains(e.target)) {
      dropdownMenu.classList.add('hidden');
    }
  });

  // Mencegah dropdown tertutup saat mengklik menu
  dropdownMenu.addEventListener('click', function(e) {
    e.stopPropagation();
  });
});
    let timeLeft = 1800;
    function updateTimer() {
      const minutes = String(Math.floor(timeLeft / 60)).padStart(2, '0');
      const seconds = String(timeLeft % 60).padStart(2, '0');
      document.getElementById('timer').textContent = `${minutes}:${seconds}`;
      
      // Change color when time is running out
      if (timeLeft < 300) { // Last 5 minutes
        document.getElementById('timer').parentElement.classList.remove('bg-red-100', 'text-red-600');
        document.getElementById('timer').parentElement.classList.add('bg-red-500', 'text-white');
      }
      
      if (timeLeft > 0) {
        timeLeft--;
        setTimeout(updateTimer, 1000);
      }
    }
    updateTimer();
    // Copy button functionality
    document.querySelectorAll('.copy-btn').forEach(button => {
      button.addEventListener('click', function() {
        const textToCopy = this.previousElementSibling.textContent;
        navigator.clipboard.writeText(textToCopy).then(() => {
          const originalIcon = this.innerHTML;
          this.innerHTML = '<i class="fas fa-check"></i>';
          setTimeout(() => {
            this.innerHTML = originalIcon;
          }, 2000);
        });
      });
    });
  </script>
@endsection