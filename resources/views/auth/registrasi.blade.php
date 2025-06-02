@extends('layouts.auth')

@section('content')
  <body class="bg-[#d3e2fc] min-h-screen flex items-center justify-center p-4">
    <div class="flex flex-col-reverse md:flex-row items-center justify-between max-w-6xl w-full bg-white/10 rounded-3xl shadow-2xl backdrop-blur-lg p-6 md:p-12 gap-10">
      
      <!-- Form Pendaftaran -->
      <form class="w-full md:w-[460px] space-y-4" method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Pendaftaran</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Email -->
        <div>
          <label for="email" class="text-sm font-medium text-black">Email</label>
            <input type="email" id="email" name="email" placeholder="username@gmail.com" 
                   class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   value="{{ old('email') }}" required/>
        </div>
        <div>
          <label for="nama" class="text-sm font-medium text-black">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Nama lengkap" 
                   class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   value="{{ old('nama') }}" required/>
        </div>
        <div>
          <label for="nomor" class="text-sm font-medium text-black">Nomor Handphone</label>
            <input type="text" id="nomor" name="nomor" placeholder="08xxxxxxxxxx" 
                   class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   value="{{ old('nomor') }}" required/>
        </div>
        <div>
          <label for="password" class="text-sm font-medium text-black">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="********" 
                   class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required/>
        </div>
        <div>
          <label for="password_confirmation" class="text-sm font-medium text-black">Konfirmasi Kata Sandi</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="********" 
                   class="mt-1 w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required/>
        </div>
        <button type="submit" class="w-full bg-[#0f1f2f] text-white py-2 rounded-lg font-semibold hover:bg-[#152b3d] transition">Kirim</button>
        <p class="text-center text-sm mt-2">Sudah punya akun? <a href="{{ route('login') }}" class="text-red-600 font-medium hover:underline">Masuk Sini</a></p>
      </form>

      <div class="hidden md:flex w-1/2 items-center justify-center p-10">
      <img src="{{ asset('images/burung.png') }}" alt="Gambar" class="w-[300px] md:w-[380px] h-auto object-contain drop-shadow-xl" style="background: transparent;"/>
      </div>
    </div>
  </body>
@endsection