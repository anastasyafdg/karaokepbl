@extends('layouts.app')

@section('content')
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
            <form action="{{ route('ruangan.index') }}" method="GET" class="flex w-full">
                <div class="flex items-center bg-white rounded-l-full overflow-hidden w-full">
                    <span class="flex items-center justify-center px-4 text-gray-500"><i class="fas fa-user"></i></span>
                    <input 
                        type="text" 
                        name="search" 
                        id="landing-search"
                        class="w-full py-2 px-4 focus:outline-none text-gray-700" 
                        placeholder="Cari Ruangan..."
                    >
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
      <a href="{{ url('/ruangan') }}" class="bg-gray-600 text-white px-8 py-2 rounded-full font-semibold hover:bg-gray-700 transition-colors">
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
    <a href="{{ route('landing.search', 'A') }}" class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
        Selengkapnya
    </a>
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
    <a href="{{ route('landing.search', 'B') }}" class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
        Selengkapnya
    </a>
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
    <a href="{{ route('landing.search', 'C') }}" class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
        Selengkapnya
    </a>
</div>
    </div>
</div>      </div>
        </div>
      </div>

    <!-- Room Offers Section -->
      <div class="container mx-auto px-4 mt-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
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
    <a href="{{ route('landing.filter', 'kecil') }}" class="bg-black text-white px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
        <i class="fas fa-arrow-right mr-1"></i>Reservasi
    </a>
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
    <a href="{{ route('landing.filter', 'sedang') }}" class="bg-black text-white px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
        <i class="fas fa-arrow-right mr-1"></i>Reservasi
    </a>
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
    <a href="{{ route('landing.filter', 'besar') }}" class="bg-black text-white px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">
        <i class="fas fa-arrow-right mr-1"></i>Reservasi
    </a>
</div>
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

</section>
</main>
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
@endsection