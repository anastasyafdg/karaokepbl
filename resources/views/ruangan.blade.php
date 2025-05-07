<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Ruangan Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0f172a] font-['Roboto']">
  <!-- Header -->
  <header class="bg-blue-200 shadow-md">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center">
      <!-- Menu Tengah -->
      <ul class="flex flex-1 justify-center items-center space-x-8 md:space-x-8 mx-auto">
        <li><a href="halaman.php" class="text-gray-800 hover:text-yellow-400 transition">Beranda</a></li>
        <li><a href="ruangan.php" class="text-gray-800 hover:text-yellow-400 transition">Ruangan</a></li>
        <li class="mx-4 md:mx-8">
    <img 
        src="logo.png"
        alt="Logo Mikkeu Pangpang" 
        class="h-10 w-10 rounded-full object-cover mx-auto"
    >
</li>

        <li><a href="ulasan.php" class="text-gray-800 hover:text-yellow-400 transition">Ulasan</a></li>
        <li><a href="kontak.php" class="text-gray-800 hover:text-yellow-400 transition">Kontak</a></li>
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
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
          <hr class="border-gray-200 my-1">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
      </div>
    </div>
  </nav>
</header>

  <!-- Konten -->
  <div class="bg-gray-900 p-6 min-h-screen text-white">
    <!-- Pencarian dan Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 mb-6">
      <div class="flex-1 relative">
        <input 
          type="text" 
          placeholder="Cari Ruangan" 
          class="w-full bg-gray-700 text-white placeholder-gray-300 px-5 py-2 rounded-full focus:outline-none"
        />
        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300">🔍</span>
      </div>
      <div class="flex flex-wrap gap-3">
        <button class="bg-gray-600 text-white px-4 py-2 rounded-full">Lihat Semua Ruangan</button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded-full">Kecil</button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded-full">Sedang</button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded-full">Besar</button>
      </div>
    </div>

    <!-- Grid Ruangan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <div id="popup-detail" class="fixed inset-0 bg-black/50 z-50 hidden" aria-hidden="true" x-transition>
  <!-- Popup Content -->
  <div class="fixed inset-0 flex items-center justify-center p-4" @click.outside="closePopup()">
    <div class="bg-white rounded-xl w-full max-w-md relative p-6 mx-auto" 
         @click.stop
         x-show="isOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
      
      <!-- Close Button -->
      <button @click="closePopup()" 
              class="absolute top-4 right-4 text-gray-600 hover:text-black transition-colors"
              aria-label="Close popup">
        ✖
      </button>
      
      <!-- Popup Content -->
      <h2 class="text-xl font-semibold mb-4" id="popup-title">Paket A, Ruang Kecil</h2>
      
      <div class="flex flex-wrap gap-4 mb-4 text-sm">
        <div class="flex items-center gap-2">
          <span>👥</span>
          <span id="popup-kapasitas">6 Orang Max</span>
        </div>
        <div class="flex items-center gap-2">
          <span>⏰</span>
          <span>Min. 1 Jam Penyewaan</span>
        </div>
      </div>
      
      <div class="mb-4">
        <ul class="list-disc list-inside space-y-1.5 text-sm" id="popup-fasilitas">
          <li>Ruangan karaoke full AC</li>
          <li>Layar TV + sound system</li>
          <li>Mic wireless (2 buah)</li>
          <li>Pilihan lagu lengkap</li>
        </ul>
      </div>
      
      <div class="flex items-center justify-between gap-4">
        <img src="paketA.webp" alt="Ruangan Paket A" 
             class="w-28 h-20 object-cover rounded-lg border border-gray-200" 
             id="popup-img"
             loading="lazy">
        <div class="text-lg font-bold" id="popup-harga">Rp. 50.000/Jam</div>
      </div>
      
      <a href="pembayaran.php" class="block mt-6">
        <button class="bg-green-700 hover:bg-green-800 text-white w-full py-2 rounded-full transition-colors duration-200">
          Pesan Sekarang
        </button>
      </a>
    </div>
  </div>
</div>


      <!-- Kartu Ruangan -->
      <!-- 1 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-blue-400 text-white text-sm px-3 py-1 rounded-full">Kecil</div>
        <img src="paketA.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket A</div>
          <div class="text-sm">👥 Kapasitas : 5–6 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 50.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 2 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-blue-400 text-white text-sm px-3 py-1 rounded-full">Kecil</div>
        <img src="paketB.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket B</div>
          <div class="text-sm">👥 Kapasitas : 5–6 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 100.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 3 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-indigo-500 text-white text-sm px-3 py-1 rounded-full">Sedang</div>
        <img src="paketC.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket C</div>
          <div class="text-sm">👥 Kapasitas : 7–12 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 250.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 4 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-purple-500 text-white text-sm px-3 py-1 rounded-full">Besar</div>
        <img src="paketA.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket A</div>
          <div class="text-sm">👥 Kapasitas : 13–20 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 150.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 5 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-purple-500 text-white text-sm px-3 py-1 rounded-full">Besar</div>
        <img src="paketC.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket C</div>
          <div class="text-sm">👥 Kapasitas : 13–20 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 400.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 6 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-blue-400 text-white text-sm px-3 py-1 rounded-full">Kecil</div>
        <img src="paketB.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket B</div>
          <div class="text-sm">👥 Kapasitas : 5–6 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 180.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 7 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-indigo-500 text-white text-sm px-3 py-1 rounded-full">Sedang</div>
        <img src="paketB.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket B</div>
          <div class="text-sm">👥 Kapasitas : 7–12 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 200.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
      <!-- 8 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative">
        <div class="absolute top-2 right-2 bg-indigo-500 text-white text-sm px-3 py-1 rounded-full">Sedang</div>
        <img src="paketA.webp" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket A</div>
          <div class="text-sm">👥 Kapasitas : 7–12 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 150.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full">Detail</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
function openPopup(title, kapasitas, fasilitas, imgSrc, harga) {
  document.getElementById('popup-title').innerText = title;
  document.getElementById('popup-kapasitas').innerText = kapasitas;
  document.getElementById('popup-fasilitas').innerHTML = fasilitas.map(f => `<li>${f}</li>`).join('');
  document.getElementById('popup-img').src = imgSrc;
  document.getElementById('popup-harga').innerText = harga;
  document.getElementById('popup-detail').classList.remove('hidden');
}

function showPopup() {
  document.getElementById('popup-detail').classList.remove('hidden');
}

function closePopup() {
  document.getElementById('popup-detail').classList.add('hidden');
}

// Event Listener untuk semua tombol detail
document.querySelectorAll('button.bg-green-500').forEach((button, index) => {
  button.addEventListener('click', () => {
    const data = [
      {
        title: "Paket A, Ruang Kecil",
        kapasitas: "6 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
        img: "paketA.webp",
        harga: "Rp. 50.000/Jam"
      },
      {
        title: "Paket B, Ruang Kecil",
        kapasitas: "6 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
        img: "paketB.webp",
        harga: "Rp. 100.000/Jam"
      },
      {
        title: "Paket C, Ruang Sedang",
        kapasitas: "12 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
        img: "paketC.webp",
        harga: "Rp. 250.000/Jam"
      },
      {
        title: "Paket A, Ruang Besar",
        kapasitas: "20 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (4 buah)", "Pilihan lagu lengkap"],
        img: "paketA.webp",
        harga: "Rp. 150.000/Jam"
      },
      {
        title: "Paket C, Ruang Besar",
        kapasitas: "20 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (4 buah)", "Pilihan lagu lengkap"],
        img: "paketC.webp",
        harga: "Rp. 400.000/Jam"
      },
      {
        title: "Paket B, Ruang Kecil",
        kapasitas: "6 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
        img: "paketB.webp",
        harga: "Rp. 180.000/Jam"
      },
      {
        title: "Paket B, Ruang Sedang",
        kapasitas: "12 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
        img: "paketB.webp",
        harga: "Rp. 200.000/Jam"
      },
      {
        title: "Paket A, Ruang Sedang",
        kapasitas: "12 Orang Max",
        fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
        img: "paketA.webp",
        harga: "Rp. 150.000/Jam"
      },
    ];
    openPopup(data[index].title, data[index].kapasitas, data[index].fasilitas, data[index].img, data[index].harga);
    document.addEventListener('alpine:init', () => {
  Alpine.data('popup', () => ({
    isOpen: false,
    openPopup() {
      this.isOpen = true;
      document.body.style.overflow = 'hidden';
    },
    closePopup() {
      this.isOpen = false;
      document.body.style.overflow = '';
    }
  });
});
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>