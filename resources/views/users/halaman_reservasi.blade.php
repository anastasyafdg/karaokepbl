@extends('layouts.app') 

@section('content')
<main class="container mx-auto px-4 py-8 max-w-6xl">
    <h1 class="text-3xl font-bold text-white mb-2">Pembayaran Reservasi</h1>
    <p class="text-white mb-8">Lengkapi informasi pemesanan Anda</p>

    <form action="{{ route('reservasi.store') }}" method="post" class="flex flex-col lg:flex-row gap-8">
        @csrf
        <input type="hidden" name="ruangan_id" value="{{ $ruangan->id }}">

        <!-- Informasi Pemesanan -->
        <div class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100 flex-1">
            <h2 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
                <i class="fas fa-calendar-check mr-3 text-blue-500"></i> Informasi Pemesanan
            </h2>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Reservasi</label>
                    <input type="date" name="tanggal" id="tanggal_input" required 
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all"
                           min="{{ date('Y-m-d') }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Pilih Waktu</label>
                    @php
                        $slot_waktu = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', 
                                       '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
                    @endphp

                    <div class="mb-1.5">
                        <h3 class="font-semibold text-lg mb-3 text-gray-800">
                            <i class="fas fa-clock mr-2 text-blue-500"></i> Pilih Slot Waktu
                        </h3>

                        <div class="grid grid-cols-4 gap-3" id="slot-container">
                            @foreach ($slot_waktu as $slot)
                                @php $tersedia = !in_array($slot, $slot_tidak_tersedia); @endphp
                                <button type="button"
                                    class="slot-waktu px-3 py-2 rounded-lg font-semibold text-sm
                                           {{ $tersedia ? 'bg-gray-100 hover:bg-green-200 text-gray-700' : 'bg-gray-300 text-gray-400 cursor-not-allowed' }}"
                                    data-slot="{{ $slot }}"
                                    {{ $tersedia ? '' : 'disabled' }}>
                                    {{ $slot }}
                                </button>
                            @endforeach
                        </div>

                        <input type="hidden" name="waktu_mulai" id="input-waktu-mulai">
                        <input type="hidden" name="waktu_selesai" id="input-waktu-selesai">
                    </div>

                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan Tambahan</label>
                    <textarea name="catatan" id="catatan_input" rows="3" 
                              class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all" 
                              placeholder="Contoh: untuk paket snacknya saya mau nugget..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Metode Pembayaran</label>
                    <div class="relative">
                        <select name="metode_pembayaran" id="metode_pembayaran" required 
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-500 appearance-none transition-all">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="transfer">Bank Transfer</option>
                            <option value="e-wallet">E-Wallet</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="total_harga" id="total_harga_input" value="0">

            <button type="submit" id="submit-btn" disabled class="w-full bg-gray-400 cursor-not-allowed mt-8 py-3.5 rounded-lg font-semibold text-white shadow-md transition-all duration-300 flex items-center justify-center">
                <i class="fas fa-credit-card mr-2"></i> Bayar Sekarang
            </button>
        </div>

        <!-- Ringkasan Pembayaran -->
        <div class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-gray-100 lg:max-w-md w-full h-fit sticky top-24">
            <h2 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
                <i class="fas fa-receipt mr-3 text-blue-500"></i> Ringkasan Pesanan
            </h2>

            <div class="flex items-start gap-5 mb-6 pb-6 border-b border-gray-100">
                <img src="{{ $ruangan->gambar_url }}" alt="Ruangan" class="h-24 w-24 object-cover rounded-lg shadow">
                <div>
                    <p class="font-bold text-gray-800">{{ $ruangan->id }} - Paket {{ $ruangan->paket }}</p>
                    <p class="text-sm text-gray-500 mb-2">{{ ucfirst($ruangan->jenis) }} (Maks. {{ $ruangan->kapasitas }} orang)</p>
                    <div class="flex items-center text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-gray-500 ml-2">4.5 (128 ulasan)</span>
                    </div>
                </div>
            </div>

            <div class="space-y-3 mb-6">
                <div class="flex justify-between">
                    <span class="text-gray-600">Harga per jam</span>
                    <span class="font-medium">{{ $ruangan->formatted_harga }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Durasi</span>
                    <span class="font-medium" id="durasi_placeholder">- Jam</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal</span>
                    <span class="font-medium" id="tanggal_placeholder">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Waktu</span>
                    <span class="font-medium" id="waktu_placeholder">-</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Metode Pembayaran</span>
                    <span class="font-medium" id="metode_placeholder">-</span>
                </div>
                <div class="flex justify-between" id="catatan_row" style="display: none;">
                    <span class="text-gray-600">Catatan</span>
                    <span class="font-medium text-sm" id="catatan_placeholder">-</span>
                </div>
            </div>

            <div class="p-4 bg-blue-50 rounded-lg mb-6">
                <div class="flex justify-between items-center">
                    <span class="font-bold text-gray-800">Total Pembayaran</span>
                    <span class="text-2xl font-bold text-blue-600" id="total_harga_display">Rp0</span>
                </div>
            </div>

            <ul class="text-gray-500 text-sm space-y-2">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                    <span>Harga sudah termasuk pajak & layanan</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-info-circle text-blue-400 mr-2 mt-0.5"></i>
                    <span>Pembatalan bisa dikenakan biaya 20%</span>
                </li>
            </ul>
        </div>

    </form>
</main>

<script>
    const slotButtons = document.querySelectorAll('.slot-waktu');
    const slotWaktu = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
    const hargaPerJam = {{ $ruangan->harga }};
    let selectedSlots = [];

    // Function to check if all required fields are filled
    function checkFormValidity() {
        const tanggal = document.getElementById('tanggal_input').value;
        const waktuMulai = document.getElementById('input-waktu-mulai').value;
        const waktuSelesai = document.getElementById('input-waktu-selesai').value;
        const metode = document.getElementById('metode_pembayaran').value;
        
        const isValid = tanggal && waktuMulai && waktuSelesai && metode;
        const submitBtn = document.getElementById('submit-btn');
        
        if (isValid) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitBtn.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'hover:from-blue-600', 'hover:to-blue-700');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
            submitBtn.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'hover:from-blue-600', 'hover:to-blue-700');
        }
    }

    // Function to load available slots for selected date
    async function loadAvailableSlots(date) {
        if (!date) return;
        
        try {
            const response = await fetch(`/api/available-slots/${{{ $ruangan->id }}}/${date}`);
            const data = await response.json();
            
            slotButtons.forEach(btn => {
                const slot = btn.dataset.slot;
                const isAvailable = data.available_slots.includes(slot);
                
                btn.disabled = !isAvailable;
                if (isAvailable) {
                    btn.classList.remove('bg-gray-300', 'text-gray-400', 'cursor-not-allowed');
                    btn.classList.add('bg-gray-100', 'hover:bg-green-200', 'text-gray-700');
                } else {
                    btn.classList.add('bg-gray-300', 'text-gray-400', 'cursor-not-allowed');
                    btn.classList.remove('bg-gray-100', 'hover:bg-green-200', 'text-gray-700', 'bg-green-400', 'text-white');
                }
            });
            
            // Clear selected slots when date changes
            selectedSlots = [];
            document.getElementById('input-waktu-mulai').value = '';
            document.getElementById('input-waktu-selesai').value = '';
            updateRingkasan();
            
        } catch (error) {
            console.error('Error loading available slots:', error);
        }
    }

    slotButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const slot = btn.dataset.slot;

        if (btn.disabled) return;

        if (selectedSlots.includes(slot)) {
            selectedSlots = selectedSlots.filter(s => s !== slot);
            btn.classList.remove('bg-green-400', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-700');
        } else {
            selectedSlots.push(slot);
            selectedSlots.sort();
            btn.classList.remove('bg-gray-100', 'text-gray-700');
            btn.classList.add('bg-green-400', 'text-white');
        }

        const indexList = selectedSlots.map(s => slotWaktu.indexOf(s)).filter(index => index !== -1);
        const isConsecutive = indexList.length <= 1 || indexList.every((val, i, arr) => i === 0 || val - arr[i - 1] === 1);

        if (!isConsecutive) {
            alert('Slot harus berurutan!');
            slotButtons.forEach(b => {
                b.classList.remove('bg-green-400', 'text-white');
                if (!b.disabled) {
                    b.classList.add('bg-gray-100', 'text-gray-700');
                }
            });
            selectedSlots = [];
            document.getElementById('input-waktu-mulai').value = '';
            document.getElementById('input-waktu-selesai').value = '';
            updateRingkasan();
            checkFormValidity();
            return;
        }

        if (selectedSlots.length > 0) {
            document.getElementById('input-waktu-mulai').value = selectedSlots[0];
            const lastSlotIndex = slotWaktu.indexOf(selectedSlots[selectedSlots.length - 1]);
            const waktuSelesai = slotWaktu[lastSlotIndex + 1] ?? (parseInt(selectedSlots[selectedSlots.length - 1].split(':')[0]) + 1).toString().padStart(2, '0') + ':00';
            document.getElementById('input-waktu-selesai').value = waktuSelesai;
            
            // Validate time selection
            const start = new Date(`2025-01-01T${selectedSlots[0]}:00`);
            const end = new Date(`2025-01-01T${waktuSelesai}:00`);
            if (end < start) {
                alert('Waktu selesai tidak boleh sebelum waktu mulai!');
                // Reset selection
                slotButtons.forEach(b => {
                    b.classList.remove('bg-green-400', 'text-white');
                    if (!b.disabled) {
                        b.classList.add('bg-gray-100', 'text-gray-700');
                    }
                });
                selectedSlots = [];
                document.getElementById('input-waktu-mulai').value = '';
                document.getElementById('input-waktu-selesai').value = '';
            }
        } else {
            document.getElementById('input-waktu-mulai').value = '';
            document.getElementById('input-waktu-selesai').value = '';
        }
        
        updateRingkasan();
        checkFormValidity();
    });
});
    function formatTanggal(tanggal) {
        const date = new Date(tanggal);
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        return date.toLocaleDateString('id-ID', options);
    }

    function formatRupiah(amount) {
        return `Rp ${amount.toLocaleString('id-ID')}`;
    }

    function hitungDurasi(waktuMulai, waktuSelesai) {
    if (!waktuMulai || !waktuSelesai) return 0;
    const start = new Date(`2025-01-01T${waktuMulai}:00`);
    const end = new Date(`2025-01-01T${waktuSelesai}:00`);
    const hours = (end - start) / (1000 * 60 * 60);
    return Math.abs(hours); // Always return positive duration
}

function updateRingkasan() {
    const tanggal = document.getElementById('tanggal_input').value;
    const waktuMulai = document.getElementById('input-waktu-mulai').value;
    const waktuSelesai = document.getElementById('input-waktu-selesai').value;
    const metode = document.getElementById('metode_pembayaran').value;
    const catatan = document.getElementById('catatan_input').value;
    
    // Update Tanggal
    document.getElementById('tanggal_placeholder').textContent = tanggal ? formatTanggal(tanggal) : '-';
    
    // Update Waktu
    document.getElementById('waktu_placeholder').textContent = waktuMulai && waktuSelesai ? `${waktuMulai} - ${waktuSelesai}` : '-';
    
    // Calculate raw duration (could be negative)
    const rawStart = new Date(`2025-01-01T${waktuMulai}:00`);
    const rawEnd = new Date(`2025-01-01T${waktuSelesai}:00`);
    const rawHours = (rawEnd - rawStart) / (1000 * 60 * 60);
    
    // Update Durasi (always show positive)
    const durasi = hitungDurasi(waktuMulai, waktuSelesai);
    document.getElementById('durasi_placeholder').textContent = durasi > 0 ? `${durasi} Jam` : '- Jam';
    
    // Update Metode Pembayaran
    const metodeText = metode === 'transfer' ? 'Bank Transfer' : metode === 'e-wallet' ? 'E-Wallet' : '-';
    document.getElementById('metode_placeholder').textContent = metodeText;
    
    // Update Catatan
    const catatanRow = document.getElementById('catatan_row');
    if (catatan.trim()) {
        catatanRow.style.display = 'flex';
        document.getElementById('catatan_placeholder').textContent = catatan.length > 30 ? catatan.substring(0, 30) + '...' : catatan;
    } else {
        catatanRow.style.display = 'none';
    }
    
    // Update Total Harga - use raw hours for calculation
    const totalHarga = rawHours * hargaPerJam;
    document.getElementById('total_harga_display').textContent = formatRupiah(Math.abs(totalHarga));
    document.getElementById('total_harga_input').value = totalHarga;
    
    // Visual feedback if the time selection is invalid (end before start)
    const totalDisplay = document.getElementById('total_harga_display');
    if (rawHours < 0) {
        totalDisplay.classList.add('text-red-600');
        totalDisplay.classList.remove('text-blue-600');
        // You might want to disable the submit button here
        document.getElementById('submit-btn').disabled = true;
    } else {
        totalDisplay.classList.add('text-blue-600');
        totalDisplay.classList.remove('text-red-600');
        // Re-enable the submit button if duration is valid
        checkFormValidity();
    }
}
    // Event listeners
    document.getElementById('tanggal_input').addEventListener('change', function() {
        loadAvailableSlots(this.value);
        updateRingkasan();
        checkFormValidity();
    });

    document.getElementById('metode_pembayaran').addEventListener('change', function() {
        updateRingkasan();
        checkFormValidity();
    });

    document.getElementById('catatan_input').addEventListener('input', function() {
        updateRingkasan();
    });

    // Initialize
    updateRingkasan();
    checkFormValidity();
</script>

@endsection