 @extends('layouts.admin')

@section('title', 'Data Ruangan')

@section('content')
 <main class="p-6">
      <div class="flex justify-between items-center mb-4">
        <h5 class="text-xl font-semibold flex items-center">
          <i class="fas fa-users mr-2"></i> Data Ruangan
        </h5>
        <button onclick="openModal('addModal')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center">
        <i class="fas fa-plus mr-2"></i> Tambah Ruangan
       </button>
      </div>
      <hr class="mb-6">

    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full text-sm text-gray-600">
        <thead class="bg-white-50 text-gray-700 font-semibold">
          <tr>
            <th class="py-3 px-4">No</th>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Jenis</th>
            <th class="py-3 px-4">Paket</th>
            <th class="py-3 px-4">Kapasitas</th>
            <th class="py-3 px-4">Harga</th>
            <th class="py-3 px-4">Fasilitas</th>
            <th class="py-3 px-4">Gambar</th>
            <th class="py-3 px-4">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y">
          
        </tbody>
      </table>
    </div>

  </main>
</div>

<!-- Modal Template -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl relative">
    <h2 class="text-xl font-bold mb-4 text-green-600">Tambah Data Ruangan</h2>
    <form action="tambah_ruangan.php" method="POST" enctype="multipart/form-data" class="space-y-4">
      <div class="grid grid-cols-2 gap-4">
        <input type="text" name="id" placeholder="ID Ruangan" class="border p-2 rounded-md" required>
        <select name="jenis" class="border p-2 rounded-md" required>
          <option value="">Pilih Jenis</option>
          <option value="kecil">Kecil</option>
          <option value="sedang">Sedang</option>
          <option value="besar">Besar</option>
        </select>
        <select name="paket" class="border p-2 rounded-md" required>
          <option value="">Pilih Paket</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
        <input type="number" name="harga" placeholder="Harga" class="border p-2 rounded-md" required>
        <textarea name="kapasitas" rows="2" placeholder="Kapasitas" class="border p-2 rounded-md" required></textarea>
        <textarea name="fasilitas" rows="2" placeholder="Fasilitas" class="border p-2 rounded-md" required></textarea>
        <input type="file" name="gambar" accept="image/*" class="border p-2 rounded-md" required>
      </div>
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeModal('addModal')" class="px-4 py-2 border rounded-md">Batal</button>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl relative">
    <h2 class="text-xl font-bold mb-4 text-blue-600">Edit Data Ruangan</h2>
    <form action="ubahruangan.php" method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="id" id="editId">
      <div class="grid grid-cols-2 gap-4">
        <select name="jenis" id="editJenis" class="border p-2 rounded-md" required>
          <option value="kecil">Kecil</option>
          <option value="sedang">Sedang</option>
          <option value="besar">Besar</option>
        </select>
        <select name="paket" id="editPaket" class="border p-2 rounded-md" required>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
        <textarea name="kapasitas" id="editKapasitas" rows="2" class="border p-2 rounded-md" required></textarea>
        <input type="number" name="harga" id="editHarga" class="border p-2 rounded-md" required>
        <textarea name="fasilitas" id="editFasilitas" rows="2" class="border p-2 rounded-md" required></textarea>
        <input type="file" name="gambar" class="border p-2 rounded-md">
        <img id="currentImage" src="" class="w-20 h-14 object-cover rounded-md mt-2">
      </div>
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 border rounded-md">Batal</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Update</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.getElementById(id).classList.add('flex');
  }
  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
  }
  function openEditModal(id, jenis, paket, kapasitas, harga, fasilitas, gambar) {
    openModal('editModal');
    document.getElementById('editId').value = id;
    document.getElementById('editJenis').value = jenis;
    document.getElementById('editPaket').value = paket;
    document.getElementById('editKapasitas').value = kapasitas;
    document.getElementById('editHarga').value = harga;
    document.getElementById('editFasilitas').value = fasilitas;
    document.getElementById('currentImage').src = 'images/' + gambar;
  }
</script>

@endsection