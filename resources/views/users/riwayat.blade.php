@extends('layouts.app')

@section('content')
  <!-- Main Content -->
  <main class="p-20">
    <section class="bg-gray-800 min-h-screen py-10 px-4">
      <div class="max-w-5xl mx-auto bg-blue-100 p-8 rounded-lg shadow-lg">
        <div class="mb-8 text-center">
          <h2 class="text-3xl font-bold text-gray-800">Pemesanan Saya</h2>
          <p class="text-gray-600 text-lg">Lihat dan kelola pemesanan karaoke Anda</p>
        </div>

        <!-- Tabs -->
        <div class="flex space-x-6 mb-6 border-b border-gray-300">
          <button class="pb-2 border-b-4 border-pink-200 font-semibold text-gray-700">Semua</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Tertunda</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Dikonfirmasi</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Selesai</button>
          <button class="pb-2 hover:border-b-2 hover:border-gray-400 text-gray-600">Dibatalkan</button>
        </div>

        <!-- Card Pesanan -->
        <div class="bg-blue-50 p-6 rounded-lg grid grid-cols-5 gap-6 items-center">
          <div class="flex justify-center">
            <img src="https://i.pinimg.com/736x/aa/ef/ef/aaefef311f7303329d2260f4cfb2f8c2.jpg" alt="Room" class="w-32 h-24 object-cover rounded-lg shadow-md">
          </div>
          <div class="text-center space-y-2">
            <p class="font-bold text-gray-800">SA001 - Paket A</p>
            <p class="text-gray-600 text-sm">Small Room</p>
            <p class="text-gray-600 text-sm flex justify-center items-center"><i class="fas fa-calendar-alt mr-2"></i> 18 April 2025</p>
            <p class="text-gray-600 text-sm">ID Pemesanan: 1</p>
          </div>
          <div class="text-center">
            <p class="text-gray-600 text-sm flex justify-center items-center"><i class="fas fa-clock mr-2"></i> 13:00 - 16:00</p>
          </div>
          <div class="text-center">
            <p class="text-gray-800 font-semibold text-lg flex justify-center items-center"><i class="fas fa-money-bill-wave mr-2"></i> Rp. 150.000</p>
          </div>
          <div class="text-center space-y-4">
            <div class="inline-block px-4 py-1 rounded-full text-sm font-semibold bg-green-400 text-white">
              <i class="fas fa-check-circle mr-2"></i> Dikonfirmasi
            </div>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm px-4 py-1 rounded-full flex items-center justify-center mx-auto mt-2 cursor-pointer transition">
              <i class="fas fa-print mr-2"></i> Cetak Resi
            </button>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection