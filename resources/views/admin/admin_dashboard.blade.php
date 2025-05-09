<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

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
    <div class="flex items-center justify-between bg-white p-4 shadow-md">
      <div class="flex items-center space-x-4">
        <img src="images/logo.png" alt="Logo" class="w-12 h-12 rounded-full object-cover">
        <div>
          <h4 class="text-lg font-semibold">Halo, semangat Kerjanya</h4>
          <small class="text-gray-500">Admin (@admin)</small>
        </div>
      </div>
      <a href="logout.php" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
        Keluar
      </a>
    </div>

    <!-- Dashboard Content -->
    <main class="p-6">
      <div class="flex justify-between items-center mb-4">
        <h5 class="text-xl font-semibold flex items-center">
          <i class="fas fa-home mr-2"></i> Beranda
        </h5>
      </div>
      <hr class="mb-6">

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md p-6 relative overflow-hidden">
          <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-xl"></div>
          <h6 class="text-lg font-semibold flex items-center mb-2"><i class="fas fa-box-open mr-2"></i> Paket Ruangan</h6>
          <p>Total: 3</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 relative overflow-hidden">
          <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-xl"></div>
          <h6 class="text-lg font-semibold flex items-center mb-2"><i class="fas fa-users mr-2"></i> Data Pengunjung</h6>
          <p>Total: 4</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 relative overflow-hidden">
          <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-xl"></div>
          <h6 class="text-lg font-semibold flex items-center mb-2"><i class="fas fa-comment-alt mr-2"></i> Ulasan</h6>
          <p>Total: 5</p>
        </div>
      </div>

    </main>

  </div>

</div>

</body>
</html>
