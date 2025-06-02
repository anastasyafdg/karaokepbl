@extends('layouts.auth')

@section('content')
<div class="flex flex-col-reverse md:flex-row items-center justify-between max-w-5xl w-full bg-white/10 rounded-3xl shadow-2xl backdrop-blur-lg p-6 md:p-12 gap-10">
  
  <form class="w-full md:w-[460px] space-y-4" method="POST" action="{{ route('ganti_sandi.update') }}">
    @csrf
    <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Ganti Kata Sandi</h1>

    <!-- Notifikasi sukses -->
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
      </div>
    @endif

    <!-- Notifikasi error -->
    @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        {{ session('error') }}
      </div>
    @endif

    <!-- Validasi error -->
    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Input Email -->
    <div>
      <label for="email" class="text-sm font-medium text-black">Email</label>
      <input type="email" name="email" id="email" 
             placeholder="username@gmail.com" 
             value="{{ old('email') }}"
             class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>

    <!-- Input Password Baru -->
    <div>
      <label for="password" class="text-sm font-medium text-black">Kata Sandi Baru</label>
      <input type="password" name="password" id="password" 
             placeholder="Masukkan password baru" 
             class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>

    <!-- Input Konfirmasi Password -->
    <div>
      <label for="password_confirmation" class="text-sm font-medium text-black">Konfirmasi Kata Sandi</label>
      <input type="password" name="password_confirmation" id="password_confirmation" 
             placeholder="Ulangi password baru" 
             class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>

    <button type="submit" class="w-full bg-[#0f1f2f] text-white py-2 rounded-lg font-semibold hover:bg-[#152b3d] transition">Kirim</button>
  </form>

  <div class="flex justify-center items-center md:w-[380px] w-full">
    <img src="{{ asset('images/burung.png') }}" alt="gambar" class="w-[300px] md:w-[380px] h-auto object-contain drop-shadow-xl" style="background: transparent;"/>
  </div>

</div>
@endsection
