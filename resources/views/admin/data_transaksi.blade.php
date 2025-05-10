@extends('layouts.admin')

@section('title', 'Data Transaksi')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-users mr-2"></i> Transaksi
        </h2>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-200">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Pemesanan</th>
                        <th scope="col" class="px-6 py-3">Nama Pengunjung</th>
                        <th scope="col" class="px-6 py-3">Paket Ruangan</th>
                        <th scope="col" class="px-6 py-3">Jenis Ruangan</th>
                        <th scope="col" class="px-6 py-3">Tanggal dan Waktu</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">SA001</td>
                        <td class="px-6 py-4">Melanie Putri</td>
                        <td class="px-6 py-4">A</td>
                        <td class="px-6 py-4">Small</td>
                        <td class="px-6 py-4">15 Apr 2025, 19:00</td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Diproses</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="#" class="font-medium text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-sm">Edit</a>
                                <a href="#" class="font-medium text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">MB003</td>
                        <td class="px-6 py-4">Saskia Ananda Irawan</td>
                        <td class="px-6 py-4">B</td>
                        <td class="px-6 py-4">Medium</td>
                        <td class="px-6 py-4">18 Mei 2025, 15:00</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Selesai</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="#" class="font-medium text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-sm">Edit</a>
                                <a href="#" class="font-medium text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-6 py-4">LC006</td>
                        <td class="px-6 py-4">Anastasya Floresha</td>
                        <td class="px-6 py-4">C</td>
                        <td class="px-6 py-4">Large</td>
                        <td class="px-6 py-4">20 Juni 2025, 17:00</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Terkonfirmasi</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="#" class="font-medium text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-sm">Edit</a>
                                <a href="#" class="font-medium text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
