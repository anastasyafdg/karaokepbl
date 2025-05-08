<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - Mikkeu Pangpang Karaoke</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-900 text-white">
    <!-- Header & Navigation -->
    <header class="bg-[#e0f2fe] py-2">
      <nav class="relative">
      <ul class="flex justify-center items-center list-none p-0 m-0 text-black">
          <li class="mx-4"><a href="halaman.php">Beranda</a></li>
          <li class="mx-4"><a href="ruangan.php">Ruangan</a></li>
          <li class="logo-center">
            <img
              src="images/logo.png"
              alt="Logo Karaoke Mikkeu Pangpang"
              class="h-12 w-12 rounded-full object-cover"
            />
          </li>
          <li class="mx-4"><a href="ulasan.php">Ulasan</a></li>
          <li class="mx-4"><a href="kontak.php">Kontak</a></li>
        </ul>

        <div class="absolute right-4 top-1/2 -translate-y-1/2">
          <div class="relative">
            <button
              class="text-black focus:outline-none"
              id="profileDropdown"
            >
              <img
                src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                alt="Profil pengguna"
                class="w-8 h-8 rounded-full"
              />
            </button>
            <ul
              class="hidden absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg"
              id="dropdownMenu"
            >
              <li>
                <a href="edit.php" class="block px-4 py-2 hover:bg-gray-200">Edit Profil</a>
              </li>
              <li><hr class="border-gray-300" /></li>
              <li>
                <a href="logout.php" class="block px-4 py-2 hover:bg-gray-200">Keluar</a>
              </li>
              <li><hr class="border-gray-300" /></li>
              <li>
                <a href="riwayat.php" class="block px-4 py-2 hover:bg-gray-200">Riwayat Pemesanan</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main class="p-20">
      <section class="text-center mb-8">
        <h1 class="text-3xl font-bold">Hubungi Kami Sekarang!</h1>
        <p>
          Jangan tunggu lagi! Reservasi sekarang dan nikmati pengalaman
          karaoke eksklusif di Mikkeu Pangpang Karaoke. Hubungi kami atau kunjungi
          langsung untuk booking room pilihan Anda.
        </p>
      </section>
      <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
          <h2 class="text-xl font-bold mb-4">Kontak Kami:</h2>
          <div class="mb-4">
            <div class="flex items-center mb-2">
              <i class="fas fa-phone-alt text-yellow-500 mr-2"></i>
              <span>Telepon: 081382341800</span>
            </div>
            <div class="flex items-center">
              <i class="fab fa-whatsapp text-green-500 mr-2"></i>
              <span>WhatsApp: 081382341800</span>
            </div>
          </div>
          <h2 class="text-xl font-bold mb-4">Follow Us:</h2>
          <div class="flex space-x-4 mb-4">
            <a href="#" class="text-yellow-500"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-yellow-500"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="text-yellow-500"><i class="fab fa-youtube"></i></a>
            <a href="#" class="text-yellow-500"><i class="fab fa-facebook"></i></a>
          </div>
          <h2 class="text-xl font-bold mb-4">Alamat Kami:</h2>
          <p class="mb-4">Jl. Pollux, Batam, Kepulauan Riau</p>
          <div class="flex justify-center">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.171230123456!2d104.0453151!3d1.1184859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1234567890123%3A0x1234567890123456!2sPollux%20Habibie%20International%20Financial%20Center!5e0!3m2!1sen!2sid!4v1631234567890!5m2!1sen!2sid"
              width="600"
              height="300"
              class="rounded-lg border-0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg">
          <h2 class="text-xl font-bold mb-4">Hubungi Kami:</h2>
          <form class="space-y-4">
            <input type="text" placeholder="Nama" class="w-full p-2 rounded bg-gray-700 text-white" />
            <input type="email" placeholder="Email" class="w-full p-2 rounded bg-gray-700 text-white" />
            <input type="text" placeholder="No. HP" class="w-full p-2 rounded bg-gray-700 text-white" />
            <textarea placeholder="Pesan" class="w-full p-2 rounded bg-gray-700 text-white h-32"></textarea>
            <button type="submit" class="w-full p-2 rounded bg-yellow-500 text-black font-bold">KIRIM PESAN</button>
          </form>
        </div>
      </section>
    </main>
  </body>
  <script>
    const profileDropdown = document.getElementById('profileDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');
    profileDropdown.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });
  </script>
</html>
