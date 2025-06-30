@extends('layouts.app')

@section('content')
  <!-- Main Content -->
  <main class="p-8">
    <section class="bg-gray-800 min-h-screen py-12 px-4">
      <div class="max-w-5xl mx-auto bg-blue-100 p-10 rounded-2xl shadow-xl">
        <div class="mb-10 text-center">
          <h2 class="text-4xl font-bold text-gray-800 mb-2">Pemesanan Saya</h2>
          <p class="text-gray-600 text-lg">Lihat dan kelola pemesanan karaoke Anda</p>
        </div>

        @if($reservations->isEmpty())
          <div class="bg-blue-50 p-8 rounded-lg text-center shadow">
            <p class="text-gray-600 text-lg">Tidak ada pemesanan dengan status ini.</p>
          </div>
        @else
          <div class="space-y-6">
            @foreach($reservations as $reservation)
              <!-- Card Pesanan -->
              <div class="bg-blue-50 p-6 rounded-xl grid grid-cols-1 md:grid-cols-5 gap-6 items-center shadow-md hover:shadow-lg transition duration-300">
                <div class="flex justify-center">
                  <img src="{{ asset('images/' . $reservation->ruangan->gambar) }}" alt="Room" class="w-32 h-24 object-cover rounded-lg border border-gray-300">
                </div>

                <div class="text-center md:text-left space-y-2">
                  <p class="font-bold text-gray-800 text-xl">{{ $reservation->ruangan->nama }}</p>
                  <p class="text-gray-600 text-sm">{{ $reservation->ruangan->jenis }}</p>
                  <p class="text-gray-600 text-sm flex justify-center md:justify-start items-center">
                    <i class="fas fa-calendar-alt mr-2"></i> 
                    {{ \Carbon\Carbon::parse($reservation->tanggal)->format('d F Y') }}
                  </p>
                  <p class="text-gray-600 text-sm">ID Pemesanan: {{ $reservation->id }}</p>
                </div>

                <div class="text-center space-y-2">
                  <p class="text-gray-600 text-sm flex justify-center items-center">
                    <i class="fas fa-clock mr-2"></i> 
                    {{ $reservation->waktu_mulai }} - {{ $reservation->waktu_selesai }}
                  </p>
                  @php
                    $durasi = abs(\Carbon\Carbon::parse($reservation->waktu_selesai)->diffInHours(\Carbon\Carbon::parse($reservation->waktu_mulai)));
                  @endphp
                  <p class="text-gray-600 text-sm">{{ $durasi }} jam</p>
                </div>

                <div class="text-center">
                  @if($reservation->pembayaran)
                    <p class="text-gray-800 font-semibold text-lg flex justify-center items-center">
                      <i class="fas fa-money-bill-wave mr-2"></i> 
                      Rp. {{ number_format($reservation->pembayaran->total_biaya, 0, ',', '.') }}
                    </p>
                  @else
                    <p class="text-gray-600 text-sm">Belum ada pembayaran</p>
                  @endif
                </div>

                <div class="text-center space-y-4">
                  @if($reservation->pembayaran)
                    @php
                      $statusClass = [
                        'Pending' => 'bg-yellow-400',
                        'Confirmed' => 'bg-green-400',
                        'Completed' => 'bg-blue-400',
                        'Cancelled' => 'bg-red-400'
                      ][$reservation->pembayaran->status] ?? 'bg-gray-400';

                      $statusText = [
                        'Pending' => 'Tertunda',
                        'Confirmed' => 'Dikonfirmasi',
                        'Completed' => 'Selesai',
                        'Cancelled' => 'Dibatalkan'
                      ][$reservation->pembayaran->status] ?? $reservation->pembayaran->status;
                    @endphp
                    <div class="inline-block px-4 py-1 rounded-full text-sm font-semibold {{ $statusClass }} text-white">
                      <i class="fas fa-check-circle mr-2"></i> {{ $statusText }}
                    </div>
                  @endif

                  @if ($reservation->pembayaran && $reservation->pembayaran->status === 'Terkonfirmasi')
                    <a href="{{ route('resi.show', $reservation->id) }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-4 py-2 rounded-lg shadow transition duration-300 inline-flex items-center justify-center">
                      <i class="fas fa-print mr-2"></i> Cetak Resi
                    </a>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection
