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

    /* Overlay dengan efek blur */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.4); /* Gelap transparan */
      backdrop-filter: blur(8px); /* Efek blur pada background */
      z-index: -1; /* Menjaga overlay tetap di belakang konten */
    }
  </style>
</head>

<body class="min-h-screen">
  <!-- Overlay untuk efek blur -->
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
            <p class="font-medium text-black">Mikkeu Pangpang</p>
          </div>
        </div>
        <div class="flex items-center">
          <i class="fas fa-map-marker-alt text-black mr-3"></i>
          <div>
            <p class="text-xs text-black">Alamat</p>
            <p class="font-medium text-black">Jl. Karaoke No. 123, Jakarta</p>
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

        <a href="landing"
          class="block w-full bg-white hover:bg-gray-100 text-black py-2.5 px-5 rounded-lg font-medium text-center border border-gray-200">
          <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
      </div>
    </div>
  </div>

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
        <form class="p-6 space-y-4">
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-user text-gray-500"></i>
              </div>
              <input type="text" class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" placeholder="Masukkan nama lengkap" required>
            </div>
          </div>

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
            <div class="relative">
              <div class="absolute top-2.5 left-3 text-gray-500">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <textarea class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-purple-500 focus:border-purple-500" placeholder="Masukkan alamat lengkap" required></textarea>
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

  <!-- Change Password Modal -->
  <div id="changePasswordModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-full">
    <div class="relative w-full max-w-md mx-auto">
      <div class="bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex justify-between items-center p-4 border-b bg-blue-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">Ganti Password</h3>
          <button type="button" class="text-gray-400 hover:text-gray-900" data-modal-hide="changePasswordModal">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <form class="p-6 space-y-4">
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-lock text-gray-500"></i>
              </div>
              <input type="password" class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-cyan-500 focus:border-cyan-500" required>
            </div>
          </div>

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-lock text-gray-500"></i>
              </div>
              <input type="password" class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-cyan-500 focus:border-cyan-500" required>
            </div>
          </div>

          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password Baru</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-redo text-gray-500"></i>
              </div>
              <input type="password" class="pl-10 w-full border border-gray-300 rounded-lg p-2.5 focus:ring-cyan-500 focus:border-cyan-500" required>
            </div>
          </div>

          <div class="flex justify-end space-x-3">
            <button type="button" data-modal-hide="changePasswordModal" class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
            <button type="submit" class="px-4 py-2 text-sm text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg">Ganti Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
