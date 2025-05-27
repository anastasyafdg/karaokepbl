@extends('layouts.admin')

@section('title', 'Data Ruangan')

@section('content')
<main class="p-6">
  <div class="flex justify-between items-center mb-4">
    <h5 class="text-xl font-semibold flex items-center">
      <i class="fas fa-door-closed mr-2"></i> Data Ruangan
    </h5>
    <button data-modal-target="addModal" data-modal-toggle="addModal"
      class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center">
      <i class="fas fa-plus mr-2"></i> Tambah Ruangan
    </button>
  </div>
  <hr class="mb-6">

  <div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">No</th>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">Jenis</th>
          <th scope="col" class="px-6 py-3">Paket</th>
          <th scope="col" class="px-6 py-3">Kapasitas</th>
          <th scope="col" class="px-6 py-3">Harga</th>
          <th scope="col" class="px-6 py-3">Fasilitas</th>
          <th scope="col" class="px-6 py-3">Gambar</th>
          <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($ruangan as $index => $r)
      <tr class="bg-white border-b hover:bg-gray-50">
        <td class="px-6 py-4">{{ $index + 1 }}</td>
        <td class="px-6 py-4">{{ $r->id }}</td>
        <td class="px-6 py-4">{{ $r->jenis }}</td>
        <td class="px-6 py-4">{{ $r->paket }}</td>
        <td class="px-6 py-4">{{ $r->kapasitas }}</td>
        <td class="px-6 py-4">Rp {{ number_format($r->harga, 0, ',', '.') }}</td>
        <td class="px-6 py-4">{{ $r->fasilitas }}</td>
        <td class="px-6 py-4">
          <img src="{{ asset('images/' . $r->gambar) }}" alt="Gambar Ruangan" class="w-20 h-16 object-cover rounded">
        </td>
        <td class="px-4 py-4">
          <div class="flex gap-2">
          <a href="#" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded text-sm px-3 py-1">Edit</a>
          <a href="#" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded text-sm px-3 py-1">Hapus</a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
    </table>
  </div>
</main>

<!-- Modal Tambah -->
<div id="addModal" tabindex="-1" aria-hidden="true"
  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Data Ruangan</h3>
        <button type="button" data-modal-hide="addModal"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <form action="tambah_ruangan.php" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
        <div class="grid grid-cols-2 gap-4">
          <input type="text" name="id" placeholder="ID Ruangan" class="input input-bordered w-full" required>
          <select name="jenis" class="select select-bordered w-full" required>
            <option value="">Pilih Jenis</option>
            <option value="kecil">Kecil</option>
            <option value="sedang">Sedang</option>
            <option value="besar">Besar</option>
          </select>
          <select name="paket" class="select select-bordered w-full" required>
            <option value="">Pilih Paket</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
          </select>
          <input type="number" name="harga" placeholder="Harga" class="input input-bordered w-full" required>
          <textarea name="kapasitas" rows="2" placeholder="Kapasitas" class="textarea textarea-bordered" required></textarea>
          <textarea name="fasilitas" rows="2" placeholder="Fasilitas" class="textarea textarea-bordered" required></textarea>
          <input type="file" name="gambar" accept="image/*" class="file-input file-input-bordered w-full" required>
        </div>
        <div class="flex justify-end gap-2 mt-4">
          <button type="button" data-modal-hide="addModal" class="btn btn-outline">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Flowbite CDN JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
