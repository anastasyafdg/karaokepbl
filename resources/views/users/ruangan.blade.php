@extends('layouts.app')

@section('content')
<div class="bg-gray-900 p-6 min-h-screen text-white font-[Inter]">

    <!-- Pencarian dan Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 mb-6">

        <!-- Pencarian -->
        <div class="flex-1 relative">
            <input 
                type="text" 
                id="search-input"
                placeholder="Cari Ruangan (Paket A, Paket B, Paket C)" 
                class="w-full bg-gray-700 text-white placeholder-gray-300 px-5 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
            >
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 text-lg">🔍</span>
        </div>

        <!-- Filter -->
        <div class="flex flex-wrap gap-3">
            <button onclick="updateFilter('all')" class="filter-button bg-gray-600 text-white px-4 py-2 rounded-full hover:bg-gray-500 transition" data-filter="all">Lihat Semua Ruangan</button>
            <button onclick="updateFilter('kecil')" class="filter-button bg-gray-400 text-white px-4 py-2 rounded-full hover:bg-gray-500 transition" data-filter="kecil">Kecil</button>
            <button onclick="updateFilter('sedang')" class="filter-button bg-gray-400 text-white px-4 py-2 rounded-full hover:bg-gray-500 transition" data-filter="sedang">Sedang</button>
            <button onclick="updateFilter('besar')" class="filter-button bg-gray-400 text-white px-4 py-2 rounded-full hover:bg-gray-500 transition" data-filter="besar">Besar</button>
        </div>
    </div>

    <!-- Grid Ruangan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="rooms-container">
        @foreach($ruangans as $ruangan)
        <div class="bg-blue-100 text-black rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition room-card" 
             data-paket="Paket {{ $ruangan->paket }}" 
             data-size="{{ ucfirst($ruangan->jenis) }}">

            <!-- Label Ukuran -->
            @php
                $warna = $ruangan->jenis == 'kecil' ? 'bg-blue-400' : ($ruangan->jenis == 'sedang' ? 'bg-indigo-500' : 'bg-purple-500');
            @endphp

            <div class="absolute top-2 right-2 {{ $warna }} text-white text-sm px-3 py-1 rounded-full shadow">
                {{ ucfirst($ruangan->jenis) }}
            </div>

            <!-- Gambar Ruangan -->
            <img src="{{ $ruangan->gambar_url }}" class="w-full h-40 object-cover">

            <!-- Detail Ruangan -->
            <div class="p-4 space-y-3">
                <div class="text-sm font-semibold bg-orange-500 text-white px-3 py-1 rounded-full inline-block shadow">
                    Paket {{ $ruangan->paket }}
                </div>
                <div class="text-sm">👥 Kapasitas : {{ $ruangan->kapasitas }}</div>
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium">{{ $ruangan->formatted_harga }}/1 jam</div>
                    <button class="bg-green-500 text-white text-sm px-4 py-1 rounded-full hover:bg-green-600 transition detail-btn" 
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
            <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-600 hover:text-black text-xl transition">✖</button>
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
            <div class="flex items-center justify-between mb-4">
                <img src="" alt="Ruangan" class="w-28 h-20 object-cover rounded-lg" id="popup-img">
                <div class="text-lg font-bold" id="popup-harga"></div>
            </div>
            <a href="#" id="pesan-sekarang-btn" class="hidden">
                <button class="bg-green-700 text-white w-full py-2 rounded-full mt-4 hover:bg-green-800 transition">Pesan Sekarang</button>
            </a>
        </div>
    </div>

</div>
<script>
    // Function to filter rooms by size
    function filterRooms(size) {
        const rooms = document.querySelectorAll('.room-card');
        
        rooms.forEach(room => {
            if (size === 'all') {
                room.style.display = 'block';
            } else {
                const roomSize = room.getAttribute('data-size').toLowerCase();
                room.style.display = roomSize === size ? 'block' : 'none';
            }
        });
    }

    // Function to search rooms by package
    function searchRooms() {
    const searchTerm = document.getElementById('search-input').value.toLowerCase();
    const rooms = document.querySelectorAll('.room-card');
    
    // If search is empty, show all rooms
    if (!searchTerm) {
        rooms.forEach(room => room.style.display = 'block');
        return;
    }
    
    rooms.forEach(room => {
        const paket = room.getAttribute('data-paket').toLowerCase();
        room.style.display = paket.includes(searchTerm) ? 'block' : 'none';
    });
}

    // Function to update filter and URL
    function updateFilter(size) {
        // Update URL without reloading
        const url = new URL(window.location);
        url.searchParams.set('filter', size);
        url.searchParams.delete('triggerFilter'); // Clean up trigger if exists
        window.history.pushState({}, '', url);
        
        // Update UI
        updateFilterUI(size);
        filterRooms(size);
    }

    // Function to update filter button states
    function updateFilterUI(size) {
        document.querySelectorAll('.filter-button').forEach(btn => {
            btn.classList.remove('active', 'bg-gray-600');
            btn.classList.add('bg-gray-400');
        });
        
        const activeButton = document.querySelector(`.filter-button[data-filter="${size}"]`);
        if (activeButton) {
            activeButton.classList.remove('bg-gray-400');
            activeButton.classList.add('active', 'bg-gray-600');
        }
    }

    // Initialize from URL parameters
    function initFromUrl() {
    const urlParams = new URLSearchParams(window.location.search);
    
    // Handle search first
    const searchTerm = urlParams.get('search');
    if (searchTerm) {
        const searchInput = document.getElementById('search-input');
        searchInput.value = searchTerm;
        // Clear any active filters first
        updateFilterUI('all');
        filterRooms('all');
        // Then apply search
        searchRooms();
        return; // Exit after handling search to prevent filter interference
    }
    
    // Handle filter only if no search term
    const filterParam = urlParams.get('triggerFilter') || urlParams.get('filter') || 'all';
    updateFilterUI(filterParam);
    filterRooms(filterParam);
}

    // Room detail functions
    function showRoomDetail(roomId) {
        fetch(`/ruangan/${roomId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('popup-title').innerText = `Paket ${data.paket}, Ruang ${data.jenis}`;
                document.getElementById('popup-kapasitas').innerText = data.kapasitas;
                document.getElementById('popup-fasilitas').innerHTML = 
                    data.fasilitas.split('\n').map(f => `<li>${f}</li>`).join('');
                document.getElementById('popup-img').src = data.gambar_url;
                document.getElementById('popup-harga').innerText = `${data.formatted_harga}/Jam`;

                const pesanBtn = document.getElementById('pesan-sekarang-btn');
                pesanBtn.href = `/halaman_reservasi/${data.id}`;
                pesanBtn.classList.remove('hidden');

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

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
    initFromUrl();
    
    // Search input event - trigger on Enter key or when leaving the field
    const searchInput = document.getElementById('search-input');
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            searchRooms();
        }
    });
    searchInput.addEventListener('blur', searchRooms);
    
    // Filter button events
    document.querySelectorAll('.filter-button').forEach(button => {
        button.addEventListener('click', function() {
            const size = this.getAttribute('data-filter');
            updateFilter(size);
            // Clear search when filter is applied
            document.getElementById('search-input').value = '';
        });
    });
});

    window.addEventListener('popstate', initFromUrl);
</script>
@endsection