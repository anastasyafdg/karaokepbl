<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mikkeu Pangpang Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-white">
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
        <button id="profile-button" class="focus:outline-none">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
              alt="Profile" 
              class="w-8 h-8 rounded-full border-2 border-blue-300">
        </button>
        <!-- Dropdown Menu -->
        <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-50">
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

  <!-- Hero Section -->
  <section class="text-center p-8">
    <h1 class="text-3xl md:text-4xl text-gray-300 font-bold mb-2">Karaoke Bagus di Batam</h1>
    <p class="text-gray-300 mb-8">Mikkeu Pangpang Karaoke dilengkapi dengan berbagai fasilitas premium untuk kenyamanan Anda</p>

   <!-- Carousel Section -->
   <div class="container mx-auto px-3">
        <div class="relative mb-8 overflow-hidden max-w-5xl mx-auto">
          <div class="carousel flex transition-transform duration-500 ease-in-out" id="carousel">
            <div class="carousel-item min-w-full">
              <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" 
                   alt="Interior of a karaoke room with modern lighting" 
                   class="w-full h-80 md:h-[40rem] object-cover">
            </div>
            <div class="carousel-item min-w-full">
              <img src="https://i.pinimg.com/736x/90/78/60/9078606cc3b5c1212addab7c68540ba6.jpg" 
                   alt="Interior of a karaoke room with a large screen" 
                   class="w-full h-80 md:h-[40rem] object-cover">
            </div>
            <div class="carousel-item min-w-full">
              <img src="https://i.pinimg.com/736x/88/09/8f/88098f42149340a050702f6fa5d9d97a.jpg" 
                   alt="Interior of a karaoke room with a vibrant theme" 
                   class="w-full h-80 md:h-[40rem] object-cover">
            </div>
          </div>
          <div class="absolute inset-0 flex justify-between items-center px-4">
            <button class="bg-white bg-opacity-30 hover:bg-opacity-50 text-white w-10 h-10 rounded-full flex items-center justify-center transition" onclick="prevSlide()" aria-label="Sebelumnya">
              <i class="fas fa-chevron-left"></i>
            </button>
            <button class="bg-white bg-opacity-30 hover:bg-opacity-50 text-white w-10 h-10 rounded-full flex items-center justify-center transition" onclick="nextSlide()" aria-label="Selanjutnya">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
  </section>

  <!-- Booking Banner Section -->
    <section class="pt-12">
    <div class="container mx-auto px-4">
        <div class="bg-blue-100 text-center py-12 rounded-lg shadow-xl max-w-8xl mx-auto">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 text-gray-800">
            Booking Pengalaman Karaoke yang Tak Terlupakan
        </h1>
        <p class="max-w-4xl mx-auto text-gray-700 text-lg mb-6">
            Sistem suara berkualitas tinggi, ruang yang nyaman, pelayanan yang ramah dan ribuan lagu siap dinyanyikan. 
            Pesan ruanganmu sekarang dan rasakan pengalaman karaoke terbaik!
        </p>

        <!-- Search Bar -->
        <div class="search-bar relative mx-auto mt-6 max-w-2xl">
            <form action="search.php" method="GET" class="flex w-full">
            <div class="flex items-center bg-white rounded-l-full overflow-hidden w-full">
                <span class="flex items-center justify-center px-4 text-gray-500"><i class="fas fa-user"></i></span>
                <input type="text" name="query" class="w-full py-2 px-4 focus:outline-none text-gray-700" placeholder="Cari Ruangan..." required>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 rounded-r-full">
                <i class="fas fa-search"></i>
            </button>
            </form>
        </div>

        </div>
    </div>
    </section>

  <!-- Packages Section -->
    <section class="mt-16">
    <div class="container mx-auto px-6">
      <div class="flex justify-end items-center mb-6">
      <a href="ruangan" class="bg-gray-600 text-white px-8 py-2 rounded-full font-semibold hover:bg-gray-700 transition-colors">
          Lihat Semua Ruangan
      </a>
    </div>
    </div>
       
  <!-- Package Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
    <!-- Package A -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col card">
          <img src="{{ asset('images/paketA.png') }}" alt="Paket A" class="w-full h-48 object-cover">
            <div class="bg-yellow-400 p-4 flex flex-col justify-between flex-grow">
              <div>
                <div class="flex items-center justify-between mb-2">
                  <h2 class="text-lg font-bold text-black">Paket A</h2>
                  <div class="flex space-x-1">
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                  </div>
                </div>
                <p class="text-sm text-black">Hanya Ruangan, cocok bagi yang hanya ingin karaoke.</p>
              </div>
              <div class="flex justify-end mt-4">
                <button class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
                  Selengkapnya
                </button>
              </div>
            </div>
          </div>
          
    <!-- Package B -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col card">
          <img src="{{ asset('images/paketB.png') }}" alt="Paket B" class="w-full h-48 object-cover">
            <div class="bg-yellow-400 p-4 flex flex-col justify-between flex-grow">
              <div>
                <div class="flex items-center justify-between mb-2">
                  <h2 class="text-lg font-bold text-black">Paket B</h2>
                  <div class="flex space-x-1">
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                  </div>
                </div>
                <p class="text-sm text-black">Menyediakan makanan ringan seperti nugget, ayam pop, dan nasi goreng.</p>
              </div>
              <div class="flex justify-end mt-4">
                <button class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
                  Selengkapnya
                </button>
              </div>
            </div>
          </div>
          
    <!-- Package C -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col card">
          <img src="{{ asset('images/paketC.png') }}" alt="Paket C" class="w-full h-48 object-cover">
            <div class="bg-yellow-400 p-4 flex flex-col justify-between flex-grow">
              <div>
                <div class="flex items-center justify-between mb-2">
                  <h2 class="text-lg font-bold text-black">Paket C</h2>
                  <div class="flex space-x-1">
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                    <i class="fas fa-star text-yellow-200"></i>
                  </div>
                </div>
                <p class="text-sm text-black">Tersedia makanan berat, cocok untuk pesta bersama teman sekolah dan kantor.</p>
              </div>
              <div class="flex justify-end mt-4">
                <button class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
                  Selengkapnya
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Room Offers Section -->
      <div class="container mx-auto px-4 mt-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <!-- Small Room-->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative card">
            <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" alt="Small Room" class="w-full h-48 object-cover">
            <div class="p-4 bg-yellow-500">
              <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold text-black">Ruangan Kecil</h3>
                <div class="flex items-center">
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                </div>
              </div>
              <p class="text-sm text-black">Rp 50.000/jam</p>
              <div class="flex justify-end items-center mt-2">
                <button class="bg-black text-white px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
                  <i class="fas fa-arrow-right mr-1"></i>Reservasi
                </button>
              </div>
            </div>
          </div>
          
        <!-- Medium Room -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative card">
            <img src="https://i.pinimg.com/736x/90/78/60/9078606cc3b5c1212addab7c68540ba6.jpg" alt="Medium Room" class="w-full h-48 object-cover">
            <div class="p-4 bg-yellow-500">
              <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold text-black">Ruangan Sedang</h3>
                <div class="flex items-center">
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                </div>
              </div>
              <p class="text-sm text-black">Rp 150.000/jam</p>
              <div class="flex justify-end items-center mt-2">
                <button class="bg-black text-white px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
                  <i class="fas fa-arrow-right mr-1"></i>
                  Reservasi
                </button>
              </div>
            </div>
          </div>
          
        <!-- Large Room -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative card">
            <img src="https://i.pinimg.com/736x/88/09/8f/88098f42149340a050702f6fa5d9d97a.jpg" alt="Large Room" class="w-full h-48 object-cover">
            <div class="p-4 bg-yellow-500">
              <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold text-black">Ruangan Besar</h3>
                <div class="flex items-center">
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                  <i class="fas fa-star text-yellow-300"></i>
                </div>
              </div>
              <p class="text-sm text-black">Rp 250.000/jam</p>
              <div class="flex justify-end items-center mt-2">
                <button class="bg-black text-white px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
                  <i class="fas fa-arrow-right mr-1"></i> Reservasi
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8 text-center">Keunggulan Kami</h2>
        <div class="flex flex-wrap max-w-6xl mx-auto">
          <div class="bg-gray-700 p-6 text-center w-1/4 feature-box rounded-l-lg">
            <i class="fas fa-check-circle text-yellow-500 text-4xl mb-4"></i>
            <h2 class="text-xl font-bold mb-2">Fasilitas Terbaik</h2>
            <p class="text-gray-300">Semua ruangan kami dilengkapi teknologi audio-visual terbaik dan sofa yang nyaman</p>
          </div>
          <div class="bg-gray-800 p-6 text-center w-1/4 feature-box">
            <i class="fas fa-list text-yellow-500 text-4xl mb-4"></i>
            <h2 class="text-xl font-bold mb-2">Paket Room Beragam</h2>
            <p class="text-gray-300">Kami menawarkan berbagai pilihan paket room yang dapat disesuaikan dengan kebutuhan</p>
          </div>
          <div class="bg-gray-700 p-6 text-center w-1/4 feature-box">
            <i class="fas fa-smile text-yellow-500 text-4xl mb-4"></i>
            <h2 class="text-xl font-bold mb-2">Pelayanan Ramah</h2>
            <p class="text-gray-300">Kami siap melayani Anda dengan sepenuh hati untuk pengalaman karaoke yang menyenangkan</p>
          </div>
          <div class="bg-gray-800 p-6 text-center w-1/4 feature-box rounded-r-lg">
            <i class="fas fa-glass-cheers text-yellow-500 text-4xl mb-4"></i>
            <h2 class="text-xl font-bold mb-2">Pilihan Menu Beragam</h2>
            <p class="text-gray-300">Nikmati berbagai sajian makanan dan minuman berkualitas dengan pilihan yang bervariasi</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Reviews Section -->
    <section id="ulasan" class="reviews-section py-16 bg-navy-900">
  <div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto">
      <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-3xl text-blue-300 font-bold">Ulasan Pengunjung</h2>
          <button class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-2 rounded-lg transition-colors flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Ulasan
          </button>
        </div>

        <!-- Review Item -->
        <div class="review mb-8 last:mb-0">
          <div class="user-info flex items-start">
            <div class="avatar bg-blue-500 text-white w-10 h-10 rounded-full flex items-center justify-center font-bold">A</div>
            
            <div class="ml-4 flex-1">
              <div class="flex justify-between items-center"> <!-- Ubah items-start menjadi items-center -->
                <div>
                  <h3 class="text-lg font-semibold text-white">Andi</h3>
                  <p class="text-sm text-gray-400">21 April 2025</p>
                </div>
                <div class="stars text-yellow-400 ml-4"> <!-- Pindahkan bintang ke sini -->
                  ⭐⭐⭐⭐⭐
                </div>
              </div>
              
              <p class="mt-2 text-gray-300 leading-relaxed">
                Tempatnya sangat nyaman dan lagu-lagunya lengkap. Pengalaman karaoke yang luar biasa!
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
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

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Carousel functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    
    function showSlide(n) {
      currentSlide = (n + totalSlides) % totalSlides;
      const carousel = document.getElementById('carousel');
      carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
    }
    
    function nextSlide() {
      showSlide(currentSlide + 1);
    }
    
    function prevSlide() {
      showSlide(currentSlide - 1);
    }
    
    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);
    const profileButton = document.getElementById('profile-button');
    const dropdownMenu = document.getElementById('profile-dropdown');
    
    // Toggle dropdown ketika tombol diklik
    profileButton.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdownMenu.classList.toggle('hidden');
    });
    
    // Tutup dropdown ketika klik di luar
    document.addEventListener('click', (e) => {
      if (!dropdownMenu.contains(e.target) && e.target !== profileButton) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
