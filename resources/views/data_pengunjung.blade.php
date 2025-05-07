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
          <i class="fas fa-users mr-2"></i> Data Pengunjung
        </h5>
      </div>
      <hr class="mb-6">

      <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">NO</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">NAMA</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">EMAIL</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">NO HANDPHONE</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          </tbody>
        </table>
      </div>

    </main>

  </div>

</div>

</body>
</html>
