<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Isi Informasi Pembayaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen text-gray-700 font-['Roboto']">

  <!-- Navbar -->
  <header>
    <nav class="relative bg-white py-3">
      <ul class="flex justify-center items-center list-none p-0 m-0 space-x-6">
        <li><a href="{{ url('halaman') }}" class="text-gray-800 hover:text-blue-500">Beranda</a></li>
        <li><a href="{{ url('ruangan') }}" class="text-gray-800 hover:text-blue-500">Ruangan</a></li>
        <li class="mx-4">
          <img src="{{ asset('images/logo.png') }}" alt="Logo Karaoke Mikkeu Pangpang" class="h-12">
        </li>
        <li><a href="{{ url('ulasan') }}" class="text-gray-800 hover:text-blue-500">Ulasan</a></li>
        <li><a href="{{ url('kontak') }}" class="text-gray-800 hover:text-blue-500">Kontak</a></li>
      </ul>

      <div class="absolute right-4 top-1/2 -translate-y-1/2">
        <div class="relative group">
          <button class="focus:outline-none">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profil pengguna" class="w-8 h-8 rounded-full">
          </button>
          <ul class="absolute right-0 mt-2 w-40 bg-white rounded shadow-lg text-sm hidden group-hover:block z-50">
            <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ url('edit') }}">Edit Profil</a></li>
            <li><hr class="my-1 border-gray-200"></li>
            <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ url('logout') }}">Keluar</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Konten Utama -->
  <main class="container mx-auto px-6 py-10">
    <form action="{{ url('konfirmasi_pembayaran') }}" method="post" class="flex flex-col md:flex-row gap-8">
      @csrf

      <!-- Informasi Pemesanan -->
      <div class="bg-white p-8 rounded-lg shadow-md flex-1">
        <h2 class="text-2xl font-bold mb-6">Informasi Pemesanan</h2>

        <label class="block mb-2 font-semibold">Tanggal Reservasi</label>
        <input type="date" name="tanggal" required class="w-full p-2 rounded border border-gray-300 mb-4">

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block mb-2 font-semibold">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" required class="w-full p-2 rounded border border-gray-300">
          </div>
          <div>
            <label class="block mb-2 font-semibold">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" required class="w-full p-2 rounded border border-gray-300">
          </div>
        </div>

        <label class="block mt-4 mb-2 font-semibold">Catatan Tambahan (Opsional)</label>
        <textarea name="catatan" rows="3" class="w-full p-2 rounded border border-gray-300" placeholder="Ada tambahan lain?"></textarea>

        <label class="block mt-4 mb-2 font-semibold">Metode Pembayaran</label>
        <select name="metode_pembayaran" required class="w-full p-2 rounded border border-gray-300">
          <option value="transfer">Bank Transfer</option>
        </select>

        <input type="hidden" name="total_harga" value="150000">

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 mt-6 py-3 rounded font-bold text-white">
          Bayar Sekarang
        </button>
      </div>

      <!-- Ringkasan Pembayaran -->
      <div class="bg-white p-8 rounded-lg shadow-md flex-1">
        <h2 class="text-2xl font-bold mb-6">Pembayaran</h2>

        <div class="flex items-center gap-4 mb-6">
          <img src="{{ asset('images/paketA.webp') }}" alt="Ruangan" class="h-20 w-20 object-cover rounded">
          <div>
            <p class="font-bold">SA001 - Paket A</p>
            <p class="text-sm text-gray-500">Small Room (Maks. 5 orang)</p>
          </div>
        </div>

        <p class="mb-2">Harga: <strong>Rp. 50.000/jam</strong></p>
        <p class="mb-2">Durasi: <strong>3 Jam</strong></p>
        <p class="mb-2">Tanggal: <strong id="tanggal_placeholder">-</strong></p>
        <p class="mt-6 text-xl text-red-500 font-bold">Total: Rp. 150.000</p>

        <ul class="text-gray-500 text-xs mt-4 list-disc list-inside">
          <li>Harga termasuk pajak & layanan.</li>
          <li>Pembatalan bisa dikenakan biaya.</li>
        </ul>
      </div>
    </form>
  </main>

  <footer class="text-center py-4 text-gray-400 text-sm">
    © 2025 Mikkeu Karaoke. All rights reserved.
  </footer>
</body>
</html>
