@extends('layouts.auth')

@section('content')
  <div class="flex bg-white bg-opacity-40 rounded-3xl shadow-lg overflow-hidden max-w-5xl w-full">
    <!-- Form -->
    <div class="w-full md:w-1/2 p-10">
      <h2 class="text-3xl font-bold mb-8 text-gray-800">Masuk</h2>
      <form action="#">
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
          <input type="email" id="email" placeholder="username@gmail.com" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 text-sm font-semibold text-gray-700">Kata Sandi</label>
          <div class="relative">
            <input type="password" id="password" placeholder="Masukkan Kata Sandi" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10">
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3">
              <svg id="eyeIcon" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </button>
          </div>
        </div>
        <button type="submit" class="w-full bg-slate-800 text-white py-3 rounded-lg font-semibold hover:bg-slate-900 transition">Kirim</button>
      </form>
      <div class="mt-6 text-center text-sm text-gray-700">
        <a href="ganti_sandi" class="hover:underline">Lupa Password?</a>
      </div>
      <div class="mt-2 text-center text-sm text-gray-700">
        Tidak punya akun? <a href="registrasi" class="font-bold hover:underline">Daftar Disini</a>
      </div>
    </div>

    <!-- Gambar -->
    <div class="hidden md:flex w-1/2 items-center justify-center p-10">
    <img src="{{ asset('images/burung.png') }}" alt="Karaoke Bird" class="max-w-xs">
    </div>
  </div>

  <!-- Script Toggle Password -->
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      // Optional: ganti icon
      if (type === 'text') {
        eyeIcon.setAttribute('stroke', '#1D4ED8'); // warna biru saat terlihat
      } else {
        eyeIcon.setAttribute('stroke', 'currentColor'); // warna default
      }
    });
  </script>
@endsection