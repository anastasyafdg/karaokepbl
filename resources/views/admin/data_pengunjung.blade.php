@extends('layouts.admin')

@section('title', 'Data Pengunjung')

@section('content')
<main class="p-6">
  <!-- Judul Halaman -->
  <div class="flex justify-between items-center mb-4">
    <h5 class="text-xl font-semibold flex items-center text-gray-900">
      <i class="fas fa-users mr-2"></i> Data Pengunjung
    </h5>
  </div>
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
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b hover:bg-gray-50">
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4">Melanie Putri</td>
          <td class="px-6 py-4">Melanie@gmail.com</td>
          <td class="px-6 py-4">0854345553</td>
        </tr>
        <tr class="bg-white border-b hover:bg-gray-50">
          <td class="px-6 py-4">2</td>
          <td class="px-6 py-4">Saskia Ananda Irawan</td>
          <td class="px-6 py-4">Saskia@gmail.com</td>
          <td class="px-6 py-4">0854345553</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
@endsection
