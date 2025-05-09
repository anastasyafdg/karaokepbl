<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
  </head>
  <body class="bg-[#d3e2fc] min-h-screen flex items-center justify-center p-4">
    <div class="flex flex-col-reverse md:flex-row items-center justify-between max-w-6xl w-full bg-white/10 rounded-3xl shadow-2xl backdrop-blur-lg p-6 md:p-12 gap-10">
      
      <!-- Form Pendaftaran -->
      <form class="w-full md:w-[460px] space-y-4">
        <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Pendaftaran</h1>
        
        <!-- Email -->
        <div>
          <label for="email" class="text-sm font-medium text-black">Email</label>
            <input type="email" id="email" placeholder="username@gmail.com" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div>
          <label for="nama" class="text-sm font-medium text-black">Nama</label>
            <input type="text" id="nama" placeholder="Nama lengkap" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div>
          <label for="nomor" class="text-sm font-medium text-black">Nomor Handphone</label>
            <input type="text" id="nomor" placeholder="08xxxxxxxxxx" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div>
          <label for="password" class="text-sm font-medium text-black">Kata Sandi</label>
            <input type="password" id="password" placeholder="********" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div>
          <label for="konfirmasi" class="text-sm font-medium text-black">Konfirmasi Kata Sandi</label>
            <input type="password" id="konfirmasi" placeholder="********" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <button type="submit" class="w-full bg-[#0f1f2f] text-white py-2 rounded-lg font-semibold hover:bg-[#152b3d] transition">Kirim</button>
        <p class="text-center text-sm mt-2">Sudah punya akun? <a href="login" class="text-red-600 font-medium hover:underline">Masuk Sini</a></p>
      </form>

      <div class="hidden md:flex w-1/2 items-center justify-center p-10">
      <img src="{{ asset('images/burung.png') }}" alt="Gambar" class="w-[300px] md:w-[380px] h-auto object-contain drop-shadow-xl" style="background: transparent;"/>
      </div>
    </div>
  </body>
</html>