@extends('layouts.admin')

@section('title', 'Data Ruangan')

@section('content')
<main class="p-6">
  <div class="flex justify-between items-center mb-4">
    <h5 class="text-xl font-semibold flex items-center">
      <i class="fas fa-door-closed mr-2"></i> Data Ruangan
    </h5>
    <button data-modal-target="addModal" data-modal-toggle="addModal"
      class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300">
      <i class="fas fa-plus mr-2"></i> Tambah Ruangan
    </button>
  </div>
  <hr class="mb-6">

  <div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th class="px-6 py-3">No</th>
          <th class="px-6 py-3">ID</th>
          <th class="px-6 py-3">Jenis</th>
          <th class="px-6 py-3">Paket</th>
          <th class="px-6 py-3">Kapasitas</th>
          <th class="px-6 py-3">Harga</th>
          <th class="px-6 py-3">Fasilitas</th>
          <th class="px-6 py-3">Gambar</th>
          <th class="px-6 py-3">Aksi</th>
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
              <button data-modal-target="editModal-{{ $r->id }}" data-modal-toggle="editModal-{{ $r->id }}"
                class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded text-sm">
                Edit
              </button>
              <form action="{{ route('ruangan.hapus', $r->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded text-sm">Hapus</button>
              </form>
            </div>
          </td>
        </tr>

        <!-- Modal Edit -->
        <div id="editModal-{{ $r->id }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
          <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
              <h3 class="text-xl font-semibold text-gray-900">Edit Data Ruangan</h3>
              <button type="button" data-modal-hide="addModal"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
              <form method="POST" action="{{ route('ruangan.update', $r->id) }}" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                  <input type="text" name="id" value="{{ $r->id }}" readonly  class="border border-gray-300 rounded-lg p-2.5 w-full">
                  <select name="jenis"  class="border border-gray-300 rounded-lg p-2.5 w-full" required>
                    <option value="kecil" {{ $r->jenis == 'kecil' ? 'selected' : '' }}>Kecil</option>
                    <option value="sedang" {{ $r->jenis == 'sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="besar" {{ $r->jenis == 'besar' ? 'selected' : '' }}>Besar</option>
                  </select>
                  <select name="paket" class="border border-gray-300 rounded-lg p-2.5 w-full" required>
                    <option value="A" {{ $r->paket == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $r->paket == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $r->paket == 'C' ? 'selected' : '' }}>C</option>
                  </select>
                  <input type="number" name="harga" value="{{ $r->harga }}"  class="border border-gray-300 rounded-lg p-2.5 w-full" required>
                  <textarea name="kapasitas" rows="2"  class="border border-gray-300 rounded-lg p-2.5 w-full" required>{{ $r->kapasitas }}</textarea>
                  <textarea name="fasilitas" rows="2" class="border border-gray-300 rounded-lg p-2.5 w-full" required>{{ $r->fasilitas }}</textarea>
                  <input type="file" name="gambar" accept="image/*"  class="border border-gray-300 rounded-lg p-2.5 w-full">
                <div class="flex justify-end gap-2 mt-4">
                  <button type="button" data-modal-hide="editModal-{{ $r->id }}"
                    class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Batal
                  </button>
                  <button type="submit"
                    class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</main>

<!-- Modal Tambah -->
<div id="addModal" tabindex="-1" aria-hidden="true"
  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow">
      <div class="flex items-start justify-between p-4 border-b rounded-t">
        <h3 class="text-xl font-semibold text-gray-900">Tambah Data Ruangan</h3>
        <button type="button" data-modal-hide="addModal"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <form method="POST" action="{{ route('ruangan.simpan') }}" enctype="multipart/form-data" class="p-6 space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
          <input type="text" name="id" placeholder="ID Ruangan" class="border border-gray-300 rounded-lg p-2.5 w-full" required>
          <select name="jenis" class="border border-gray-300 rounded-lg p-2.5 w-full" required>
            <option value="">Pilih Jenis</option>
            <option value="kecil">Kecil</option>
            <option value="sedang">Sedang</option>
            <option value="besar">Besar</option>
          </select>
          <select name="paket" class="border border-gray-300 rounded-lg p-2.5 w-full" required>
            <option value="">Pilih Paket</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
          </select>
          <input type="number" name="harga" placeholder="Harga" class="border border-gray-300 rounded-lg p-2.5 w-full" required>
          <textarea name="kapasitas" rows="2" placeholder="Kapasitas" class="border border-gray-300 rounded-lg p-2.5 w-full" required></textarea>
          <textarea name="fasilitas" rows="2" placeholder="Fasilitas" class="border border-gray-300 rounded-lg p-2.5 w-full" required></textarea>
          <input type="file" name="gambar" accept="image/*" class="border border-gray-300 rounded-lg p-2.5 w-full" required>
        </div>
        <div class="flex justify-end gap-2 mt-4">
          <button type="button" data-modal-hide="addModal"
            class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
            Batal
          </button>
          <button type="submit"
            class="px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
@endsection