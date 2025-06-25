@extends('layouts.admin')

@section('title', 'Data Reservasi')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-receipt mr-2"></i> Data Reservasi
        </h2>
        <hr class="mb-6 border-gray-200" />

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">NO</th>
                        <th scope="col" class="px-6 py-3">ID Pemesanan</th>
                        <th scope="col" class="px-6 py-3">Nama Pengunjung</th>
                        <th scope="col" class="px-6 py-3">ID Ruangan</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Waktu Mulai</th>
                        <th scope="col" class="px-6 py-3">Waktu Selesai</th>
                        <th scope="col" class="px-6 py-3">Durasi</th>
                        <th scope="col" class="px-6 py-3">Catatan</th>
                        <th scope="col" class="px-6 py-3">Pembayaran</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $item->id }}</td>
                        <td class="px-6 py-4">
                            {{ $item->user->nama ?? '-' }}
                        </td>
                        <td class="px-6 py-4">{{ $item->ruangan_id }}</td>
                        <td class="px-6 py-4">{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                        <td class="px-6 py-4">{{ $item->waktu_mulai }}</td>
                        <td class="px-6 py-4">{{ $item->waktu_selesai }}</td>
                        <td class="px-6 py-4">{{ $item->durasi }}</td>
                        <td class="px-6 py-4">{{ $item->catatan ?? '-' }}</td>
                        <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $item->metode) }}</td>
                    <td>
                        <form action="{{ route('data_reservasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus reservasi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection