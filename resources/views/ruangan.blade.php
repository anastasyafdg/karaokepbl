<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Ruangan Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-900 font-['Roboto']">
  <!-- Header -->
  <header class="bg-blue-200 shadow-md">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center">
      <!-- Menu Tengah -->
      <ul class="flex flex-1 justify-center items-center space-x-8 md:space-x-8 mx-auto">
        <li><a href="landing" class="text-gray-800 hover:text-yellow-400 transition">Beranda</a></li>
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

  <!-- Konten -->
  <div class="bg-gray-900 p-6 min-h-screen text-white">
    <!-- Pencarian dan Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 mb-6">
      <div class="flex-1 relative">
        <input 
          type="text" 
          id="search-input"
          placeholder="Cari Ruangan (Paket A, Paket B, Paket C)" 
          class="w-full bg-gray-700 text-white placeholder-gray-300 px-5 py-2 rounded-full focus:outline-none"
        />
        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300">🔍</span>
      </div>
      <div class="flex flex-wrap gap-3">
        <button onclick="filterRooms('all')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Lihat Semua Ruangan</button>
        <button onclick="filterRooms('Kecil')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Kecil</button>
        <button onclick="filterRooms('Sedang')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Sedang</button>
        <button onclick="filterRooms('Besar')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Besar</button>
      </div>
    </div>

    <!-- Grid Ruangan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="rooms-container">
  <div id="popup-detail" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
  <div class="bg-white text-black rounded-xl w-11/12 max-w-md relative p-6">
    <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-600 hover:text-black">✖</button>
    <h2 class="text-xl font-semibold mb-4" id="popup-title">Paket A, Ruang Kecil</h2>
    <div class="flex items-center justify-between mb-4">
      <div class="text-sm flex items-center gap-2">
        <span>👥</span> <span id="popup-kapasitas">6 Orang Max</span>
      </div>
      <div class="text-sm flex items-center gap-2">
        <span>⏰</span> <span>Min. 1 Jam Penyewaan</span>
      </div>
    </div>
    <div class="mb-4">
      <ul class="list-disc list-inside text-sm space-y-1" id="popup-fasilitas">
        <li>Ruangan karaoke full AC</li>
        <li>Layar TV + sound system</li>
        <li>Mic wireless (2 buah)</li>
        <li>Pilihan lagu lengkap</li>
      </ul>
    </div>
    <div class="flex items-center justify-between">
      <img src="paketA.webp" alt="Ruangan" class="w-28 h-20 object-cover rounded-lg" id="popup-img">
      <div class="text-lg font-bold" id="popup-harga">Rp. 50.000/Jam</div>
    </div>
    <a href="halaman_reservasi">
      <button class="bg-green-700 text-white w-full py-2 rounded-full mt-6 hover:bg-green-800">Pesan Sekarang</button>
    </a>
  </div>
</div>

      <!-- Kartu Ruangan -->
      <!-- 1 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket A" data-size="Kecil">
        <div class="absolute top-2 right-2 bg-blue-400 text-white text-sm px-3 py-1 rounded-full">Kecil</div>
        <img src="{{ asset('images/paketA.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket A</div>
          <div class="text-sm">👥 Kapasitas : 5–6 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 50.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 2 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket B" data-size="Kecil">
        <div class="absolute top-2 right-2 bg-blue-400 text-white text-sm px-3 py-1 rounded-full">Kecil</div>
        <img src="{{ asset('images/paketB.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket B</div>
          <div class="text-sm">👥 Kapasitas : 5–6 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 100.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 3 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket C" data-size="Sedang">
        <div class="absolute top-2 right-2 bg-indigo-500 text-white text-sm px-3 py-1 rounded-full">Sedang</div>
        <img src="{{ asset('images/paketC.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket C</div>
          <div class="text-sm">👥 Kapasitas : 7–12 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 250.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 4 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket A" data-size="Besar">
        <div class="absolute top-2 right-2 bg-purple-500 text-white text-sm px-3 py-1 rounded-full">Besar</div>
        <img src="{{ asset('images/paketA.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket A</div>
          <div class="text-sm">👥 Kapasitas : 13–20 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 150.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 5 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket C" data-size="Besar">
        <div class="absolute top-2 right-2 bg-purple-500 text-white text-sm px-3 py-1 rounded-full">Besar</div>
        <img src="{{ asset('images/paketC.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket C</div>
          <div class="text-sm">👥 Kapasitas : 13–20 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 400.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 6 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket B" data-size="Kecil">
        <div class="absolute top-2 right-2 bg-blue-400 text-white text-sm px-3 py-1 rounded-full">Kecil</div>
        <img src="{{ asset('images/paketB.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket B</div>
          <div class="text-sm">👥 Kapasitas : 5–6 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 180.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 7 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket B" data-size="Sedang">
        <div class="absolute top-2 right-2 bg-indigo-500 text-white text-sm px-3 py-1 rounded-full">Sedang</div>
        <img src="{{ asset('images/paketB.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket B</div>
          <div class="text-sm">👥 Kapasitas : 7–12 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 200.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
      <!-- 8 -->
      <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" data-paket="Paket A" data-size="Sedang">
        <div class="absolute top-2 right-2 bg-indigo-500 text-white text-sm px-3 py-1 rounded-full">Sedang</div>
        <img src="{{ asset('images/paketA.png') }}" class="w-full h-40 object-cover" />
        <div class="p-4 space-y-2">
          <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">Paket A</div>
          <div class="text-sm">👥 Kapasitas : 7–12 orang</div>
          <div class="flex items-center justify-between">
            <div class="text-sm">Rp. 150.000/1 jam</div>
            <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn">Detail</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
// Data untuk popup detail
const roomData = [
  {
    title: "Paket A, Ruang Kecil",
    kapasitas: "6 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketA.png') }}",
    harga: "Rp. 50.000/Jam"
  },
  {
    title: "Paket B, Ruang Kecil",
    kapasitas: "6 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketB.png') }}",
    harga: "Rp. 100.000/Jam"
  },
  {
    title: "Paket C, Ruang Sedang",
    kapasitas: "12 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketC.png') }}",
    harga: "Rp. 250.000/Jam"
  },
  {
    title: "Paket A, Ruang Besar",
    kapasitas: "20 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (4 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketA.png') }}",
    harga: "Rp. 150.000/Jam"
  },
  {
    title: "Paket C, Ruang Besar",
    kapasitas: "20 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (4 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketC.png') }}",
    harga: "Rp. 400.000/Jam"
  },
  {
    title: "Paket B, Ruang Kecil",
    kapasitas: "6 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketB.png') }}",
    harga: "Rp. 180.000/Jam"
  },
  {
    title: "Paket B, Ruang Sedang",
    kapasitas: "12 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketB.png') }}",
    harga: "Rp. 200.000/Jam"
  },
  {
    title: "Paket A, Ruang Sedang",
    kapasitas: "12 Orang Max",
    fasilitas: ["Ruangan karaoke full AC", "Layar TV + sound system", "Mic wireless (2 buah)", "Pilihan lagu lengkap"],
    img: "{{ asset('images/paketA.png') }}",
    harga: "Rp. 150.000/Jam"
  },
];

// Fungsi untuk filter ruangan berdasarkan ukuran
function filterRooms(size) {
  const rooms = document.querySelectorAll('.room-card');
  
  rooms.forEach(room => {
    if (size === 'all') {
      room.style.display = 'block';
    } else {
      const roomSize = room.getAttribute('data-size');
      if (roomSize === size) {
        room.style.display = 'block';
      } else {
        room.style.display = 'none';
      }
    }
  });
}

// Fungsi untuk pencarian berdasarkan paket (A, B, C)
function searchRooms() {
  const searchTerm = document.getElementById('search-input').value.toLowerCase();
  const rooms = document.querySelectorAll('.room-card');
  
  rooms.forEach(room => {
    const paket = room.getAttribute('data-paket').toLowerCase();
    if (paket.includes(searchTerm) || searchTerm === '') {
      room.style.display = 'block';
    } else {
      room.style.display = 'none';
    }
  });
}

// Event listener untuk input pencarian
document.getElementById('search-input').addEventListener('input', searchRooms);

// Fungsi untuk popup detail
function openPopup(title, kapasitas, fasilitas, imgSrc, harga) {
  document.getElementById('popup-title').innerText = title;
  document.getElementById('popup-kapasitas').innerText = kapasitas;
  document.getElementById('popup-fasilitas').innerHTML = fasilitas.map(f => `<li>${f}</li>`).join('');
  document.getElementById('popup-img').src = imgSrc;
  document.getElementById('popup-harga').innerText = harga;

  const popup = document.getElementById('popup-detail');
  popup.classList.remove('hidden');
  popup.classList.add('flex');
}

function closePopup() {
  const popup = document.getElementById('popup-detail');
  popup.classList.remove('flex');
  popup.classList.add('hidden');
}

// Event Listener untuk semua tombol detail
document.querySelectorAll('.detail-btn').forEach((button, index) => {
  button.addEventListener('click', () => {
    const data = roomData[index];
    openPopup(data.title, data.kapasitas, data.fasilitas, data.img, data.harga);
  });
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>