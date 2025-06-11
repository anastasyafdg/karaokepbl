@extends('layouts.app')

@section('content')
<main class="max-w-6xl mx-auto my-8 grid grid-cols-1 lg:grid-cols-2 gap-8 px-4">

  <!-- Informasi Pembayaran -->
  <section class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-gray-800">
        <i class="fas fa-credit-card mr-3 text-blue-500"></i> Informasi Pembayaran
      </h2>
      <div class="bg-red-100 text-red-600 px-4 py-2 rounded-full flex items-center">
        <i class="fas fa-clock mr-2"></i>
        <span class="font-semibold" id="timer">30:00</span>
      </div>
    </div>

    <!-- Detail Transfer -->
    <div class="bg-blue-50 p-4 rounded-lg mb-6">
      <h3 class="font-semibold text-lg mb-3 text-gray-800">
        <i class="fas fa-university mr-2 text-blue-500"></i> Detail Bank Transfer
      </h3>

      <div class="space-y-3">
        <div class="flex justify-between">
          <span class="text-black">Nama Bank:</span>
          <span class="font-medium">Bank Negara Indonesia</span>
        </div>
        <div class="flex justify-between">
          <span class="text-black">Nomor Rekening:</span>
          <div class="flex items-center">
            <span class="mr-2" id="rekening-number">12345678910</span>
            <button class="text-gray-600 hover:text-gray-600 copy-btn" data-copy="12345678910">
              <i class="far fa-copy"></i>
            </button>
          </div>
        </div>
        <div class="flex justify-between">
          <span class="text-black">Nama Pengguna:</span>
          <span class="font-medium">MikkeuPangpang Karaoke</span>
        </div>
        <div class="flex justify-between pt-3 mt-3 border-t border-blue-100">
          <span class="font-bold text-gray-800">Total Pembayaran:</span>
          <span class="text-xl font-bold text-blue-600">
            Rp{{ number_format(request('total_harga', 150000), 0, ',', '.') }}
          </span>
        </div>
      </div>
    </div>

    <!-- Upload Bukti -->
    <div class="mb-6">
      <h3 class="font-semibold text-lg mb-3 text-gray-800">
        <i class="fas fa-upload mr-2 text-blue-500"></i> Unggah Bukti Pembayaran
      </h3>
      <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 cursor-pointer transition-colors">
        <input type="file" id="bukti-pembayaran" name="bukti_pembayaran" class="hidden" accept="image/*">
        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
        <p class="text-gray-500 mb-2">Drag & drop file atau</p>
        <button type="button" id="choose-file-btn" class="bg-blue-50 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-blue-100 transition-colors">Pilih File</button>
        <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG (Maks. 5MB)</p>
        <div id="file-preview" class="mt-4 hidden">
          <img id="preview-image" class="max-w-xs mx-auto rounded-lg shadow">
          <p id="file-name" class="text-sm text-gray-600 mt-2"></p>
        </div>
      </div>
    </div>

    <!-- Form -->
    <form action="{{ url('pembayaran_selesai') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
      <input type="hidden" name="waktu_mulai" value="{{ request('waktu_mulai') }}">
      <input type="hidden" name="waktu_selesai" value="{{ request('waktu_selesai') }}">
      <input type="hidden" name="catatan" value="{{ request('catatan', 'Tidak ada') }}">
      <input type="hidden" name="metode_pembayaran" value="{{ request('metode_pembayaran', 'Bank Transfer') }}">
      <input type="hidden" name="total_harga" value="{{ request('total_harga', 150000) }}">
      <input type="hidden" name="durasi" value="{{ request('durasi') }}">

      <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 py-3.5 rounded-lg font-semibold text-white shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
        <i class="fas fa-check-circle mr-2"></i> Konfirmasi Pembayaran
      </button>
    </form>

    <div class="mt-6 text-sm text-gray-600 space-y-2">
      <p class="flex items-start">
        <i class="fas fa-info-circle text-blue-400 mr-2 mt-0.5"></i>
        Setelah membayar, unggah bukti Anda untuk konfirmasi pemesanan.
      </p>
      <p class="flex items-start">
        <i class="fas fa-clock text-orange-400 mr-2 mt-0.5"></i>
        Pembayaran harus selesai dalam batas waktu yang ditentukan.
      </p>
    </div>
  </section>

  <!-- Ringkasan Pesanan -->
  <section class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100 h-fit sticky top-24">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
      <i class="fas fa-receipt mr-3 text-blue-500"></i> Ringkasan Pesanan
    </h2>

    <div class="flex items-start gap-4 mb-6 pb-6 border-b border-gray-100">
      <img src="{{ asset('images/paketA.png') }}" alt="Ruangan" class="h-24 w-24 object-cover rounded-lg shadow">
      <div>
        <h3 class="font-bold text-gray-800">SA001 - Paket A</h3>
        <p class="text-sm text-gray-500 mb-2">Small Room (Maks. 5 orang)</p>
        <div class="flex items-center text-yellow-400 text-sm">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <span class="text-gray-500 ml-2">4.5 (128 ulasan)</span>
        </div>
      </div>
    </div>

    @php
      $durasi = 0;
      if(request('waktu_mulai') && request('waktu_selesai')) {
        $durasi = (strtotime(request('waktu_selesai')) - strtotime(request('waktu_mulai'))) / 3600;
      }
    @endphp

    <div class="space-y-4 mb-6">
      <div class="flex justify-between">
        <div class="text-gray-600"><i class="far fa-calendar-alt mr-2"></i> Tanggal</div>
        <span class="font-medium">
          @if(request('tanggal'))
            {{ \Carbon\Carbon::parse(request('tanggal'))->locale('id')->translatedFormat('l, d F Y') }}
          @else -
          @endif
        </span>
      </div>
      <div class="flex justify-between">
        <div class="text-gray-600"><i class="far fa-clock mr-2"></i> Waktu</div>
        <span class="font-medium">
          {{ request('waktu_mulai') }} - {{ request('waktu_selesai') }}
        </span>
      </div>
      <div class="flex justify-between">
        <div class="text-gray-600"><i class="fas fa-hourglass-half mr-2"></i> Durasi</div>
        <span class="font-medium">{{ $durasi }} Jam</span>
      </div>
    </div>

    <div class="space-y-3 mb-6">
      <div class="flex justify-between">
        <span class="text-gray-600">Harga per jam</span>
        <span class="font-medium">Rp50.000</span>
      </div>
      <div class="flex justify-between">
        <span class="text-gray-600">Durasi</span>
        <span class="font-medium">{{ $durasi }} Jam</span>
      </div>
    </div>

    <div class="p-4 bg-blue-50 rounded-lg mb-6">
      <div class="flex justify-between items-center">
        <span class="font-bold text-gray-800">Total Pembayaran</span>
        <span class="text-2xl font-bold text-blue-600">
          Rp{{ number_format(request('total_harga', 150000), 0, ',', '.') }}
        </span>
      </div>
    </div>

    <div class="flex justify-between items-center mb-6">
      <span class="text-gray-600">Status Pembayaran:</span>
      <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
        <i class="fas fa-clock mr-1"></i> Menunggu Pembayaran
      </span>
    </div>

    <div class="text-sm text-gray-600 space-y-2">
      <p class="flex items-start">
        <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
        Semua harga sudah termasuk pajak dan biaya layanan.
      </p>
      <p class="flex items-start">
        <i class="fas fa-exclamation-triangle text-orange-400 mr-2 mt-0.5"></i>
        Uang tidak dikembalikan apabila reservasi dibatalkan.
      </p>
    </div>
  </section>
</main>

<!-- Script -->
<script>
  // Timer 30 menit
  let timeLeft = 1800;
  function updateTimer() {
    const timer = document.getElementById('timer');
    const minutes = String(Math.floor(timeLeft / 60)).padStart(2, '0');
    const seconds = String(timeLeft % 60).padStart(2, '0');
    timer.textContent = `${minutes}:${seconds}`;

    if (timeLeft < 300) {
      timer.parentElement.classList.remove('bg-red-100', 'text-red-600');
      timer.parentElement.classList.add('bg-red-500', 'text-white');
    }

    if (timeLeft > 0) {
      timeLeft--;
      setTimeout(updateTimer, 1000);
    }
  }
  updateTimer();

  // Copy to clipboard
  document.querySelectorAll('.copy-btn').forEach(button => {
    button.addEventListener('click', function() {
      const text = this.dataset.copy;
      navigator.clipboard.writeText(text).then(() => {
        this.innerHTML = '<i class="fas fa-check text-green-500"></i>';
        setTimeout(() => {
          this.innerHTML = '<i class="far fa-copy"></i>';
        }, 2000);
      });
    });
  });

  // Upload bukti pembayaran
  const uploadArea = document.getElementById('upload-area');
  const fileInput = document.getElementById('bukti-pembayaran');
  const chooseBtn = document.getElementById('choose-file-btn');
  const filePreview = document.getElementById('file-preview');
  const previewImage = document.getElementById('preview-image');
  const fileName = document.getElementById('file-name');

  chooseBtn.addEventListener('click', () => fileInput.click());

  uploadArea.addEventListener('dragover', e => {
    e.preventDefault();
    uploadArea.classList.add('border-blue-400');
  });

  uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('border-blue-400');
  });

  uploadArea.addEventListener('drop', e => {
    e.preventDefault();
    uploadArea.classList.remove('border-blue-400');
    const files = e.dataTransfer.files;
    if (files.length > 0) handleFileUpload(files[0]);
  });

  fileInput.addEventListener('change', e => {
    if (e.target.files.length > 0) handleFileUpload(e.target.files[0]);
  });

  function handleFileUpload(file) {
    if (file.size > 5 * 1024 * 1024) return alert('Ukuran file maksimal 5MB.');
    if (!file.type.startsWith('image/')) return alert('Format file tidak valid.');

    const reader = new FileReader();
    reader.onload = e => {
      previewImage.src = e.target.result;
      fileName.textContent = file.name;
      filePreview.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
  }
</script>
@endsection
