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

        @if($reservations->isEmpty())
          <div class="bg-blue-50 p-6 rounded-lg text-center">
            <p class="text-gray-600">Tidak ada pemesanan dengan status ini.</p>
          </div>
        @else
          @foreach($reservations as $reservation)
            <!-- Card Pesanan -->
            <div class="bg-blue-50 p-6 rounded-lg grid grid-cols-5 gap-6 items-center mb-4">
              <div class="flex justify-center">
                <img src="{{ asset('images/' . $reservation->ruangan->gambar) }}" alt="Room" class="w-32 h-24 object-cover rounded-lg shadow-md">
              </div>
              <div class="text-center space-y-2">
                <p class="font-bold text-gray-800">{{ $reservation->ruangan->nama }}</p>
                <p class="text-gray-600 text-sm">{{ $reservation->ruangan->jenis }}</p>
                <p class="text-gray-600 text-sm flex justify-center items-center">
                  <i class="fas fa-calendar-alt mr-2"></i> 
                  {{ \Carbon\Carbon::parse($reservation->tanggal)->format('d F Y') }}
                </p>
                <p class="text-gray-600 text-sm">ID Pemesanan: {{ $reservation->id }}</p>
              </div>
              <div class="text-center">
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
                <a href="{{ route('resi.show', $reservation->id) }}" class="btn btn-primary">Cetak Resi</a>
                @endif

              </div>
            </div>
          @endforeach
        @endif
      </div>
    </section>
  </main>
@endsection