<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil - Mikkeu Pangpang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://i.pinimg.com/736x/65/36/09/65360951a05dd0d6a5f232268c870a3f.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .backdrop-blur {
      backdrop-filter: blur(5px);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
  <!-- Main Container -->
  <div class="backdrop-blur bg-white/10 rounded-2xl overflow-hidden shadow-2xl w-full max-w-md border border-white/20">
    <!-- Header with Centered Logo -->
    <div class="bg-blue-200 p-6 text-center relative">
      <!-- Logo FULLY INSIDE the box -->
      <div class="mx-auto w-20 h-20 bg-blue-200 rounded-full flex items-center justify-center mb-4 shadow-md">
      <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="rounded-full w-20 h-20">
      </div>
      
      <h1 class="text-2xl font-bold text-black">MIKKEU PANGPANG</h1>
      <p class="text-black">Karaoke Premium Experience</p>
    </div>

    <!-- Profile Info -->
    <div class="p-6">
      <div class="bg-white/20 rounded-xl p-4 mb-6 backdrop-blur-sm">
        <div class="flex items-center mb-3">
          <i class="fas fa-user text-blue-200 mr-3"></i>
          <div>
            <p class="text-xs text-blue-100">Nama</p>
            <p class="font-medium text-white">Mikkeu Pangpang</p>
          </div>
        </div>
        <div class="flex items-center">
          <i class="fas fa-map-marker-alt text-blue-200 mr-3"></i>
          <div>
            <p class="text-xs text-blue-100">Alamat</p>
            <p class="font-medium text-white">Jl. Karaoke No. 123, Jakarta</p>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="space-y-3">
        <button onclick="showModal('editProfileModal')"
          class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white py-3 px-4 rounded-xl font-medium flex items-center justify-center transition-all duration-300 shadow-lg hover:shadow-xl">
          <i class="fas fa-user-edit mr-2"></i> Edit Profil
        </button>
        
        <button onclick="showModal('changePasswordModal')"
          class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white py-3 px-4 rounded-xl font-medium flex items-center justify-center transition-all duration-300 shadow-lg hover:shadow-xl">
          <i class="fas fa-key mr-2"></i> Ganti Password
        </button>
        
        <a href="halaman.php"
          class="block w-full bg-white/10 hover:bg-white/20 text-white py-3 px-4 rounded-xl font-medium text-center transition-all duration-300 border border-white/20 hover:border-white/30">
          <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div id="editProfileModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative flex items-center justify-center h-full p-4">
      <div class="bg-white rounded-2xl w-full max-w-md animate-popup overflow-hidden">
        <!-- Modal Header with Logo -->
        <div class="bg-blue-200 p-4 flex items-center">
          <div class="bg-blue-200 rounded-full p-2 mr-3">
            <div class="flex items-center justify-center bg-blue-200 rounded-full w-12 h-12">
              <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="rounded-full w-12 h-12">
            </div>
          </div>
          <h3 class="text-xl font-bold text-black">Edit Profil</h3>
        </div>
        
        <form class="p-6">
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
              <div class="relative">
                <input type="text" 
                  class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                  placeholder="Masukkan nama lengkap"
                  required>
                <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
              <div class="relative">
                <textarea 
                  class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 min-h-[100px]"
                  placeholder="Masukkan alamat lengkap"
                  required></textarea>
                <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
              </div>
            </div>
          </div>
          
          <div class="flex justify-end space-x-3 mt-6">
            <button type="button" onclick="hideModal('editProfileModal')"
              class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
              Batal
            </button>
            <button type="submit"
              class="px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-700 text-white rounded-lg hover:from-purple-700 hover:to-indigo-800 transition-all shadow-md">
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Change Password Modal -->
  <div id="changePasswordModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative flex items-center justify-center h-full p-4">
      <div class="bg-white rounded-2xl w-full max-w-md animate-popup overflow-hidden">
        <!-- Modal Header with Logo -->
        <div class="bg-blue-200 p-4 flex items-center">
          <div class="bg-blue-200 rounded-full p-2 mr-3">
            <div class="flex items-center justify-center bg-blue-200 rounded-full w-12 h-12">
              <img src="{{ asset('images/logo.png') }}" alt="Logo Mikkeu Pangpang" class="rounded-full w-12 h-12">
            </div>
          </div>
          <h3 class="text-xl font-bold text-black">Ganti Password</h3>
        </div>
        
        <form class="p-6">
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
              <div class="relative">
                <input type="password" 
                  class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500"
                  required>
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
              <div class="relative">
                <input type="password" 
                  class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500"
                  required>
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
              <div class="relative">
                <input type="password" 
                  class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500"
                  required>
                <i class="fas fa-redo absolute left-3 top-3 text-gray-400"></i>
              </div>
            </div>
          </div>
          
          <div class="flex justify-end space-x-3 mt-6">
            <button type="button" onclick="hideModal('changePasswordModal')"
              class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
              Batal
            </button>
            <button type="submit"
              class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition-all shadow-md">
              Ganti Password
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Modal functions
    function showModal(id) {
      document.getElementById(id).classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }
    
    function hideModal(id) {
      document.getElementById(id).classList.add('hidden');
      document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    window.addEventListener('click', (event) => {
      if (event.target.classList.contains('bg-black/50')) {
        document.querySelectorAll('[id$="Modal"]').forEach(modal => {
          hideModal(modal.id);
        });
      }
    });

    // Sample data population
    document.addEventListener('DOMContentLoaded', () => {
      // Mock data - replace with actual data from your backend
      document.getElementById('current-nama').textContent = 'Mikkeu Pangpang';
      document.getElementById('current-alamat').textContent = 'Jl. Karaoke No. 123, Jakarta';
      
      // Add logo animation on hover
      const logoIcon = document.querySelector('.logo-icon');
      if (logoIcon) {
        logoIcon.parentElement.addEventListener('mouseenter', () => {
          logoIcon.style.transform = 'scale(1.1) rotate(-5deg)';
        });
        logoIcon.parentElement.addEventListener('mouseleave', () => {
          logoIcon.style.transform = 'scale(1) rotate(0)';
        });
      }
    });
  </script>
</body>
</html>