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

  <!-- Filter Section -->
  <div class="bg-white p-4 rounded-lg shadow mb-6">
    <h6 class="text-lg font-semibold mb-4 text-gray-700">
      <i class="fas fa-filter mr-2"></i> Filter Data
    </h6>
    <form method="GET" action="{{ route('admin.data_ruangan') }}" class="flex flex-wrap gap-4 items-end">
      <!-- Filter Jenis -->
      <div class="flex-1 min-w-48">
        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Ruangan</label>
        <select name="jenis" class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          <option value="">Semua Jenis</option>
          <option value="kecil" {{ request('jenis') == 'kecil' ? 'selected' : '' }}>Kecil</option>
          <option value="sedang" {{ request('jenis') == 'sedang' ? 'selected' : '' }}>Sedang</option>
          <option value="besar" {{ request('jenis') == 'besar' ? 'selected' : '' }}>Besar</option>
        </select>
      </div>
      
      <!-- Filter Paket -->
      <div class="flex-1 min-w-48">
        <label class="block text-sm font-medium text-gray-700 mb-2">Paket</label>
        <select name="paket" class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          <option value="">Semua Paket</option>
          <option value="A" {{ request('paket') == 'A' ? 'selected' : '' }}>Paket A</option>
          <option value="B" {{ request('paket') == 'B' ? 'selected' : '' }}>Paket B</option>
          <option value="C" {{ request('paket') == 'C' ? 'selected' : '' }}>Paket C</option>
        </select>
      </div>
      
      <!-- Tombol Filter -->
      <div class="flex gap-2">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
          <i class="fas fa-search mr-1"></i> Filter
        </button>
        <a href="{{ route('admin.data_ruangan') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
          <i class="fas fa-undo mr-1"></i> Reset
        </a>
      </div>
    </form>
  </div>

  <!-- Info Filter Aktif -->
  @if(request()->hasAny(['jenis', 'paket', 'status']))
  <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
        <span class="text-blue-800 font-medium">Filter Aktif:</span>
        <div class="flex gap-2 ml-2">
          @if(request('jenis'))
            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
              Jenis: {{ ucfirst(request('jenis')) }}
            </span>
          @endif
          @if(request('paket'))
            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
              Paket: {{ request('paket') }}
            </span>
          @endif
          @if(request('status'))
            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
              Status: {{ ucfirst(request('status')) }}
            </span>
          @endif
        </div>
      </div>
      <span class="text-blue-700 text-sm">{{ $ruangan->count() }} hasil ditemukan</span>
    </div>
  </div>
  @endif

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
          <th class="px-6 py-3">Jumlah Ruangan</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3">Gambar</th>
          <th class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($ruangan as $index => $r)
        <tr class="bg-white border-b hover:bg-gray-50">
          <td class="px-6 py-4">{{ $index + 1 }}</td>
          <td class="px-6 py-4">{{ $r->id }}</td>
          <td class="px-6 py-4">{{ ucfirst($r->jenis) }}</td>
          <td class="px-6 py-4">{{ $r->paket }}</td>
          <td class="px-6 py-4">{{ $r->kapasitas }}</td>
          <td class="px-6 py-4">Rp {{ number_format($r->harga, 0, ',', '.') }}</td>
          <td class="px-6 py-4">{{ $r->fasilitas }}</td>
          <td class="px-6 py-4">
            <span class="font-semibold text-lg">{{ $r->jumlah_ruangan }}</span>
            <span class="text-sm text-gray-500">ruangan</span>
          </td>
          <td class="px-6 py-4">
            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $r->status_color }}">
              {{ $r->status_ketersediaan }}
            </span>
          </td>
          <td class="px-6 py-4">
            <img src="{{ asset('images/' . $r->gambar) }}" alt="Gambar Ruangan" class="w-20 h-16 object-cover rounded">
          </td>
          <td class="px-4 py-4">
            <div class="flex gap-2 flex-col">
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
          <div class="relative w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow-lg">
              <div class="flex items-start justify-between p-6 border-b rounded-t bg-blue-50">
                <h3 class="text-2xl font-bold text-blue-800">Edit Data Ruangan</h3>
                <button type="button" data-modal-hide="editModal-{{ $r->id }}"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center transition-colors">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
              <div class="p-6 max-h-[80vh] overflow-y-auto">
                <form method="POST" action="{{ route('ruangan.update', $r->id) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="grid grid-cols-2 gap-8">
                    <!-- ID Ruangan -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">ID Ruangan</label>
                      <input type="text" name="id" value="{{ $r->id }}" readonly 
                        class="border border-gray-300 rounded-lg px-4 py-3 w-full bg-gray-100 cursor-not-allowed text-gray-600">
                    </div>

                    <!-- Jenis Ruangan -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Jenis Ruangan</label>
                      <select name="jenis" class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Pilih Jenis Ruangan</option>
                        <option value="kecil" {{ $r->jenis == 'kecil' ? 'selected' : '' }}>Kecil</option>
                        <option value="sedang" {{ $r->jenis == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="besar" {{ $r->jenis == 'besar' ? 'selected' : '' }}>Besar</option>
                      </select>
                    </div>

                    <!-- Paket -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Paket</label>
                      <select name="paket" class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Pilih Paket</option>
                        <option value="A" {{ $r->paket == 'A' ? 'selected' : '' }}>Paket A</option>
                        <option value="B" {{ $r->paket == 'B' ? 'selected' : '' }}>Paket B</option>
                        <option value="C" {{ $r->paket == 'C' ? 'selected' : '' }}>Paket C</option>
                      </select>
                    </div>

                    <!-- Harga -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Harga (Rupiah)</label>
                      <input type="number" name="harga" value="{{ $r->harga }}" 
                        class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Masukkan harga" required>
                    </div>

                    <!-- Kapasitas -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Kapasitas</label>
                      <textarea name="kapasitas" rows="3" 
                        class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none" 
                        placeholder="Contoh: 50-100 orang" required>{{ $r->kapasitas }}</textarea>
                    </div>

                    <!-- Fasilitas -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Fasilitas</label>
                      <textarea name="fasilitas" rows="3" 
                        class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none" 
                        placeholder="Contoh: AC, Proyektor, Sound System" required>{{ $r->fasilitas }}</textarea>
                    </div>

                    <!-- Jumlah Ruangan -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Jumlah Ruangan</label>
                      <input type="number" name="jumlah_ruangan" value="{{ $r->jumlah_ruangan }}" 
                        min="1" max="50" 
                        class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Masukkan jumlah ruangan" required>
                    </div>

                    <!-- Gambar -->
                    <div class="col-span-1 space-y-2">
                      <label class="block text-sm font-semibold text-gray-700">Gambar Ruangan</label>
                      <input type="file" name="gambar" accept="image/*" 
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                      <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, GIF (Opsional)</p>
                    </div>
                  </div>

                  <div class="flex justify-end gap-4 mt-8 pt-6 border-t">
                    <button type="button" data-modal-hide="editModal-{{ $r->id }}"
                      class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                      Batal
                    </button>
                    <button type="submit"
                      class="px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                      Simpan Perubahan
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @empty
        <tr>
          <td colspan="11" class="px-6 py-8 text-center text-gray-500">
            <div class="flex flex-col items-center">
              <i class="fas fa-search text-4xl text-gray-300 mb-4"></i>
              <p class="text-lg font-medium">Tidak ada data ruangan ditemukan</p>
              <p class="text-sm">Coba ubah filter atau tambah data baru</p>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <!-- Pagination  -->
    <div class="mt-6">
        {{ $ruangan->links() }}
    </div>
  </div>
</main>




<!-- Modal Tambah -->
 <div id="addModal" tabindex="-1" aria-hidden="true"
class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
<div class="relative w-full max-w-3xl max-h-full">
  <div class="relative bg-white rounded-lg shadow-lg">
      <div class="flex items-start justify-between p-6 border-b rounded-t bg-blue-50">
        <h3 class="text-2xl font-bold text-green-800">Tambah Data Ruangan</h3>
        <button type="button" data-modal-hide="addModal"
         class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center transition-colors">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
             d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
<form method="POST" action="{{ route('ruangan.simpan') }}" enctype="multipart/form-data" class="p-6">
  @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
      <ul class="list-disc ml-4 text-sm">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @csrf
  <div class="grid grid-cols-2 gap-6">
    <!-- ID Ruangan -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">ID Ruangan <span class="text-red-500">*</span></label>
      <input type="text" name="id" value="{{ old('id') }}"
        class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('id') border-red-500 @enderror"
        placeholder="Contoh: A001" required>

      @error('id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Jenis Ruangan -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Ruangan <span class="text-red-500">*</span></label>
      <select name="jenis" class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
        <option value="">Pilih Jenis Ruangan</option>
        <option value="kecil" {{ old('jenis') == 'kecil' ? 'selected' : '' }}>Kecil</option>
        <option value="sedang" {{ old('jenis') == 'sedang' ? 'selected' : '' }}>Sedang</option>
        <option value="besar" {{ old('jenis') == 'besar' ? 'selected' : '' }}>Besar</option>
      </select>
    </div>

    <!-- Paket -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Paket <span class="text-red-500">*</span></label>
      <select name="paket" class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
        <option value="">Pilih Paket</option>
        <option value="A" {{ old('paket') == 'A' ? 'selected' : '' }}>Paket A</option>
        <option value="B" {{ old('paket') == 'B' ? 'selected' : '' }}>Paket B</option>
        <option value="C" {{ old('paket') == 'C' ? 'selected' : '' }}>Paket C</option>
      </select>
    </div>

    <!-- Harga -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Harga (Rupiah) <span class="text-red-500">*</span></label>
      <input type="number" name="harga" value="{{ old('harga') }}"
        class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500" 
        placeholder="Contoh: 500000" required>
    </div>

    <!-- Kapasitas -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Kapasitas <span class="text-red-500">*</span></label>
      <textarea name="kapasitas" rows="3"
        class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none" 
        placeholder="Contoh: 50-100 orang" required>{{ old('kapasitas') }}</textarea>
    </div>

    <!-- Fasilitas -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Fasilitas <span class="text-red-500">*</span></label>
      <textarea name="fasilitas" rows="3"
        class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none" 
        placeholder="Contoh: AC, Proyektor, Sound System" required>{{ old('fasilitas') }}</textarea>
    </div>

    <!-- Jumlah Ruangan -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Ruangan <span class="text-red-500">*</span></label>
      <input type="number" name="jumlah_ruangan" value="{{ old('jumlah_ruangan') }}"
        min="1" max="50" 
        class="border border-gray-300 rounded-lg p-3 w-full focus:ring-2 focus:ring-green-500 focus:border-green-500" 
        placeholder="Contoh: 5" required>
    </div>

    <!-- Gambar -->
    <div class="col-span-1">
      <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Ruangan <span class="text-red-500">*</span></label>
      <input type="file" name="gambar" accept="image/*" 
        class="border border-gray-300 rounded-lg p-3 w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
      <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF (Wajib diisi)</p>
    </div>
  </div>

  <div class="flex justify-end gap-3 mt-8 pt-4 border-t">
    <button type="button" data-modal-hide="addModal"
      class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
      Batal
    </button>
    <button type="submit"
      class="px-6 py-3 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
      Simpan Data
    </button>
  </div>
</form>

    </div>
  </div>
</div>



<script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
@if ($errors->any())
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('addModal');
    if (modalEl && typeof Modal === 'function') {
      const modal = new Modal(modalEl);
      modal.show();
    }
  });
</script>
@endif
@endsection