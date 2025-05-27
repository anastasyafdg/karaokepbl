@extends('layouts.admin')

@section('title', 'Data Pengunjung')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
      <i class="fas fa-users mr-2"></i> Data Pengunjung
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
        </tr>
      </thead>
      <tbody>
       @foreach ($nama as $index => $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $item }}</td>
                        <td class="border px-4 py-2">{{ $email[$index] }}</td>
                        <td class="border px-4 py-2">{{ $no[$index] }}</td>
                    </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection
