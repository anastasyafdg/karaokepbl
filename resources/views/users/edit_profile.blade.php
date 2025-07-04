<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil - Mikkeu Pangpang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background-image: url('https://i.pinimg.com/736x/63/e3/82/63e3827fb94ba9f1104f713fb2ce9c6a.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(8px);
      z-index: -1;
    }
  </style>
</head>

<body class="min-h-screen">
  <div class="overlay"></div>

  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md border">
    <div class="bg-blue-200 p-6 text-center">
      <div class="mx-auto w-20 h-20 rounded-full overflow-hidden mb-4 shadow-md">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="w-full h-full object-cover">
      </div>
      <h1 class="text-2xl font-bold text-black">MIKKEU PANGPANG</h1>
      <p class="text-black">Karaoke Premium Experience</p>
    </div>

    <div class="p-6">
      <div class="bg-gray-100 rounded-xl p-4 mb-6">
        <div class="flex items-center mb-3">
          <i class="fas fa-user text-black mr-3"></i>
          <div>
            <p class="text-xs text-black">Nama</p>
            <p class="font-medium text-black">{{ $user->nama }}</p>
          </div>
        </div>
        <div class="flex items-center">
          <i class="fas fa-map-marker-alt text-black mr-3"></i>
          <div>
            <p class="text-xs text-black">Alamat</p>
            <p class="font-medium text-black">{{ $user->alamat }}</p>
          </div>
        </div>
      </div>

      <div class="space-y-3">
        <button data-modal-target="editProfileModal" data-modal-toggle="editProfileModal"
          class="w-full text-white bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center shadow-md">
          <i class="fas fa-user-edit mr-2"></i> Edit Profil
        </button>

        <button data-modal-target="changePasswordModal" data-modal-toggle="changePasswordModal"
          class="w-full text-white bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center shadow-md">
          <i class="fas fa-key mr-2"></i> Ganti Password
        </button>

        <a href="{{ url('landing') }}"
          class="block w-full bg-white hover:bg-gray-100 text-black py-2.5 px-5 rounded-lg font-medium text-center border border-gray-200">
          <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
      </div>
    </div>
  </div>

  <!-- MODAL PESAN NOTIFIKASI BERHASIL -->
  <div id="successModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-full">
    <div class="relative w-full max-w-md mx-auto">
      <div class="bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex justify-between items-center p-4 border-b bg-green-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">Sukses</h3>
          <button type="button" class="text-gray-400 hover:text-gray-900" onclick="hideSuccessModal()">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="p-6 text-gray-900" id="successMessage">
          <!-- Pesan sukses akan muncul di sini -->
          @if (session('success_modal'))
            <p>{{ session('success_modal') }}</p>
          @endif
        </div>
        <div class="flex justify-end p-4">
          <button type="button" onclick="hideSuccessModal()" class="px-4 py-2 text-sm text-white bg-green-600 hover:bg-green-700 rounded-lg">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL PESAN NOTIFIKASI BERHASIL -->

  <!-- MODAL PESAN ERROR -->
  <div id="errorModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-full">
    <div class="relative w-full max-w-md mx-auto">
      <div class="bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex justify-between items-center p-4 border-b bg-red-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">Peringatan</h3>
          <button type="button" class="text-gray-400 hover:text-gray-900" onclick="hideErrorModal()">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="p-6 text-gray-900" id="errorMessage">
          <!-- Pesan error akan muncul di sini -->
          @if (session('password_error_modal'))
            <p>{{ session('password_error_modal') }}</p>
          @endif
        </div>
        <div class="flex justify-end p-4">
          <button type="button" onclick="hideErrorModal()" class="px-4 py-2 text-sm text-white bg-red-600 hover:bg-red-700 rounded-lg">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL PESAN ERROR -->

  <!-- Ganti Password Modal -->
  <div id="changePasswordModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-full">
    <div class="relative w-full max-w-md mx-auto">
      <div class="bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex justify-between items-center p-4 border-b bg-blue-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">Ganti Password</h3>
          <button type="button" class="text-gray-400 hover:text-gray-900" data-modal-hide="changePasswordModal">
            <i class="fas fa-times"></i>
          </button>
        </div>

        <!-- TAMPILKAN PESAN ERROR DAN BERHASIL -->
        @if (session('success'))
          <div class="mb-4 text-green-600 font-medium p-3">
            {{ session('success') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-4 text-red-600 font-medium p-3">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('profile.updatePassword') }}" class="p-6 space-y-4" id="changePasswordForm">
          @csrf

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
            <input type="password" name="old_password" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" required>
          </div>

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
            <input type="password" name="new_password" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" required>
          </div>

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" required>
          </div>

          <div class="flex justify-end space-x-3">
            <button type="button" data-modal-hide="changePasswordModal" class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
            <button type="submit" class="px-4 py-2 text-sm text-white bg-purple-600 hover:bg-purple-700 rounded-lg">Ganti Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END GANTI PASSWORD -->

  <!-- Edit Profile Modal -->
  <div id="editProfileModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-full">
    <div class="relative w-full max-w-md mx-auto">
      <div class="bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex justify-between items-center p-4 border-b bg-blue-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">Edit Profil</h3>
          <button type="button" class="text-gray-400 hover:text-gray-900" data-modal-hide="editProfileModal">
            <i class="fas fa-times"></i>
          </button>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="p-6 space-y-4">
          @csrf
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-user text-gray-500"></i>
              </div>
              <input type="text" name="name" value="{{ old('nama', $user->name) }}" class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" required>
            </div>
          </div>

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
            <div class="relative">
              <div class="absolute top-2.5 left-3 text-gray-500">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <textarea name="alamat" class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" required>{{ old('alamat', $user->alamat) }}</textarea>
            </div>
          </div>

          <div class="flex justify-end space-x-3">
            <button type="button" data-modal-hide="editProfileModal" class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
            <button type="submit" class="px-4 py-2 text-sm text-white bg-purple-600 hover:bg-purple-700 rounded-lg">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Cek jika ada pesan sukses modal dari server
      @if (session('success_modal'))
        showSuccessModal('{{ session('success_modal') }}');
      @endif

      // Cek jika ada pesan error modal dari server
      @if (session('password_error_modal'))
        showErrorModal('{{ session('password_error_modal') }}');
      @endif
    });

    // Fungsi Tampilkan Modal Sukses
    function showSuccessModal(message) {
      document.getElementById('successMessage').innerText = message;
      const successModal = new Modal(document.getElementById('successModal'));
      successModal.show();
    }

    // Fungsi Tutup Modal Sukses
    function hideSuccessModal() {
      const successModal = new Modal(document.getElementById('successModal'));
      successModal.hide();
    }

    // Fungsi Tampilkan Modal Error
    function showErrorModal(message) {
      document.getElementById('errorMessage').innerText = message;
      const errorModal = new Modal(document.getElementById('errorModal'));
      errorModal.show();
    }

    // Fungsi Tutup Modal Error
    function hideErrorModal() {
      const errorModal = new Modal(document.getElementById('errorModal'));
      errorModal.hide();
    }
  </script>
</body>

</html>
