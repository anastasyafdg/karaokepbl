@extends('layouts.admin')

@section('title', 'Pesan Pengunjung')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
      <i class="fas fa-users mr-2"></i> Pesan Pengunjung
    </h2>
  <hr class="mb-6 border-gray-200" />

  <!-- Tabel Data Pengunjung - Komponen Flowbite -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-100">
        <tr>
          <th scope="col" class="px-6 py-3">NO</th>
          <th scope="col" class="px-6 py-3">NAMA</th>
          <th scope="col" class="px-6 py-3">EMAIL</th>
          <th scope="col" class="px-6 py-3">NO HANDPHONE</th>
          <th scope="col" class="px-6 py-3">PESAN PENGUNJUNG</th>
          <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($pesan as $index => $pesan)
        <tr class="bg-white border-b hover:bg-gray-50">
            <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
            <td class="border px-4 py-2">{{ $pesan->nama }}</td>
            <td class="border px-4 py-2">{{ $pesan->email }}</td>
            <td class="border px-4 py-2">{{ $pesan->no }}</td>
            <td class="border px-4 py-2">{{ $pesan->pesan }}</td>
            <td class="px-4 py-4">
                <a href="#" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded text-sm px-3 py-1">Hapus</a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection
