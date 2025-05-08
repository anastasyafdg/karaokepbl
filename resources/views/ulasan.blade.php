<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ulasan - RUN & RUN Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Roboto'] bg-gray-900 text-gray-100">

<!-- Header & Navigation -->
<header class="bg-blue-200 shadow-md">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center">
      <!-- Menu Tengah -->
      <ul class="flex flex-1 justify-center items-center space-x-8 md:space-x-8 mx-auto">
        <li><a href="halaman.php" class="text-gray-800 hover:text-yellow-400 transition">Beranda</a></li>
        <li><a href="ruangan.php" class="text-gray-800 hover:text-yellow-400 transition">Ruangan</a></li>
        <li class="mx-4 md:mx-8">
        <img src="images/logo.png" alt="Logo Mikkeu Pangpang" class="h-10 w-10 rounded-full object-cover mx-auto">

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

<!-- Ulasan Section -->
<section id="ulasan" class="py-16">
  <div class="max-w-4xl mx-auto px-6">
    <div class="bg-gray-600 p-8 rounded-2xl shadow-2xl">
      <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-teal-400">Ulasan Pengunjung</h2>
        <button id="openModal"
                class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-2 rounded-lg shadow-md transition">
          + Tambah Ulasan
        </button>
      </div>

      <!-- Review Card -->
      <div class="space-y-6">
        <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="bg-blue-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold">A</div>
              <div class="ml-4">
                <h3 class="text-lg font-bold text-gray-800">Andi</h3>
                <p class="text-sm text-gray-500">21 April 2025</p>
              </div>
            </div>
            <div class="flex text-yellow-400 text-lg space-x-1">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="mt-4 text-gray-700">Tempatnya sangat nyaman dan lagu-lagunya lengkap. Pengalaman karaoke yang luar biasa!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Tambah Ulasan -->
<div id="reviewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white p-8 rounded-2xl shadow-2xl w-96 relative animate-fadeIn">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Tambah Ulasan</h2>
    <form class="space-y-4">
      <input type="text" placeholder="Nama" class="w-full p-3 rounded-lg bg-gray-100 text-gray-800 focus:outline-none focus:ring-2 focus:ring-teal-500">
      <div class="flex justify-center space-x-1" id="ratingStars">
        <i class="far fa-star text-3xl text-yellow-400 cursor-pointer"></i>
        <i class="far fa-star text-3xl text-yellow-400 cursor-pointer"></i>
        <i class="far fa-star text-3xl text-yellow-400 cursor-pointer"></i>
        <i class="far fa-star text-3xl text-yellow-400 cursor-pointer"></i>
        <i class="far fa-star text-3xl text-yellow-400 cursor-pointer"></i>
      </div>
      <textarea placeholder="Tulis ulasan Anda..." class="w-full p-3 rounded-lg bg-gray-100 text-gray-800 h-28 resize-none focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
      <div class="flex justify-end space-x-3 pt-4">
        <button type="button" id="closeModal" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Batal</button>
        <button type="submit" class="px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">Kirim</button>
      </div>
    </form>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const openModal = document.getElementById('openModal');
  const closeModal = document.getElementById('closeModal');
  const reviewModal = document.getElementById('reviewModal');

  openModal.addEventListener('click', () => {
    reviewModal.classList.remove('hidden');
  });

  closeModal.addEventListener('click', () => {
    reviewModal.classList.add('hidden');
  });

  // Rating klik-able
  const stars = document.querySelectorAll('#ratingStars i');
  stars.forEach((star, index1) => {
    star.addEventListener('click', () => {
      stars.forEach((s, index2) => {
        s.classList.toggle('fas', index2 <= index1);
        s.classList.toggle('far', index2 > index1);
      });
    });
  });
</script>
</body>
</html>