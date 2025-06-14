@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-12 md:py-20">
        <section class="text-center mb-12 max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">
                Hubungi Kami Sekarang!
            </h1>
            <p class="text-lg text-gray-300">
                Jangan tunggu lagi! Reservasi sekarang dan nikmati pengalaman karaoke eksklusif di Mikkeu Pangpang Karaoke. 
                Hubungi kami atau kunjungi langsung untuk booking room pilihan Anda.
            </p>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-8">
                <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                    <h2 class="text-2xl font-bold mb-6 text-yellow-400">Kontak Kami</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                                <i class="fas fa-phone-alt text-yellow-500"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Telepon/WhatsApp</h3>
                                <p class="text-white">0813-8234-1800</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-yellow-500"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Alamat Kami</h3>
                                <p class="text-gray-300">Jl. Pollux, Batam, Kepulauan Riau</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                                <i class="fas fa-clock text-yellow-500"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Jam Operasional</h3>
                                <p class="text-gray-300">Setiap Hari : 14.00 - 05.00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="font-semibold text-lg mb-4">Follow Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="social-icon text-2xl text-gray-400 hover:text-yellow-500">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-icon text-2xl text-gray-400 hover:text-yellow-500">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            <a href="#" class="social-icon text-2xl text-gray-400 hover:text-yellow-500">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="social-icon text-2xl text-gray-400 hover:text-yellow-500">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.171230123456!2d104.0453151!3d1.1184859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1234567890123%3A0x1234567890123456!2sPollux%20Habibie%20International%20Financial%20Center!5e0!3m2!1sen!2sid!4v1631234567890!5m2!1sen!2sid"
                        width="100%"
                        height="300"
                        class="rounded-lg border-0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-2xl font-bold mb-6 text-yellow-400">Kirim Pesan</h2>
                <form method="POST" action="{{ route('kontak.store') }}" class="space-y-6 contact-form">
                    @csrf
                    <div>
                        <label for="nama" class="block text-gray-300 mb-2">Nama Lengkap</label>
                        <input 
                            type="text" 
                            id="nama" 
                            name="nama"
                            placeholder="Masukkan nama lengkap" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500 @error('nama') border-red-500 @enderror"
                            value="{{ old('nama') }}"
                            required
                        />
                        @error('nama')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-gray-300 mb-2">Alamat Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            placeholder="Masukkan email" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="no" class="block text-gray-300 mb-2">Nomor Telepon</label>
                        <input 
                            type="tel" 
                            id="no" 
                            name="no"
                            placeholder="Masukkan nomor telepon" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500 @error('no') border-red-500 @enderror"
                            value="{{ old('no') }}"
                            required
                        />
                        @error('no')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="pesan" class="block text-gray-300 mb-2">Pesan Anda</label>
                        <textarea 
                            id="pesan" 
                            name="pesan"
                            placeholder="Tulis pesan Anda di sini..." 
                            rows="5"
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500 @error('pesan') border-red-500 @enderror"
                            required
                        >{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full py-3 px-6 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black font-bold rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 shadow-lg"
                    >
                        <i class="fas fa-paper-plane mr-2"></i> KIRIM PESAN
                    </button>
                </form>
            </div>
        </section>
    </main>
    <script>
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
@endsection