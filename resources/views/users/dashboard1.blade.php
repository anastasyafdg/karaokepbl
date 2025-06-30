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
          <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" alt="Interior 1" class="w-full h-[20rem] sm:h-[30rem] md:h-[40rem] object-cover">
        </div>
        <div class="carousel-item min-w-full">
          <img src="https://i.pinimg.com/736x/90/78/60/9078606cc3b5c1212addab7c68540ba6.jpg" alt="Interior 2" class="w-full h-[20rem] sm:h-[30rem] md:h-[40rem] object-cover">
        </div>
        <div class="carousel-item min-w-full">
          <img src="https://i.pinimg.com/736x/88/09/8f/88098f42149340a050702f6fa5d9d97a.jpg" alt="Interior 3" class="w-full h-[20rem] sm:h-[30rem] md:h-[40rem] object-cover">
        </div>
      </div>
      <!-- Carousel Buttons -->
      <div class="absolute inset-0 flex justify-between items-center px-4">
        <button class="carousel-btn text-white text-3xl" onclick="prevSlide()">❮</button>
        <button class="carousel-btn text-white text-3xl" onclick="nextSlide()">❯</button>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-900">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-white mb-8 text-center">Keunggulan Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="bg-gray-700 p-6 text-center rounded-lg">
        <i class="fas fa-check-circle text-yellow-500 text-4xl mb-4"></i>
        <h3 class="text-xl font-bold mb-2 text-white">Fasilitas Terbaik</h3>
        <p class="text-gray-300">Semua ruangan kami dilengkapi teknologi audio-visual terbaik dan sofa yang nyaman.</p>
      </div>
      <div class="bg-gray-800 p-6 text-center rounded-lg">
        <i class="fas fa-list text-yellow-500 text-4xl mb-4"></i>
        <h3 class="text-xl font-bold mb-2 text-white">Paket Room Beragam</h3>
        <p class="text-gray-300">Kami menawarkan berbagai pilihan paket room yang dapat disesuai kebutuhan.</p>
      </div>
      <div class="bg-gray-700 p-6 text-center rounded-lg">
        <i class="fas fa-smile text-yellow-500 text-4xl mb-4"></i>
        <h3 class="text-xl font-bold mb-2 text-white">Pelayanan Ramah</h3>
        <p class="text-gray-300">Kami siap melayani Anda dengan sepenuh hati untuk pengalaman karaoke yang menyenangkan.</p>
      </div>
      <div class="bg-gray-800 p-6 text-center rounded-lg">
        <i class="fas fa-glass-cheers text-yellow-500 text-4xl mb-4"></i>
        <h3 class="text-xl font-bold mb-2 text-white">Menu Beragam</h3>
        <p class="text-gray-300">Nikmati berbagai sajian makanan dan minuman berkualitas dengan pilihan yang bervariasi.</p>
      </div>
    </div>
  </div>
</section>

<!-- Package Cards -->
<section class="py-16">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto px-4">
    <!-- Paket A -->
    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col">
      <img src="{{ asset('images/paketA.png') }}" alt="Paket A" class="w-full h-48 object-cover">
      <div class="bg-yellow-400 p-4 flex flex-col justify-between flex-grow">
        <div>
          <div class="flex items-center justify-between mb-2">
            <h3 class="text-lg font-bold text-black">Paket A</h3>
            <div class="flex space-x-1">
              @for($i=0; $i<5; $i++) <i class="fas fa-star text-yellow-200"></i> @endfor
            </div>
          </div>
          <p class="text-sm text-black">Hanya ruangan, cocok untuk karaoke biasa.</p>
        </div>
        <div class="flex justify-end mt-4">
          <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">Selengkapnya</a>
        </div>
      </div>
    </div>

    <!-- Paket B -->
    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col">
      <img src="{{ asset('images/paketB.png') }}" alt="Paket B" class="w-full h-48 object-cover">
      <div class="bg-yellow-400 p-4 flex flex-col justify-between flex-grow">
        <div>
          <div class="flex items-center justify-between mb-2">
            <h3 class="text-lg font-bold text-black">Paket B</h3>
            <div class="flex space-x-1">
              @for($i=0; $i<5; $i++) <i class="fas fa-star text-yellow-200"></i> @endfor
            </div>
          </div>
          <p class="text-sm text-black">Makanan ringan seperti nugget, ayam pop, dan nasi goreng.</p>
        </div>
        <div class="flex justify-end mt-4">
          <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">Selengkapnya</a>
        </div>
      </div>
    </div>

    <!-- Paket C -->
    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex flex-col">
      <img src="{{ asset('images/paketB.png') }}" alt="Paket C" class="w-full h-48 object-cover">
      <div class="bg-yellow-400 p-4 flex flex-col justify-between flex-grow">
        <div>
          <div class="flex items-center justify-between mb-2">
            <h3 class="text-lg font-bold text-black">Paket C</h3>
            <div class="flex space-x-1">
              @for($i=0; $i<5; $i++) <i class="fas fa-star text-yellow-200"></i> @endfor
            </div>
          </div>
          <p class="text-sm text-black">Tersedia makanan berat, cocok untuk pesta bersama.</p>
        </div>
        <div class="flex justify-end mt-4">
          <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800 transition-colors">Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Carousel JS -->
<script>
  let currentSlide = 0;

  function showSlide(index) {
    const carousel = document.getElementById("carousel");
    const totalSlides = carousel.children.length;
    currentSlide = (index + totalSlides) % totalSlides;
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  setInterval(() => {
    nextSlide();
  }, 5000);
</script>

@endsection
