@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slsate-800 py-8">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Status Alert -->
        @if(session('status'))
        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-4 mb-6 rounded-xl shadow-lg animate-fade-in">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-xl"></i>
                <p class="font-medium">{{ session('status') }}</p>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-gradient-to-r from-red-400 to-red-600 text-white p-4 mb-6 rounded-xl shadow-lg animate-fade-in">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-3 text-xl"></i>
                <p class="font-medium">{{ session('error') }}</p>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header dengan Gradient - FIXED -->
            <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-800 p-8 text-white relative overflow-hidden" style="z-index: 10; position: relative;">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>
                <div class="relative z-10 flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold mb-2">Konfirmasi Pembayaran</h1>
                        <div class="flex items-center space-x-2">
                            <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm">
                                ID: {{ $reservasi->id }}
                            </span>
                            <span class="bg-green-400/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm flex items-center">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Aman & Terverifikasi
                            </span>
                        </div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/20">
                        <div class="flex items-center text-center">
                            <div class="mr-4">
                                <i class="fas fa-clock text-2xl mb-1"></i>
                                <p class="text-xs opacity-80">Batas Waktu</p>
                            </div>
                            <div>
                                <span class="font-mono text-2xl font-bold" id="payment-timer">30:00</span>
                                <p class="text-xs opacity-80">Menit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="grid lg:grid-cols-5 gap-8">
                    <!-- Order Summary - 3 kolom -->
                    <div class="lg:col-span-3">
                        <div class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                            <h2 class="text-2xl font-bold mb-6 flex items-center text-gray-800">
                                <div class="bg-blue-100 p-3 rounded-xl mr-4">
                                    <i class="fas fa-receipt text-blue-600 text-xl"></i>
                                </div>
                                Detail Pesanan
                            </h2>
                            
                            <!-- Room Card -->
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-6">
                                <div class="flex items-start gap-6">
                                    <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl overflow-hidden shadow-md">
                                        @if($reservasi->ruangan && $reservasi->ruangan->gambar)
                                            <img src="{{ $reservasi->ruangan->gambar_url }}" alt="Ruangan" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <i class="fas fa-image text-4xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-start justify-between mb-2">
                                            <h3 class="text-xl font-bold text-gray-800">{{ $reservasi->ruangan->id }} - Paket {{ $reservasi->ruangan->paket }}</h3>
                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                                Premium
                                            </span>
                                        </div>
                                        <div class="space-y-2 mb-4">
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-door-open mr-2 text-blue-500"></i>
                                                <span class="text-sm">{{ $reservasi->ruangan->jenis }}</span>
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-users mr-2 text-green-500"></i>
                                                <span class="text-sm">Kapasitas {{ $reservasi->ruangan->kapasitas }} orang</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-yellow-400 text-sm">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span class="text-gray-500 ml-2">4.7 (86 ulasan)</span>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm text-gray-500">Harga per jam</p>
                                                <p class="text-lg font-bold text-gray-800">{{ $reservasi->ruangan->formatted_harga }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Booking Details -->
                            <div class="grid md:grid-cols-2 gap-4 mb-6">
                                <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                                    <div class="flex items-center mb-2">
                                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                            <i class="far fa-calendar-alt text-blue-600"></i>
                                        </div>
                                        <span class="text-sm text-gray-500 font-medium">Tanggal Booking</span>
                                    </div>
                                    <p class="font-bold text-gray-800 ml-11">
                                        {{ \Carbon\Carbon::parse($reservasi->tanggal)->translatedFormat('l, d F Y') }}
                                    </p>
                                </div>

                                <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                                    <div class="flex items-center mb-2">
                                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                                            <i class="far fa-clock text-green-600"></i>
                                        </div>
                                        <span class="text-sm text-gray-500 font-medium">Waktu</span>
                                    </div>
                                    <p class="font-bold text-gray-800 ml-11">
                                        {{ date('H:i', strtotime($reservasi->waktu_mulai)) }} - {{ date('H:i', strtotime($reservasi->waktu_selesai)) }}
                                    </p>
                                </div>

                                <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                                    <div class="flex items-center mb-2">
                                        <div class="bg-purple-100 p-2 rounded-lg mr-3">
                                            <i class="fas fa-hourglass-half text-purple-600"></i>
                                        </div>
                                        <span class="text-sm text-gray-500 font-medium">Durasi</span>
                                    </div>
                                    <p class="font-bold text-gray-800 ml-11">{{ $durasi }} jam</p>
                                </div>

                                @if($reservasi->catatan)
                                <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                                    <div class="flex items-center mb-2">
                                        <div class="bg-orange-100 p-2 rounded-lg mr-3">
                                            <i class="fas fa-sticky-note text-orange-600"></i>
                                        </div>
                                        <span class="text-sm text-gray-500 font-medium">Catatan</span>
                                    </div>
                                    <p class="font-medium text-gray-700 ml-11">{{ $reservasi->catatan }}</p>
                                </div>
                                @endif
                            </div>

                            <!-- Total Calculation -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-100">
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 flex items-center">
                                            <i class="fas fa-calculator mr-2 text-blue-500"></i>
                                            Harga per jam
                                        </span>
                                        <span class="font-semibold text-gray-800">{{ $reservasi->ruangan->formatted_harga }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 flex items-center">
                                            <i class="fas fa-times mr-2 text-green-500"></i>
                                            Durasi booking
                                        </span>
                                        <span class="font-semibold text-gray-800">{{ $durasi }} jam</span>
                                    </div>
                                    <div class="border-t border-blue-200 pt-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-bold text-gray-800 flex items-center">
                                                <i class="fas fa-equals mr-2 text-indigo-600"></i>
                                                Total Pembayaran
                                            </span>
                                            <span class="text-2xl font-bold text-indigo-700">
                                                Rp{{ number_format($totalPembayaran, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Section - 2 kolom -->
                    <div class="lg:col-span-2">
                        <div class="sticky top-8">
                            <h2 class="text-2xl font-bold mb-6 flex items-center text-gray-800">
                                <div class="bg-green-100 p-3 rounded-xl mr-4">
                                    <i class="fas fa-credit-card text-green-600 text-xl"></i>
                                </div>
                                Pembayaran
                            </h2>
                            
                            <!-- Payment Instructions -->
                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-2xl mb-6 border border-green-100 shadow-sm">
                                
                                
                                <div class="space-y-3">
                                    <div class="bg-white p-4 rounded-xl border border-green-100">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600 font-medium">Nomor Rekening</span>
                                            <div class="flex items-center">
                                                <span class="font-mono font-bold text-gray-800 mr-2">123 456 7890</span>
                                                <button onclick="copyToClipboard('123 456 7890')" class="text-green-600 hover:text-green-700">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 rounded-xl border border-green-100">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600 font-medium">Atas Nama</span>
                                            <span class="font-bold text-gray-800">Mikkeu Karaoke</span>
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-4 rounded-xl text-white">
                                        <div class="flex justify-between items-center">
                                            <span class="font-bold text-lg">Total Pembayaran</span>
                                            <div class="text-right">
                                                <div class="text-2xl font-bold">
                                                    Rp{{ number_format($totalPembayaran, 0, ',', '.') }}
                                                </div>
                                                <div class="text-sm opacity-90">Transfer tepat nominal</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Form -->
                            <form action="{{ route('konfirmasi.proses') }}" method="POST" enctype="multipart/form-data" id="payment-form">
                                @csrf
                                <input type="hidden" name="reservasi_id" value="{{ $reservasi->id }}">

                                <div class="mb-6">
                                    <label class="block text-gray-800 mb-3 font-bold text-lg">Upload Bukti Transfer</label>
                                    <div class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center cursor-pointer hover:border-blue-400 hover:bg-blue-50/50 transition-all duration-300 relative" 
                                        id="upload-area">
                                        <input type="file" id="bukti-transfer" name="bukti_transfer" class="hidden" accept="image/*" required>
                                        <div id="upload-content">
                                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <i class="fas fa-cloud-upload-alt text-2xl text-blue-600"></i>
                                            </div>
                                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Upload Bukti Pembayaran</h3>
                                            <p class="text-gray-600 mb-4">Seret file atau klik untuk memilih</p>
                                            <button type="button" onclick="document.getElementById('bukti-transfer').click()" 
                                                class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl">
                                                <i class="fas fa-plus mr-2"></i>Pilih File
                                            </button>
                                            <p class="text-xs text-gray-500 mt-3">Format: JPG, PNG (Maksimal 2MB)</p>
                                        </div>
                                        <div id="file-preview" class="hidden">
                                            <div class="relative">
                                                <img id="preview-image" class="max-w-full h-48 mx-auto rounded-xl object-contain border border-gray-200 shadow-lg">
                                                <button type="button" onclick="cancelUpload()" 
                                                    class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center transition-colors">
                                                    <i class="fas fa-times text-sm"></i>
                                                </button>
                                            </div>
                                            <p id="file-name" class="text-sm text-gray-600 mt-3 font-medium truncate"></p>
                                            <p class="text-xs text-green-600 mt-1">
                                                <i class="fas fa-check-circle mr-1"></i>File siap diupload
                                            </p>
                                        </div>
                                    </div>
                                    @error('bukti_transfer')
                                        <p class="text-red-500 text-sm mt-2 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <button type="submit" id="submit-btn" 
                                    class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-4 px-6 rounded-2xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                                    <i class="fas fa-check-circle mr-3 text-xl"></i> 
                                    Konfirmasi Pembayaran
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Timer countdown dengan efek visual
    let timeLeft = 1800; // 30 minutes in seconds
    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        const timerEl = document.getElementById('payment-timer');
        if (timerEl) {
            timerEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            // Change color when time is running out
            if (timeLeft <= 300) { // 5 minutes
                timerEl.parentElement.parentElement.classList.add('bg-red-500/20', 'border-red-300');
                timerEl.classList.add('text-red-600');
            }
        }

        if (timeLeft <= 0) {
            alert('Waktu pembayaran telah habis! Silakan buat reservasi baru.');
            window.location.href = "{{ route('landing') }}";
            return;
        }

        timeLeft--;
        setTimeout(updateTimer, 1000);
    }
    updateTimer();

    // File upload handling dengan preview yang lebih baik
    const fileInput = document.getElementById('bukti-transfer');
    const uploadArea = document.getElementById('upload-area');
    const uploadContent = document.getElementById('upload-content');
    const filePreview = document.getElementById('file-preview');
    const previewImage = document.getElementById('preview-image');
    const fileName = document.getElementById('file-name');
    const paymentForm = document.getElementById('payment-form');
    const submitBtn = document.getElementById('submit-btn');

    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];

                if (!file.type.match('image.*')) {
                    alert('Hanya file gambar yang diperbolehkan');
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    fileName.textContent = file.name;
                    uploadContent.classList.add('hidden');
                    filePreview.classList.remove('hidden');
                    uploadArea.classList.add('border-green-400', 'bg-green-50');
                }
                reader.readAsDataURL(file);
            }
        });
    }

    if (uploadArea) {
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('border-blue-500', 'bg-blue-50', 'scale-105');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50', 'scale-105');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50', 'scale-105');
            fileInput.files = e.dataTransfer.files;
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        });
    }

    // Cancel upload
    window.cancelUpload = function () {
        if (fileInput) fileInput.value = '';
        uploadContent.classList.remove('hidden');
        filePreview.classList.add('hidden');
        uploadArea.classList.remove('border-green-400', 'bg-green-50');
    }

    // Copy to clipboard function
    window.copyToClipboard = function(text) {
        navigator.clipboard.writeText(text).then(() => {
            // Show toast notification
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 animate-fade-in';
            toast.innerHTML = '<i class="fas fa-check mr-2"></i>Nomor rekening disalin!';
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.remove();
            }, 3000);
        });
    }

    // Form submission dengan loading state yang lebih menarik
    if (paymentForm && submitBtn) {
        paymentForm.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <div class="flex items-center justify-center">
                    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-2"></div>
                    Memproses Pembayaran...
                </div>
            `;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
        });
    }
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
`;
document.head.appendChild(style);
</script>
@endsection