@extends('layouts.admin')

@section('title', 'Data Transaksi')

@section('content')

<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-users mr-2"></i> Transaksi
        </h2>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-200">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Pemesanan</th>
                        <th scope="col" class="px-6 py-3">Nama Pengunjung</th>
                        <th scope="col" class="px-6 py-3">Paket Ruangan</th>
                        <th scope="col" class="px-6 py-3">Jenis Ruangan</th>
                        <th scope="col" class="px-6 py-3">Tanggal dan Waktu</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $item->id_pemesanan }}</td>
                        <td class="px-6 py-4">{{ $item->nama_pengunjung }}</td>
                        <td class="px-6 py-4">{{ $item->paket_ruangan }}</td>
                        <td class="px-6 py-4">{{ $item->jenis_ruangan }}</td>
                        <td class="px-6 py-4">{{ optional($item->tanggal_waktu)->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($item->status == 'Diproses')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Diproses</span>
                            @elseif($item->status == 'Terkonfirmasi')
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Terkonfirmasi</span>
                            @elseif($item->status == 'Selesai')
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Selesai</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <!-- Edit Button with Modal Trigger -->
                                <button data-modal-target="edit-transaction-modal-{{ $item->id_pemesanan }}" data-modal-toggle="edit-transaction-modal-{{ $item->id_pemesanan }}" class="font-medium text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-sm">Edit</button>
                                <!-- Delete Button with Modal Trigger -->
                                <button data-modal-target="delete-transaction-modal-{{ $item->id_pemesanan }}" data-modal-toggle="delete-transaction-modal-{{ $item->id_pemesanan }}" class="font-medium text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Hapus</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Transaction Modal -->
                    <div id="edit-transaction-modal-{{ $item->id_pemesanan }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Edit Transaksi
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-transaction-modal-{{ $item->id_pemesanan }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('transactions.update', $item->id_pemesanan) }}" method="POST" class="p-4 md:p-5">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="transaction-id" class="block mb-2 text-sm font-medium text-gray-900">ID Pemesanan</label>
                                            <input type="text" name="transaction-id" id="transaction-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ $item->id_pemesanan }}" readonly>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="nama_pengunjung" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengunjung</label>
                                            <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ $item->nama_pengunjung }}" required>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="paket_ruangan" class="block mb-2 text-sm font-medium text-gray-900">Paket Ruangan</label>
                                            <select id="paket_ruangan" name="paket_ruangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                <option value="A" {{ $item->paket_ruangan == 'A' ? 'selected' : '' }}>A</option>
                                                <option value="B" {{ $item->paket_ruangan == 'B' ? 'selected' : '' }}>B</option>
                                                <option value="C" {{ $item->paket_ruangan == 'C' ? 'selected' : '' }}>C</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="jenis_ruangan" class="block mb-2 text-sm font-medium text-gray-900">Jenis Ruangan</label>
                                            <select id="jenis_ruangan" name="jenis_ruangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                <option value="Small" {{ $item->jenis_ruangan == 'Small' ? 'selected' : '' }}>Small</option>
                                                <option value="Medium" {{ $item->jenis_ruangan == 'Medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="Large" {{ $item->jenis_ruangan == 'Large' ? 'selected' : '' }}>Large</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="tanggal_waktu" class="block mb-2 text-sm font-medium text-gray-900">Tanggal dan Waktu</label>
                                            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ optional($item->tanggal_waktu)->format('d M Y H:i') }}" required>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="Terkonfirmasi" {{ $item->status == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                                                <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Transaction Modal -->
                    <div id="delete-transaction-modal-{{ $item->id_pemesanan }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Konfirmasi Hapus
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="delete-transaction-modal-{{ $item->id_pemesanan }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda yakin ingin menghapus transaksi ini?</h3>
                                    <form action="{{ route('transactions.destroy', $item->id_pemesanan) }}" method="POST" class="flex justify-center space-x-4">
                                        @csrf
                                        @method('DELETE')
                                        <button data-modal-toggle="delete-transaction-modal-{{ $item->id_pemesanan }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                            Batal
                                        </button>
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endpush