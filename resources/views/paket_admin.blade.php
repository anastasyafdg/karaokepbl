<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Paket Ruangan Admin Karaoke</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#e6edf3] font-sans">
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-gradient-to-b from-blue-300 to-blue-800 text-white p-6 flex flex-col">
        <h3 class="text-2xl font-bold mb-6"><i class="fas fa-th-large mr-2"></i> Menu</h3>
        <nav class="flex flex-col gap-3">
        <a href="{{ route('admin_dashboard') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
              <i class="fas fa-home"></i> Beranda
          </a>
          <a href="{{ route('data_pengunjung') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
              <i class="fas fa-users"></i> Data Pengunjung
          </a>
          <a href="{{ route('ulasan') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
              <i class="fas fa-comment-alt"></i> Ulasan
          </a>
          <a href="{{ route('transaksi') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
              <i class="fas fa-receipt"></i> Transaksi
          </a>
          <a href="{{ route('paket_admin') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
              <i class="fas fa-box-open"></i> Paket Ruangan
          </a>
          <a href="{{ route('data_ruangan') }}" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
              <i class="fas fa-door-closed"></i> Data Ruangan
          </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <div class="bg-white p-4 flex justify-between items-center shadow">
            <div class="flex items-center gap-4">
                <img src="images/logo.png" alt="Logo" class="w-12 h-12 rounded-full object-cover">
                <div>
                    <h4 class="text-lg font-semibold">Halo, semangat Kerjanya</h4>
                    <small class="text-gray-500">Admin (@admin)</small>
                </div>
            </div>
            <a href="logout.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Keluar</a>
        </div>

        <!-- Content -->
        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h5 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-box-open mr-2"></i> Paket Ruangan
                </h5>
            </div>
            <hr class="mb-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Paket A -->
                <div class="bg-white rounded-lg shadow p-6 relative">
                    <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
                    <h6 class="text-lg font-bold mb-2">Paket A</h6>
                    <p class="mb-1">2 - 4 orang</p>
                    <p class="mb-1 font-semibold">Harga: Rp 100.000/jam</p>
                    <p class="mb-1">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
                    <p>Status: <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Tersedia</span></p>
                </div>

                <!-- Paket B -->
                <div class="bg-white rounded-lg shadow p-6 relative">
                    <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
                    <h6 class="text-lg font-bold mb-2">Paket B</h6>
                    <p class="mb-1">5 - 9 orang</p>
                    <p class="mb-1 font-semibold">Harga: Rp 120.000/jam</p>
                    <p class="mb-1">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
                    <p>Status: <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm">Terpakai</span></p>
                </div>

                <!-- Paket C -->
                <div class="bg-white rounded-lg shadow p-6 relative">
                    <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
                    <h6 class="text-lg font-bold mb-2">Paket C</h6>
                    <p class="mb-1">10 - 16 orang</p>
                    <p class="mb-1 font-semibold">Harga: Rp 150.000/jam</p>
                    <p class="mb-1">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
                    <p>Status: <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm">Terpakai</span></p>
                </div>
            </div>

        </main>
    </div>

</div>
</body>
</html>
