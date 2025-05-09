<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact - RUN & RUN Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-900 text-white">

  <!-- Header & Navigation -->
  <header class="bg-blue-100 py-2">
    <nav class="relative">
      <ul class="flex justify-center items-center list-none p-0 m-0">
        <li class="mx-4"><a href="halaman.php" class="text-gray-800 font-medium hover:text-sky-700 transition">Beranda</a></li>
        <li class="mx-4"><a href="ruangan.php" class="text-gray-800 font-medium hover:text-sky-700 transition">Ruangan</a></li>
        <li class="mx-4 logo-center">
          <img src="logo.png" alt="Logo" class="rounded-full h-[50px] w-[50px] object-cover block">
        </li>
        <li class="mx-4"><a href="ulasan.php" class="text-gray-800 font-medium hover:text-sky-700 transition">Ulasan</a></li>
        <li class="mx-4"><a href="kontak.php" class="text-gray-800 font-medium hover:text-sky-700 transition">Kontak</a></li>
      </ul>

      <div class="absolute right-4 top-1/2 -translate-y-1/2" x-data="{ open: false }">
        <div @click="open = !open" class="cursor-pointer">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile" class="w-10 h-10 rounded-full object-cover hover:scale-110 transition">
        </div>
        <ul x-show="open" @click.outside="open = false" class="mt-2 bg-white text-gray-800 rounded shadow-md py-2 w-48 absolute right-0 z-50">
          <li><a class="block px-4 py-2 hover:bg-gray-200" href="edit.php">Edit Profil</a></li>
          <li><hr class="my-1 border-gray-300"></li>
          <li><a class="block px-4 py-2 hover:bg-gray-200" href="logout.php">Keluar</a></li>
          <li><hr class="my-1 border-gray-300"></li>
          <li><a class="block px-4 py-2 hover:bg-gray-200" href="riwayat.php">Riwayat Pemesanan</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="p-20">
    <section class="bg-gray-800 min-h-screen py-10 px-4">
      <div class="max-w-5xl mx-auto bg-blue-100 p-8 rounded-lg shadow-lg">
        <div class="mb-8 text-center">
          <h2 class="text-3xl font-bold text-gray-800">Pemesanan Saya</h2>
          <p class="text-gray-600 text-lg">Lihat dan kelola pemesanan karaoke Anda</p>
        </div>

        <!-- Tabs -->
        <div class="flex space-x-6 mb-6 border-b border-gray-300">
          <button class="pb-2 border-b-4 border-pink-200 font-semibold text-gray-700">Semua</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Tertunda</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Dikonfirmasi</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Selesai</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Dibatalkan</button>
        </div>

        <!-- Card Pesanan -->
        <div class="bg-blue-50 p-6 rounded-lg grid grid-cols-5 gap-6 items-center">
          <div class="flex justify-center">
            <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" alt="Room" class="w-32 h-24 object-cover rounded-lg shadow-md">
          </div>
          <div class="text-center space-y-2">
            <p class="font-bold text-gray-800">SA001 - Paket A</p>
            <p class="text-gray-600 text-sm">Small Room</p>
            <p class="text-gray-600 text-sm flex justify-center items-center"><i class="fas fa-calendar-alt mr-2"></i> 18 April 2025</p>
            <p class="text-gray-600 text-sm">ID Pemesanan: 1</p>
          </div>
          <div class="text-center">
            <p class="text-gray-600 text-sm flex justify-center items-center"><i class="fas fa-clock mr-2"></i> 13:00 - 16:00</p>
          </div>
          <div class="text-center">
            <p class="text-gray-800 font-semibold text-lg flex justify-center items-center"><i class="fas fa-money-bill-wave mr-2"></i> Rp. 150.000</p>
          </div>
          <div class="text-center space-y-4">
            <div class="inline-block px-4 py-1 rounded-full text-sm font-semibold bg-green-400 text-white">
              <i class="fas fa-check-circle mr-2"></i> Dikonfirmasi
            </div>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm px-4 py-1 rounded-full flex items-center justify-center mx-auto mt-2 cursor-pointer transition">
              <i class="fas fa-print mr-2"></i> Cetak Resi
            </button>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div class="mb-8 md:mb-0 max-w-md">
          <div class="flex items-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mr-4 rounded-full w-[50px] h-[50px]">
            <div>
              <h1 class="text-yellow-500 text-2xl font-bold">Mikkeu Pangpang</h1>
              <p class="text-gray-400">Executive Karaoke</p>
            </div>
          </div>
          <p class="text-gray-400 mb-4">Rasakan pengalaman karaoke terbaik hanya di Mikkeu Pangpang Karaoke. Booking sekarang!</p>
          <p class="text-gray-400">Open Daily : 14.00 – 05.00 WIB</p>
        </div>

        <div class="flex flex-col md:flex-row justify-between w-full md:w-auto">
          <div class="mb-8 md:mb-0 md:mr-8">
            <h2 class="text-white font-bold mb-4">Contact Us:</h2>
            <div class="flex items-center mb-2"><i class="fas fa-phone-alt text-yellow-500 mr-2"></i><p class="text-gray-400">Telepon : 081382341800</p></div>
            <div class="flex items-center mb-2"><i class="fab fa-instagram text-yellow-500 mr-2"></i><p class="text-gray-400">Instagram : mikkeu_pangpang</p></div>
          </div>
          <div class="mb-8 md:mb-0 md:mr-8">
            <h2 class="text-white font-bold mb-4">Address:</h2>
            <div class="flex items-center"><i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i><p class="text-gray-400">Jl. Senayan No.87, RT.7/RW.2, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan</p></div>
          </div>
          <div>
            <h2 class="text-white font-bold mb-4">Quick Links:</h2>
            <div class="flex flex-col space-y-2">
              <a href="https://maps.google.com/?q=Batam+Centre" target="_blank" class="text-gray-400 hover:text-white"><i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i> Mikkeu Pangpang Location</a>
              <a href="https://wa.me/yourwhatsappnumber" target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-whatsapp text-green-500 mr-2"></i> WhatsApp Contact</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-700 mt-8 pt-4 text-center">
      <p class="text-gray-400">© 2024 Mikkeu Pangpang Karaoke. All Rights Reserved. Published by www.eda.co.id</p>
    </div>
  </footer>
</body>
</html>