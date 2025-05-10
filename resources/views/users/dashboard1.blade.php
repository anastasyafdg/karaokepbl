@extends('layouts.guest')

@section('content')

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
          <img src="{{ asset('images/paketB.png') }}" alt="Paket C" class="w-full h-48 object-cover">
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

</body>
</html>

@endsection