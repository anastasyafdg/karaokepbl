<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - Mikkeu Pangpang Karaoke</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0ea5e9',
                        secondary: '#f59e0b',
                        dark: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #f59e0b;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #f59e0b;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .contact-form input,
        .contact-form textarea {
            transition: all 0.3s ease;
        }
        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.5);
        }
        .social-icon {
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .social-icon:hover {
            transform: translateY(-3px);
            color: #f59e0b;
        }
        .dropdown-item {
            transition: all 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-sans min-h-screen flex flex-col">
   <!-- Header & Navigation -->
<!-- Navbar -->
<header class="bg-blue-200 shadow-md">
  <nav class="max-w-9xl mx-auto px-6 py-4">
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
      <div class="relative group">
        <button class="focus:outline-none">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
               alt="Profile" 
               class="w-8 h-8 rounded-full border-2 border-blue-300">
        </button>
        
        <!-- Dropdown Menu -->
        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white shadow-lg hidden">
          <a href="edit_profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
          <a href="riwayat" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
          <hr class="border-gray-200 my-1">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
      </div>
    </div>
  </nav>
</header>

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
                                <p class="text-gray-300">0813-8234-1800</p>
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
                                <p class="text-gray-300">Setiap Hari: 14.00 - 05.00 WIB</p>
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
                <form class="space-y-6 contact-form">
                    <div>
                        <label for="name" class="block text-gray-300 mb-2">Nama Lengkap</label>
                        <input 
                            type="text" 
                            id="name" 
                            placeholder="Masukkan nama lengkap" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500"
                        />
                    </div>
                    
                    <div>
                        <label for="email" class="block text-gray-300 mb-2">Alamat Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            placeholder="Masukkan email" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500"
                        />
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-gray-300 mb-2">Nomor Telepon</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            placeholder="Masukkan nomor telepon" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500"
                        />
                    </div>
                    
                    <div>
                        <label for="message" class="block text-gray-300 mb-2">Pesan Anda</label>
                        <textarea 
                            id="message" 
                            placeholder="Tulis pesan Anda di sini..." 
                            rows="5"
                            class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-yellow-500"
                        ></textarea>
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

    <!-- Footer -->
    <footer class="bg-gray-800 py-8">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2023 Mikkeu Pangpang Karaoke. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
      const profileButton = document.querySelector('.relative.group button');
      const dropdownMenu = document.querySelector('.relative.group .dropdown-menu');

      profileButton.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
      });

      // Tutup dropdown ketika klik di luar elemen
      document.addEventListener('click', function (e) {
        if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
          dropdownMenu.classList.add('hidden');
        }
      });

      // Mencegah dropdown tertutup saat mengklik isinya
      dropdownMenu.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    });
</script>
</body>
</html>