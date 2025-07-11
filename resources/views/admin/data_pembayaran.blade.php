@extends('layouts.admin')

@section('title', 'Data Pembayaran')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-credit-card mr-2"></i> Data Pembayaran
        </h2>
        <hr class="mb-6 border-gray-200" />

      <!-- Filter Section -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <h6 class="text-lg font-semibold mb-4 text-gray-700">
        <i class="fas fa-filter mr-2"></i> Filter Data
    </h6>
    <form method="GET" action="{{ route('data_pembayaran') }}" class="flex flex-wrap gap-4 items-end">
        <!-- Filter Status -->
        <div class="flex-1 min-w-[200px]">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status Pembayaran</label>
            <select id="status" name="status"
                class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Semua Status</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                <option value="Terkonfirmasi" {{ request('status') == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                <option value="Batal" {{ request('status') == 'Batal' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex gap-2">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <i class="fas fa-search"></i> Filter
            </button>
            <a href="{{ route('data_pembayaran') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <i class="fas fa-undo"></i> Reset
            </a>
        </div>
    </form>
</div>

<!-- Info Filter Aktif -->
@if(request()->has('status'))
<div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
    <div class="flex items-center gap-2">
        <i class="fas fa-info-circle text-blue-600"></i>
        <span class="text-blue-800 font-medium">Filter Aktif:</span>

        @if(request('status'))
            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">
                Status: {{ request('status') }}
            </span>
        @endif
    </div>
</div>
@endif

            
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pengunjung</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pembayaran</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pemesanan</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Biaya</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bukti</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayarans as $index => $pembayaran)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->user->nama ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-mono bg-gray-100 px-2 py-1 rounded text-xs">
                                #{{ $pembayaran->id }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-mono bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs">
                                #{{ $pembayaran->reservasi_id }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold">
                            Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-medium">{{ $pembayaran->created_at->format('d M Y') }}</span>
                                <span class="text-xs text-gray-400">{{ $pembayaran->created_at->format('H:i') }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($pembayaran->bukti_pembayaran)
                                <a href="{{ asset($pembayaran->bukti_pembayaran) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 hover:bg-blue-200">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </a>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Tidak ada
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($pembayaran->status == 'Terkonfirmasi')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Terkonfirmasi
                                </span>
                            @elseif($pembayaran->status == 'Batal')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                    Dibatalkan
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button data-modal-target="editModal-{{ $pembayaran->id }}" data-modal-toggle="editModal-{{ $pembayaran->id }}"
                                    class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded text-sm whitespace-nowrap">
                                    Edit
                                </button>
                                <form action="{{ route('data_pembayaran.destroy', $pembayaran->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded text-sm whitespace-nowrap">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Form Edit Status -->
                    <div id="editModal-{{ $pembayaran->id }}" tabindex="-1" aria-hidden="true"
                    class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">

                    <div class="w-full max-w-md mx-auto px-4">
                        <div class="bg-white rounded-2xl shadow-xl w-full p-6">

                        <!-- Header -->
                        <div class="mb-4 border-b pb-3">
                            <h3 class="text-lg font-semibold text-gray-800">Edit Status Pembayaran</h3>
                            <p class="text-sm text-gray-500 mt-1">ID Pembayaran: #{{ $pembayaran->id }}</p>
                        </div>

                        <!-- Form -->
                        <form action="{{ route('data_pembayaran.update-status', $pembayaran->id) }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Select -->
                            <div>
                            <label for="status-{{ $pembayaran->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                Status Pembayaran
                            </label>
                            <select name="status" id="status-{{ $pembayaran->id }}"
                                class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-md bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="Pending" {{ $pembayaran->status == 'Pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                <option value="Terkonfirmasi" {{ $pembayaran->status == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                                <option value="Batal" {{ $pembayaran->status == 'Batal' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            </div>

                            <!-- Tombol -->
                            <div class="flex justify-end items-center space-x-3 pt-4 border-t border-gray-200">
                            <button type="button" data-modal-toggle="editModal-{{ $pembayaran->id }}"
                                class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-5 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                                Simpan Perubahan
                            </button>
                            </div>
                        </form>

                        </div>
                    </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
                <!-- Pagination -->
            <div class="mt-6 px-4">
                {{ $pembayarans->links() }}
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>



@endsection