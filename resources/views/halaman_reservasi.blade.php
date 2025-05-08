<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Isi Informasi Pembayaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-900 min-h-screen text-gray-700 font-['Poppins']">

  <!-- Navbar Modern -->
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
  </nav>
</header>

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

  <!-- Footer -->
  <footer id="contact" class="bg-slate-900 text-black py-8">
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
</body>
</html>