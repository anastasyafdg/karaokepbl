<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran Selesai</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">

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

  <!-- Main Content -->
  <div class="flex justify-center items-start gap-6 p-6 text-gray-800">
    <!-- Left Panel -->
    <div class="bg-blue-100 rounded-xl p-6 w-2/3 shadow-lg">
      <h1 class="text-3xl font-bold mb-4 text-center">Pembayaran Selesai</h1>
      <div class="bg-green-200 text-green-900 px-4 py-3 rounded mb-6 text-sm font-medium text-center">
        Pembayaran Anda telah diterima. Pemesanan Anda akan dikonfirmasi setelah diverifikasi oleh admin kami!
      </div>
      <p class="text-center text-gray-600 text-lg mb-6">
        Terima kasih telah melakukan pemesanan <br />
        di MikkeuPangpang Karaoke.<br />
        Kami menantikan kedatangan Anda pada <strong>21 April 2025 pukul 12:00</strong>
      </p>
      <div class="flex justify-center space-x-4">
        <button class="bg-white px-5 py-2 rounded-lg shadow text-gray-700 font-medium">Lihat detail ruangan</button>
        <button class="bg-blue-500 px-5 py-2 rounded-lg text-white font-medium">Lihat pemesanan saya</button>
      </div>
    </div>

    <!-- Right Panel -->
    <div class="bg-blue-100 rounded-xl p-6 w-1/3 shadow-lg">
      <h2 class="text-2xl font-bold mb-4 text-center">Pembayaran</h2>
      <div class="flex space-x-4 mb-4">
      <img src="{{ asset('images/paketA.webp') }}" alt="Ruangan" class="h-20 w-20 object-cover rounded">
        <div class="text-sm">
          <p class="font-semibold leading-tight">SA001 - Paket A<br />Small Room</p>
          <p class="text-xs text-gray-700 mt-1">maks. 5 orang</p>
        </div>
      </div>
      <div class="text-sm space-y-1 mb-2">
        <p><span class="font-medium">Tanggal:</span> <span class="float-right">April 18th, 2025</span></p>
        <p><span class="font-medium">waktu:</span> <span class="float-right">13:00-16:00</span></p>
        <p><span class="font-medium">Durasi:</span> <span class="float-right">3 jam</span></p>
      </div>
      <hr class="my-2 border-gray-400">
      <div class="text-sm space-y-1 mb-2">
        <p><span class="font-medium">harga:</span> <span class="float-right">Rp. 50.000/jam</span></p>
        <p><span class="font-medium">Durasi:</span> <span class="float-right">3 Jam</span></p>
      </div>
      <hr class="my-2 border-gray-400">
      <div class="text-sm space-y-2 mb-2">
        <p><span class="font-medium">Total Harga</span> <span class="float-right text-red-600 font-bold">Rp. 150.000</span></p>
        <p><span class="font-medium">💳 Metode Pembayaran:</span> <span class="float-right">Transfer Bank</span></p>
      </div>
    </div>
  </div>
</body>
</html>
