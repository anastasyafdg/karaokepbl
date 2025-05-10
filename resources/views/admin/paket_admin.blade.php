@extends('layouts.admin')

@section('title', 'Paket Ruangan')

@section('content')
<main class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h5 class="text-xl font-semibold flex items-center">
            <i class="fas fa-box-open mr-2"></i> Paket Ruangan
        </h5>
    </div>
    <hr class="mb-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Paket A -->
        <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow relative">
            <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Paket A</h5>
            <p class="font-normal text-gray-700">2 - 4 orang</p>
            <p class="font-semibold text-gray-900">Harga: Rp 90.000/jam</p>
            <p class="text-gray-700">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
            <p class="mt-2">
                Status: 
                <span class="bg-green-500 text-white text-sm font-medium mr-2 px-3 py-1 rounded-full">Tersedia</span>
            </p>
        </div>

        <!-- Paket B -->
        <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow relative">
            <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Paket B</h5>
            <p class="font-normal text-gray-700">5 - 9 orang</p>
            <p class="font-semibold text-gray-900">Harga: Rp 130.000/jam</p>
            <p class="text-gray-700">Fasilitas: TV 42”, Sounds System, 5 Mic</p>
            <p class="mt-2">
                Status: 
                <span class="bg-yellow-400 text-black text-sm font-medium mr-2 px-3 py-1 rounded-full">Terpakai</span>
            </p>
        </div>

        <!-- Paket C -->
        <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow relative">
            <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Paket C</h5>
            <p class="font-normal text-gray-700">10 - 16 orang</p>
            <p class="font-semibold text-gray-900">Harga: Rp 200.000/jam</p>
            <p class="text-gray-700">Fasilitas: TV 42”, Sounds System, 8 Mic</p>
            <p class="mt-2">
                Status: 
                <span class="bg-yellow-400 text-black text-sm font-medium mr-2 px-3 py-1 rounded-full">Terpakai</span>
            </p>
        </div>
    </div>
</main>
@endsection
