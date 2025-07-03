@extends('layouts.admin')

@section('title', 'Data Reservasi')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-receipt mr-2"></i> Data Reservasi
        </h2>
        <hr class="mb-6 border-gray-200" />

        <!-- Tabel -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">NO</th>
                        <th class="px-6 py-3">ID PEMESANAN</th>
                        <th class="px-6 py-3">NAMA USER</th>
                        <th class="px-6 py-3">ID RUANGAN</th>
                        <th class="px-6 py-3">TANGGAL</th>
                        <th class="px-6 py-3">WAKTU MULAI</th>
                        <th class="px-6 py-3">WAKTU SELESAI</th>
                        <th class="px-6 py-3">DURASI</th>
                        <th class="px-6 py-3">CATATAN</th>
                        <th class="px-6 py-3">PEMBAYARAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $data->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td class="px-6 py-4">{{ $item->user->nama ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $item->ruangan_id }}</td>
                            <td class="px-6 py-4">{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                            <td class="px-6 py-4">{{ $item->waktu_mulai }}</td>
                            <td class="px-6 py-4">{{ $item->waktu_selesai }}</td>
                            <td class="px-6 py-4">{{ $item->durasi }}</td>
                            <td class="px-6 py-4">{{ $item->catatan ?? '-' }}</td>
                            <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $item->metode) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
