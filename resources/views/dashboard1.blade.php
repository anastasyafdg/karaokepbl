<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mikkeu Pangpang Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-900 text-white">

  <!-- Navbar -->
  <nav class="bg-slate-200 text-black p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between relative">

      <!-- Tengah Navbar -->
      <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center space-x-8">
        <!-- Kiri Menu -->
        <div class="flex space-x-6">
          <a href="#" class="font-semibold hover:underline">Beranda</a>
          <a href="#" class="font-semibold hover:underline">Ruangan</a>
        </div>

        <!-- Logo -->
        <img 
         src="{{ asset('images/logo.png') }}" 
         alt="Logo" 
         class="w-12 h-12 object-cover rounded-full">
        <!-- Kanan Menu -->
        <div class="flex space-x-6">
          <a href="#" class="font-semibold hover:underline">Ulasan</a>
          <a href="#" class="font-semibold hover:underline">Kontak</a>
        </div>
      </div>

      <!-- Pojok Kanan: Button -->
      <div class="ml-auto">
        <button class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-700">Masuk</button>
      </div>

    </div>
  </nav>

  <!-- Hero Section -->
  <section class="text-center p-8">
    <h1 class="text-3xl md:text-4xl font-bold mb-2">Karaoke Bagus di Batam</h1>
    <p class="text-gray-300 mb-8">Mikkeu Pangpang Karaoke dilengkapi dengan berbagai fasilitas premium untuk kenyamanan Anda</p>

   <!-- Carousel Section -->
   <div class="container mx-auto px-3">
        <div class="relative mb-8 overflow-hidden max-w-5xl mx-auto">
          <div class="carousel flex transition-transform duration-500 ease-in-out" id="carousel">
            <div class="carousel-item min-w-full">
              <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" 
                   alt="Interior of a karaoke room with modern lighting" 
                   class="w-full h-[40rem] object-cover">
            </div>
            <div class="carousel-item min-w-full">
              <img src="https://i.pinimg.com/736x/90/78/60/9078606cc3b5c1212addab7c68540ba6.jpg" 
                   alt="Interior of a karaoke room with a large screen" 
                   class="w-full h-[40rem] object-cover">
            </div>
            <div class="carousel-item min-w-full">
              <img src="https://i.pinimg.com/736x/88/09/8f/88098f42149340a050702f6fa5d9d97a.jpg" 
                   alt="Interior of a karaoke room with a vibrant theme" 
                   class="w-full h-[40rem] object-cover">
            </div>
          </div>
          <div class="absolute inset-0 flex justify-between items-center px-4">
            <button class="carousel-btn" onclick="prevSlide()">❮</button>
            <button class="carousel-btn" onclick="nextSlide()">❯</button>
          </div>
        </div>
      </div>
    </section>

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

   <!-- Package Cards -->
   <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
    <!-- Package A -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col card">
            <img src="images/paketA.webp" alt="Paket A" class="w-full h-48 object-cover">
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
            <img src="images/paketB.webp" alt="Paket B" class="w-full h-48 object-cover">
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
            <img src="images/paketC.webp" alt="Paket C" class="w-full h-48 object-cover">
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

  <!-- Footer -->
  <footer id="contact" class="bg-gray-900 py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <!-- Brand Info -->
        <div class="mb-8 md:mb-0 max-w-md">
          <div class="flex items-center mb-4">
            <img src="logo.png" alt="Logo Mikkeu Pangpang" class="mr-4 rounded-full" width="50" height="50">
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

</body>
</html>
