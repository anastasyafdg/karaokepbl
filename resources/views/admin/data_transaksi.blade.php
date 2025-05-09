@extends('layouts.admin')

@section('title', 'Data Transaksi')

@section('content')
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

@endsection