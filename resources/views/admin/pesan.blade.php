@extends('layouts.admin')

@section('title', 'Pesan Pengunjung')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-envelope mr-2"></i> Pesan Pengunjung
        </h2>
        <hr class="mb-6 border-gray-200" />

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">NO</th>
                        <th class="px-6 py-3">NAMA</th>
                        <th class="px-6 py-3">EMAIL</th>
                        <th class="px-6 py-3">NO HANDPHONE</th>
                        <th class="px-6 py-3">PESAN</th>
                        <th class="px-6 py-3 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesans as $index => $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $pesans->firstItem() + $index }}</td>
                        <td class="px-4 py-2">{{ $item->nama }}</td>
                        <td class="px-4 py-2">{{ $item->email }}</td>
                        <td class="px-4 py-2">{{ $item->no }}</td>
                        <td class="px-4 py-2">{{ $item->pesan }}</td>
                        <td class="px-4 py-2 text-center flex justify-center gap-2">
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $item->email }}&su=Menanggapi Pesan Anda&body=Halo {{ urlencode($item->nama) }},%0D%0A%0D%0ATerima kasih atas pesan Anda."
                               target="_blank"
                               class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                               Balas
                            </a>
                            <form action="{{ route('pesan.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pesans->links() }}
        </div>
    </div>
</div>
@endsection
