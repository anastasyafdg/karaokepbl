@extends('layouts.auth')

@section('content')
    <div class="flex flex-col-reverse md:flex-row items-center justify-between max-w-5xl w-full bg-white/10 rounded-3xl shadow-2xl backdrop-blur-lg p-6 md:p-12 gap-10">
      <form class="w-full md:w-[460px] space-y-4">
        <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Ganti Kata Sandi</h1>
        <div>
            <label for="email" class="text-sm font-medium text-black">Email </label>
            <input type="email" id="email" placeholder="username@gmail.com" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div>
            <label for="password" class="text-sm font-medium text-black">Kata Sandi Baru</label>
            <input type="password"  id="password" placeholder="Masukkan Kata Sandi" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div>
            <label for="confirm" class="text-sm font-medium text-black">Konfirmasi Kata Sandi</label>
            <input type="password" id="confirm" placeholder="Konfirmasi Kata Sandi" class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <button type="submit" class="w-full bg-[#0f1f2f] text-white py-2 rounded-lg font-semibold hover:bg-[#152b3d] transition">Kirim</button>
      </form>

      <div class="flex justify-center items-center md:w-[380px] w-full">
        <img src="images/burung.png" alt="gambar" class="w-[300px] md:w-[380px] h-auto object-contain drop-shadow-xl" style="background: transparent;"/>
      </div>
    </div>
@endsection