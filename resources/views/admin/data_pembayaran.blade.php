@extends('layouts.admin')

@section('title', 'Data Pembayaran')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-credit-card mr-2"></i> Data Pembayaran
        </h2>
        <hr class="mb-6 border-gray-200" />
            
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
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
                                    {{ $pembayaran->status }}
                                </span>
                            @elseif($pembayaran->status == 'Batal')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                    {{ $pembayaran->status }}
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                    {{ $pembayaran->status }}
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

                    <!-- Edit Modal -->
                    <div id="editModal-{{ $pembayaran->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Edit Status Pembayaran
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="editModal-{{ $pembayaran->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <form class="p-4 md:p-5" action="{{ route('data_pembayaran.update-status', $pembayaran->id) }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-1">
                                        <div class="col-span-1">
                                            <label for="status-{{ $pembayaran->id }}" class="block mb-2 text-sm font-medium text-gray-900">Status Pembayaran</label>
                                            <select id="status-{{ $pembayaran->id }}" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                <option value="Menunggu" {{ $pembayaran->status == 'Menunggu' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                                <option value="Terkonfirmasi" {{ $pembayaran->status == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                                                <option value="Batal" {{ $pembayaran->status == 'Batal' ? 'selected' : '' }}>Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Update Status
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
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