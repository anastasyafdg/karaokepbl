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
                <div class="bg-white rounded-lg shadow p-6 relative">
                    <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
                    <h6 class="text-lg font-bold mb-2">Paket A</h6>
                    <p class="mb-1">2 - 4 orang</p>
                    <p class="mb-1 font-semibold">Harga: Rp 100.000/jam</p>
                    <p class="mb-1">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
                    <p>Status: <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Tersedia</span></p>
                </div>

                <!-- Paket B -->
                <div class="bg-white rounded-lg shadow p-6 relative">
                    <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
                    <h6 class="text-lg font-bold mb-2">Paket B</h6>
                    <p class="mb-1">5 - 9 orang</p>
                    <p class="mb-1 font-semibold">Harga: Rp 120.000/jam</p>
                    <p class="mb-1">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
                    <p>Status: <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm">Terpakai</span></p>
                </div>

                <!-- Paket C -->
                <div class="bg-white rounded-lg shadow p-6 relative">
                    <div class="absolute left-0 top-0 h-full w-2 bg-purple-300 rounded-l-lg"></div>
                    <h6 class="text-lg font-bold mb-2">Paket C</h6>
                    <p class="mb-1">10 - 16 orang</p>
                    <p class="mb-1 font-semibold">Harga: Rp 150.000/jam</p>
                    <p class="mb-1">Fasilitas: TV 42”, Sounds System, 2 Mic</p>
                    <p>Status: <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm">Terpakai</span></p>
                </div>
            </div>

        </main>
    </div>

</div>

@endsection