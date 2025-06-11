@extends('layouts.app')

@section('content')
<div class="bg-gray-900 p-6 min-h-screen text-white">
    <!-- Pencarian dan Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 mb-6">
        <div class="flex-1 relative">
            <input 
                type="text" 
                id="search-input"
                placeholder="Cari Ruangan (Paket A, Paket B, Paket C)" 
                class="w-full bg-gray-700 text-white placeholder-gray-300 px-5 py-2 rounded-full focus:outline-none"
            />
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300">🔍</span>
        </div>
        <div class="flex flex-wrap gap-3">
            <button onclick="filterRooms('all')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Lihat Semua Ruangan</button>
            <button onclick="filterRooms('kecil')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Kecil</button>
            <button onclick="filterRooms('sedang')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Sedang</button>
            <button onclick="filterRooms('besar')" class="bg-gray-600 text-white px-4 py-2 rounded-full">Besar</button>
        </div>
    </div>

    <!-- Grid Ruangan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="rooms-container">
        @foreach($ruangans as $ruangan)
        <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg relative room-card" 
             data-paket="Paket {{ $ruangan->paket }}" 
             data-size="{{ ucfirst($ruangan->jenis) }}">
            <div class="absolute top-2 right-2 
                @if($ruangan->jenis == 'kecil') bg-blue-400 
                @elseif($ruangan->jenis == 'sedang') bg-indigo-500 
                @else bg-purple-500 
                @endif text-white text-sm px-3 py-1 rounded-full">
                {{ ucfirst($ruangan->jenis) }}
            </div>
            <img src="{{ $ruangan->gambar_url }}" class="w-full h-40 object-cover" />
            <div class="p-4 space-y-2">
                <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block">
                    Paket {{ $ruangan->paket }}
                </div>
                <div class="text-sm">👥 Kapasitas : {{ $ruangan->kapasitas }}</div>
                <div class="flex items-center justify-between">
                    <div class="text-sm">{{ $ruangan->formatted_harga }}/1 jam</div>
                    <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full detail-btn" 
                            onclick="showRoomDetail('{{ $ruangan->id }}')">
                        Detail
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Popup Detail -->
    <div id="popup-detail" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
        <div class="bg-white text-black rounded-xl w-11/12 max-w-md relative p-6">
            <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-600 hover:text-black">✖</button>
            <h2 class="text-xl font-semibold mb-4" id="popup-title"></h2>
            <div class="flex items-center justify-between mb-4">
                <div class="text-sm flex items-center gap-2">
                    <span>👥</span> <span id="popup-kapasitas"></span>
                </div>
                <div class="text-sm flex items-center gap-2">
                    <span>⏰</span> <span>Min. 1 Jam Penyewaan</span>
                </div>
            </div>
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm space-y-1" id="popup-fasilitas"></ul>
            </div>
            <div class="flex items-center justify-between">
                <img src="" alt="Ruangan" class="w-28 h-20 object-cover rounded-lg" id="popup-img">
                <div class="text-lg font-bold" id="popup-harga"></div>
            </div>
            <a href="halaman_reservasi">
                <button class="bg-green-700 text-white w-full py-2 rounded-full mt-6 hover:bg-green-800">Pesan Sekarang</button>
            </a>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk filter ruangan berdasarkan ukuran
    function filterRooms(size) {
        const rooms = document.querySelectorAll('.room-card');
        
        rooms.forEach(room => {
            if (size === 'all') {
                room.style.display = 'block';
            } else {
                const roomSize = room.getAttribute('data-size').toLowerCase();
                if (roomSize === size) {
                    room.style.display = 'block';
                } else {
                    room.style.display = 'none';
                }
            }
        });
    }

    // Fungsi untuk pencarian berdasarkan paket (A, B, C)
    function searchRooms() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const rooms = document.querySelectorAll('.room-card');
        
        rooms.forEach(room => {
            const paket = room.getAttribute('data-paket').toLowerCase();
            if (paket.includes(searchTerm) || searchTerm === '') {
                room.style.display = 'block';
            } else {
                room.style.display = 'none';
            }
        });
    }

    // Event listener untuk input pencarian
    document.getElementById('search-input').addEventListener('input', searchRooms);

    // Fungsi untuk menampilkan detail ruangan
    function showRoomDetail(roomId) {
        // Mengambil data ruangan dari server
        fetch(`/ruangan/${roomId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('popup-title').innerText = `Paket ${data.paket}, Ruang ${data.jenis}`;
                document.getElementById('popup-kapasitas').innerText = data.kapasitas;
                document.getElementById('popup-fasilitas').innerHTML = 
                    data.fasilitas.split('\n').map(f => `<li>${f}</li>`).join('');
                document.getElementById('popup-img').src = data.gambar_url;
                document.getElementById('popup-harga').innerText = `${data.formatted_harga}/Jam`;

                const popup = document.getElementById('popup-detail');
                popup.classList.remove('hidden');
                popup.classList.add('flex');
            });
    }

    function closePopup() {
        const popup = document.getElementById('popup-detail');
        popup.classList.remove('flex');
        popup.classList.add('hidden');
    }
</script>
@endsection