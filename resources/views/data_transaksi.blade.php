<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Karaoke - Transaksi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

  <!-- Sidebar -->
  <div class="w-64 bg-gradient-to-b from-blue-300 to-blue-800 text-white p-6 flex flex-col">
        <h3 class="text-2xl font-bold mb-6"><i class="fas fa-th-large mr-2"></i> Menu</h3>
        <nav class="flex flex-col gap-3">
            <a href="admin.php" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="data_pengunjung.php" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-users"></i> Data Pengunjung
            </a>
            <a href="data_ulasan.php" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-comment-alt"></i> Ulasan
            </a>
            <a href="data_transaksi.php" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-receipt"></i> Transaksi
            </a>
            <a href="paket_admin.php" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-box-open"></i> Paket Ruangan
            </a>
            <a href="data_ruangan.php" class="flex items-center gap-2 hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-door-closed"></i> Data Ruangan
            </a>
        </nav>
    </div>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">

    <!-- Navbar -->
    <div class="flex items-center justify-between bg-white p-4 shadow-md">
      <div class="flex items-center space-x-4">
        <img src="logo.jpeg" alt="Logo" class="w-12 h-12 rounded-full object-cover">
        <div>
          <h4 class="text-lg font-semibold">Halo, Semangat Kerjanya</h4>
          <small class="text-gray-500">Admin (@admin)</small>
        </div>
      </div>
      <a href="logout.php" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
        Keluar
      </a>
    </div>

    <!-- Content Transaksi -->
    <div class="p-6">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
          <i class="fas fa-users mr-2"></i> Transaksi
        </h2>

        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th class="border border-gray-200 px-4 py-2 text-left">ID Pemesanan</th>
                <th class="border border-gray-200 px-4 py-2 text-left">Nama Pengunjung</th>
                <th class="border border-gray-200 px-4 py-2 text-left">Paket Ruangan</th>
                <th class="border border-gray-200 px-4 py-2 text-left">Jenis Ruangan</th>
                <th class="border border-gray-200 px-4 py-2 text-left">Tanggal dan Waktu</th>
                <th class="border border-gray-200 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-200 px-4 py-2 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody>
  <tr class="hover:bg-gray-50">
    <td class="border border-gray-200 px-4 py-2">SA001</td>
    <td class="border border-gray-200 px-4 py-2">Melanie Putri</td>
    <td class="border border-gray-200 px-4 py-2">A</td>
    <td class="border border-gray-200 px-4 py-2">Small</td>
    <td class="border border-gray-200 px-4 py-2">15 Apr 2025, 19:00</td>
    <td class="border border-gray-200 px-4 py-2 text-yellow-500 font-semibold">Diproses</td>
    <td class="border border-gray-200 px-4 py-2">
      <div class="flex space-x-2">
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Edit</a>
        <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</a>
      </div>
    </td>
  </tr>
  <tr class="hover:bg-gray-50">
    <td class="border border-gray-200 px-4 py-2">MB003</td>
    <td class="border border-gray-200 px-4 py-2">Saskia Ananda Irawan</td>
    <td class="border border-gray-200 px-4 py-2">B</td>
    <td class="border border-gray-200 px-4 py-2">Medium</td>
    <td class="border border-gray-200 px-4 py-2">18 Mei 2025, 15:00</td>
    <td class="border border-gray-200 px-4 py-2 text-green-500 font-semibold">Selesai</td>
    <td class="border border-gray-200 px-4 py-2">
      <div class="flex space-x-2">
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Edit</a>
        <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</a>
      </div>
    </td>
  </tr>
  <tr class="hover:bg-gray-50">
    <td class="border border-gray-200 px-4 py-2">LC006</td>
    <td class="border border-gray-200 px-4 py-2">Anastasya Floresha</td>
    <td class="border border-gray-200 px-4 py-2">C</td>
    <td class="border border-gray-200 px-4 py-2">Large</td>
    <td class="border border-gray-200 px-4 py-2">20 Juni 2025, 17:00</td>
    <td class="border border-gray-200 px-4 py-2 text-blue-500 font-semibold">Terkonfirmasi</td>
    <td class="border border-gray-200 px-4 py-2">
      <div class="flex space-x-2">
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Edit</a>
        <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</a>
      </div>
    </td>
  </tr>
</tbody>

          </table>
        </div>

      </div>
    </div>

  </div>
</div>

</body>
</html>
