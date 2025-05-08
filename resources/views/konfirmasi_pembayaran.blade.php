<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pembayaran - Mikkeu Pangpang Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-gray-800 font-['Poppins']">

  <!-- Modern Navbar -->
  <header class="bg-blue-200 shadow-md">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center">
      <!-- Menu Tengah -->
      <ul class="flex flex-1 justify-center items-center space-x-8 md:space-x-8 mx-auto">
        <li><a href="halaman" class="text-gray-800 hover:text-yellow-400 transition">Beranda</a></li>
        <li><a href="ruangan" class="text-gray-800 hover:text-yellow-400 transition">Ruangan</a></li>
        <li class="mx-4 md:mx-8">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="h-10 w-10 rounded-full object-cover mx-auto">
</li>

        <li><a href="ulasan" class="text-gray-800 hover:text-yellow-400 transition">Ulasan</a></li>
        <li><a href="kontak" class="text-gray-800 hover:text-yellow-400 transition">Kontak</a></li>
      </ul>
      
      <!-- Profile Icon di Kanan -->
      <div class="relative group ml-auto">
        <button class="focus:outline-none">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
               alt="Profile" 
               class="w-8 h-8 rounded-full border-2 border-blue-300">
        </button>
        
        <!-- Dropdown Menu -->
        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block group-focus:block z-50">
          <a href="edit_profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
          <a href="riwayat" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
          <hr class="border-gray-200 my-1">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
      </div>
      </div>
    </div>
  </nav>
</header>

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
            <span class="text-gray-600">Nama Bank:</span>
            <span class="font-medium">Bank Negara Indonesia</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600">Nomor Rekening:</span>
              <div class="flex items-center">
                <span class="mr-2">12345678910</span>
                <button class="text-gray-600 hover:text-gray-600 copy-btn">
                  <i class="far fa-copy"></i>
                </button>
              </div>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600">Nama Pengguna:</span>
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
      <form action="pembayaran_selesai.php" method="POST" enctype="multipart/form-data">
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

  <!-- Footer -->
  <footer id="contact" class="bg-gray-900 py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <!-- Brand Info -->
        <div class="mb-8 md:mb-0 max-w-md">
          <div class="flex items-center mb-4">
          <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="mr-4 rounded-full" width="50" height="50">
            <div>
              <h1 class="text-yellow-500 text-2xl font-bold">Mikkeu Pangpang</h1>
              <p class="text-gray-400">Executive Karaoke</p>
            </div>
          </div>
          <p class="text-gray-400 mb-4">
            Rasakan pengalaman karaoke terbaik hanya di Mikkeu Pangpang Karaoke. Booking sekarang!
          </p>
          <p class="text-gray-400">
            Open Daily : 14.00 – 05.00 WIB
          </p>
        </div>
        
        <!-- Contact Info -->
        <div class="flex flex-col md:flex-row justify-between w-full md:w-auto">
          <div class="mb-8 md:mb-0 md:mr-8">
            <h2 class="text-white font-bold mb-4">Contact Us:</h2>
            <div class="flex items-center mb-2">
              <i class="fas fa-phone-alt text-yellow-500 mr-2"></i>
              <p class="text-gray-400">Telepon : 081382341800</p>
            </div>
            <div class="flex items-center mb-2">
              <i class="fab fa-instagram text-yellow-500 mr-2"></i>
              <p class="text-gray-400">Instagram : mikkeu_pangpang</p>
            </div>
          </div>
          
          <!-- Address -->
          <div class="mb-8 md:mb-0 md:mr-8">
            <h2 class="text-white font-bold mb-4">Address:</h2>
            <div class="flex items-center">
              <i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i>
              <p class="text-gray-400">
                Jl. Senayan No.87, RT.7/RW.2, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, 
                Daerah Khusus Ibukota Jakarta 12180
              </p>
            </div>
          </div>
          
          <!-- Quick Links -->
          <div>
            <h2 class="text-white font-bold mb-4">Quick Links:</h2>
            <div class="flex flex-col space-y-2">
              <a href="https://maps.google.com/?q=Batam+Centre" target="_blank" class="text-gray-400 hover:text-white footer-link">
                <i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i>
                Mikkeu Pangpang Location
              </a>
              <a href="https://wa.me/yourwhatsappnumber" target="_blank" class="text-gray-400 hover:text-white footer-link">
                <i class="fab fa-whatsapp text-green-500 mr-2"></i>WhatsApp Contact
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-gray-700 mt-8 pt-4 text-center">
      <p class="text-gray-400">
        © 2024 Mikkeu Pangpang Karaoke. All Rights Reserved. Published by www.eda.co.id
      </p>
    </div>
  </footer>

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
</body>
</html>