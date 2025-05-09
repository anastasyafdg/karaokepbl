<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Karaoke - Ulasan Pengunjung</title>
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
          <h4 class="text-lg font-semibold">Halo, Semangat Kerjanya</h4>
          <small class="text-gray-500">Admin (@admin)</small>
        </div>
      </div>
      <a href="logout.php" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
        Keluar
      </a>
    </div>

    <!-- Ulasan Pengunjung -->
    <div class="p-8 bg-gray-200 flex-1">
      <h2 class="text-2xl font-bold mb-6 flex items-center">
        <i class="fas fa-comment-dots text-2xl mr-2"></i> 
        Ulasan Pengunjung
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Kartu Ulasan 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md relative">
          <div class="flex items-center mb-4">
            <i class="fas fa-comment-alt text-purple-500 text-3xl mr-3"></i>
            <div>
              <h4 class="font-bold">Melanie Putri</h4>
              <small class="text-gray-500">11 Apr 2025</small>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="flex text-yellow-400 text-lg">
              ★★★★☆
            </div>
          </div>
          <p class="text-gray-700 mb-4">"Pelayanan sangat baik, ruangan bersih dan nyaman. Sound system berkualitas."</p>
          <div class="flex space-x-3">
            <button class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm hover:bg-green-200">
              <i class="fas fa-check mr-1"></i> Setujui
            </button>
            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm hover:bg-red-200">
              <i class="fas fa-times mr-1"></i> Tolak
            </button>
          </div>
        </div>

        <!-- Kartu Ulasan 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md relative">
          <div class="flex items-center mb-4">
            <i class="fas fa-comment-alt text-purple-500 text-3xl mr-3"></i>
            <div>
              <h4 class="font-bold">Saskia Annda</h4>
              <small class="text-gray-500">24 Apr 2025</small>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="flex text-yellow-400 text-lg">
              ★★★★☆
            </div>
          </div>
          <p class="text-gray-700 mb-4">"Seru banget pelayanannya bagus dan sangat baik, rekomend banget!!!"</p>
          <div class="flex space-x-3">
            <button class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm hover:bg-green-200">
              <i class="fas fa-check mr-1"></i> Setujui
            </button>
            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm hover:bg-red-200">
              <i class="fas fa-times mr-1"></i> Tolak
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

</body>
</html>
