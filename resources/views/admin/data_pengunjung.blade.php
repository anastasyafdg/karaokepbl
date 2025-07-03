@extends('layouts.admin')

@section('title', 'Data Pengunjung')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center text-gray-900">
            <i class="fas fa-users mr-2 text-blue-600"></i> Data Pengunjung
        </h2>
        <hr class="mb-6 border-gray-200" />

        <!-- Tabel Data Pengunjung -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No Handphone</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengunjung as $index => $p)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $pengunjung->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $p->nama }}</td>
                            <td class="px-6 py-4">{{ $p->email }}</td>
                            <td class="px-6 py-4">{{ $p->no }}</td>
                            <td class="px-6 py-4">{{ $p->alamat }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data pengunjung tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $pengunjung->links() }}
        </div>
    </div>
</div>
@endsection
