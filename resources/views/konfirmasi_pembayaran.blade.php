<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mikkeu Pangpang Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-black font-sans">


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
  <main class="max-w-6xl mx-auto my-8 grid grid-cols-1 md:grid-cols-2 gap-8 px-4 text-white">
    
    <!-- Payment Info -->
    <section class="bg-white text-black p-6 rounded-lg shadow-lg space-y-6">
      <h2 class="text-xl font-bold">Informasi Pembayaran</h2>

      <div class="flex items-center bg-gray-100 rounded p-3">
        <span class="mr-2">⏱</span>
        <span>Batas waktu pembayaran</span>
        <span class="ml-auto font-semibold" id="timer">30:00</span>
      </div>

      <div>
        <h3 class="font-semibold mb-2">Bank Transfer Details</h3>

        <div class="space-y-2">
          <div class="flex justify-between items-center">
            <span>Nama Bank:</span>
            <span>Bank Negara Indonesia</span>
          </div>
          <div class="flex justify-between items-center">
            <span>Nomor Rekening:</span>
            <span>12345678910</span>
          </div>
          <div class="flex justify-between items-center">
            <span>Nama Pengguna:</span>
            <span>MikkeuPangpang Karaoke</span>
          </div>
          <div class="flex justify-between items-center font-bold">
            <span>Total Pembayaran:</span>
            <span>Rp. 150.000</span>
          </div>
        </div>
      </div>

      <div>
        <h3 class="font-semibold mb-2">Unggah Bukti Pembayaran</h3>
        <div class="flex items-center bg-gray-100 rounded p-2">
          <span>Pilih gambar</span>
          <span class="ml-4 text-gray-600">Screenshot (150).png</span>
        </div>
      </div>

      <form action="pembayaran_selesai.php" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tanggal" value="2025-04-18">
        <input type="hidden" name="waktu_mulai" value="13:00">
        <input type="hidden" name="waktu_selesai" value="16:00">
        <input type="hidden" name="catatan" value="Tidak ada">
        <input type="hidden" name="metode_pembayaran" value="Bank Transfer">
        <input type="hidden" name="total_harga" value="150000">
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded">
          Bayar Sekarang
        </button>
      </form>

      <div class="text-sm text-gray-700 space-y-1">
        <p>Setelah melakukan pembayaran, unggah bukti pembayaran Anda untuk mengkonfirmasi pemesanan.</p>
        <p>Pemesanan Anda akan dikonfirmasi setelah kami memverifikasi bukti pembayaran Anda.</p>
        <p>Pembayaran harus diselesaikan dalam batas waktu yang ditentukan, jika tidak maka pemesanan Anda akan dibatalkan.</p>
      </div>
    </section>

    <!-- Order Summary -->
    <section class="bg-white text-black p-6 rounded-lg shadow-lg space-y-4">
      <h2 class="text-xl font-bold">Pembayaran</h2>

      <div class="flex items-center space-x-4">
      <img src="{{ asset('images/paketA.webp') }}" alt="Ruangan" class="h-20 w-20 object-cover rounded">
        <div>
          <div class="font-semibold">SA001 Paket A</div>
          <div class="text-sm text-gray-600">Small Room</div>
          <div class="text-sm text-gray-600">maks. 5 orang</div>
        </div>
      </div>

      <div class="space-y-2">
        <div class="flex justify-between">
          <span>Tanggal:</span>
          <span>April 18th, 2025</span>
        </div>
        <div class="flex justify-between">
          <span>Waktu:</span>
          <span>13:00 - 16:00</span>
        </div>
        <div class="flex justify-between">
          <span>Durasi:</span>
          <span>3 jam</span>
        </div>
      </div>

      <div class="space-y-2">
        <div class="flex justify-between">
          <span>Harga:</span>
          <span>Rp. 50.000/jam</span>
        </div>
        <div class="flex justify-between">
          <span>Durasi:</span>
          <span>3 Jam</span>
        </div>
      </div>

      <div class="border-t pt-4 space-y-2">
        <div class="flex justify-between font-bold">
          <span>Total Harga:</span>
          <span>Rp. 150.000</span>
        </div>
        <div class="flex justify-between">
          <span>Metode Pembayaran:</span>
          <span>Bank Transfer</span>
        </div>
        <div class="flex justify-between">
          <span>Status:</span>
          <span class="text-yellow-500 font-semibold">Tertunda</span>
        </div>
      </div>

      <div class="text-sm text-gray-700">
        <p>Semua harga sudah termasuk pajak dan biaya layanan.</p>
        <p>Biaya pembatalan mungkin dikenakan untuk pembatalan yang terlambat.</p>
      </div>
    </section>
  </main>

  <!-- Timer Script Only -->
  <script>
    let timeLeft = 1800;
    function updateTimer() {
      const minutes = String(Math.floor(timeLeft / 60)).padStart(2, '0');
      const seconds = String(timeLeft % 60).padStart(2, '0');
      document.getElementById('timer').textContent = `${minutes}:${seconds}`;
      if (timeLeft > 0) {
        timeLeft--;
        setTimeout(updateTimer, 1000);
      }
    }
    updateTimer();
  </script>
</body>
</html>
