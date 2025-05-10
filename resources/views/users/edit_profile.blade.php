<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil - Mikkeu Pangpang</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background-image: url('https://i.pinimg.com/736x/88/09/8f/88098f42149340a050702f6fa5d9d97a.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    /* Overlay TANPA efek blur */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.4); /* Hanya gelap transparan */
      backdrop-filter: blur(8px); /* Efek blur pada background */
      z-index: -1; /* Menjaga overlay tetap di belakang konten */
    }
  </style>
</head>
<body>
  <!-- Overlay tanpa blur -->
  <div class="overlay"></div>
  
  <!-- Floating bubbles background (blur hanya pada bubble) -->
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute top-10 left-20 w-40 h-40 rounded-full bg-blue-200 opacity-20 blur-xl"></div>
    <div class="absolute bottom-20 right-20 w-60 h-60 rounded-full bg-blue-200 opacity-15 blur-xl"></div>
    <div class="absolute top-1/3 right-1/4 w-32 h-32 rounded-full bg-blue-200 opacity-20 blur-xl"></div>
  </div>
  
  <!-- Main Card -->
  <div class="w-full max-w-md bg-white rounded-xl shadow-xl overflow-hidden z-10">
    <!-- Header Section -->
    <div class="bg-blue-200 p-8 text-center relative">
      <div class="mx-auto w-24 h-24 rounded-full border-4 border-black shadow-lg overflow-hidden mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="w-full h-full object-cover">
      </div>
      <h1 class="text-2xl font-bold text-black">MIKKEU PANGPANG</h1>
      <p class="text-black/90 mt-1">Premium Karaoke Experience</p>
      <div class="absolute bottom-0 left-0 right-0 h-1 bg-white/20"></div>
    </div>

    <!-- Profile Info Section -->
    <div class="p-6">
      <div class="bg-gray-50 rounded-lg p-5 mb-6 shadow-sm">
        <div class="flex items-center mb-4 pb-4 border-b border-gray-200">
          <div class="bg-blue-100 p-3 rounded-full mr-4">
            <i class="fas fa-user text-blue-600"></i>
          </div>
          <div>
            <p class="text-xs text-gray-500 uppercase tracking-wider">Nama</p>
            <p class="font-semibold text-gray-800">Mikkeu Pangpang</p>
          </div>
        </div>
        <div class="flex items-center">
          <div class="bg-purple-100 p-3 rounded-full mr-4">
            <i class="fas fa-map-marker-alt text-purple-600"></i>
          </div>
          <div>
            <p class="text-xs text-gray-500 uppercase tracking-wider">Alamat</p>
            <p class="font-semibold text-gray-800">Jl. Karaoke No. 123, Jakarta</p>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="space-y-3">
        <!-- Edit Profile Button -->
        <button data-modal-target="editProfileModal" data-modal-toggle="editProfileModal"
          class="w-full text-black bg-blue-200 hover:to-blue-700 font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center justify-center shadow-md transition-all">
          <i class="fas fa-user-edit mr-3"></i> Edit Profil
        </button>

        <!-- Change Password Button -->
        <button data-modal-target="changePasswordModal" data-modal-toggle="changePasswordModal"
          class="w-full text-black bg-blue-200 hover:from-blue-600 hover:to-cyan-700 font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center justify-center shadow-md transition-all">
          <i class="fas fa-key mr-3"></i> Ganti Password
        </button>

        <!-- Back Button -->
        <a href="landing"
          class="block w-full bg-white hover:bg-gray-50 text-gray-700 py-2.5 px-5 rounded-lg font-medium text-center border border-gray-200 shadow-sm transition-all hover:shadow-md">
          <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
        </a>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div id="editProfileModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full mx-auto mt-20">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t bg-blue-200">
          <h3 class="text-lg font-semibold text-black">
             <i class="fas fa-user-edit mr-3"></i>Edit Profil
          </h3>
          <button type="button" class="text-black bg-transparent hover:bg-white/10 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editProfileModal">
            <i class="fas fa-times"></i>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form class="p-4 md:p-5 space-y-4">
          <div>
            <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-user text-gray-500"></i>
              </div>
              <input type="text" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Masukkan nama lengkap" required>
            </div>
          </div>
          <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
            <div class="relative">
              <div class="absolute top-3 left-3 text-gray-500">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <textarea id="address" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center justify-end pt-4 border-t border-gray-200">
            <button type="button" data-modal-hide="editProfileModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-3">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Change Password Modal -->
  <div id="changePasswordModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full mx-auto mt-20">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t bg-blue-200">
          <h3 class="text-lg font-semibold text-black">
            <i class="fas fa-key mr-3"></i> Ganti Password
          </h3>
          <button type="button" class="text-black bg-transparent hover:bg-white/10 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="changePasswordModal">
            <i class="fas fa-times"></i>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form class="p-4 md:p-5 space-y-4">
          <div>
            <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-lock text-gray-500"></i>
              </div>
              <input type="password" id="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
              <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-600 toggle-password">
                <i class="far fa-eye-slash"></i>
              </button>
            </div>
          </div>
          <div>
            <label for="new-password" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-lock text-gray-500"></i>
              </div>
              <input type="password" id="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
              <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-600 toggle-password">
                <i class="far fa-eye-slash"></i>
              </button>
            </div>
          </div>
          <div>
            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-redo text-gray-500"></i>
              </div>
              <input type="password" id="confirm-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
              <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-600 toggle-password">
                <i class="far fa-eye-slash"></i>
              </button>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center justify-end pt-4 border-t border-gray-200">
            <button type="button" data-modal-hide="changePasswordModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-3">Ganti Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Password visibility toggle
    document.querySelectorAll('.toggle-password').forEach(button => {
      button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        const icon = this.querySelector('i');
        const isPassword = input.type === 'password';
        
        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('fa-eye-slash', !isPassword);
        icon.classList.toggle('fa-eye', isPassword);
      });
    });
  </script>
</body>
</html>