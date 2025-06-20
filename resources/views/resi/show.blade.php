<!DOCTYPE html>
<html>
<head>
    <title>Resi Pemesanan Karaoke</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            body { background: white !important; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="bg-blue-900 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-[500px] max-w-full">
        <!-- Header Resi -->
        <div class="text-center border-b-2 border-gray-300 pb-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-800">RESI PEMESANAN KARAOKE</h1>
            <p class="text-sm text-gray-600 mt-2">{{ config('app.name', 'Karaoke Paradise') }}</p>
        </div>

        <!-- Info ID Pemesanan -->
        <div class="mb-6">
            <div class="bg-gray-100 p-4 rounded-lg">
                <p class="text-lg font-bold text-center">ID Pemesanan: {{ $pembayaran->reservasi->id }}</p>
                <p class="text-sm text-gray-600 text-center">Tanggal Pemesanan: {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d F Y, H:i') }}</p>
            </div>
        </div>

        <!-- Data Pengunjung -->
        <div class="mb-6">
            <h3 class="font-bold text-gray-800 mb-3 border-b border-gray-200 pb-1">Data Pengunjung</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Nama:</span>
                    <span class="font-medium">{{ $pembayaran->reservasi->user->name ?? $pembayaran->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">{{ $pembayaran->reservasi->user->email ?? $pembayaran->user->email }}</span>
                </div>
            </div>
        </div>

        <!-- Detail Reservasi -->
        <div class="mb-6">
            <h3 class="font-bold text-gray-800 mb-3 border-b border-gray-200 pb-1">Detail Reservasi</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Nama Ruangan:</span>
                    <span class="font-medium">{{ $pembayaran->reservasi->ruangan->nama }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Jenis Ruangan:</span>
                    <span class="font-medium">{{ $pembayaran->reservasi->ruangan->jenis ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal:</span>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($pembayaran->reservasi->tanggal)->format('d F Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Waktu:</span>
                    <span class="font-medium">{{ $pembayaran->reservasi->waktu_mulai }} - {{ $pembayaran->reservasi->waktu_selesai }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Durasi:</span>
                    <span class="font-medium">
                        @php
                            $durasi = abs(\Carbon\Carbon::parse($pembayaran->reservasi->waktu_selesai)->diffInHours(\Carbon\Carbon::parse($pembayaran->reservasi->waktu_mulai)));
                        @endphp
                        {{ $durasi }} jam
                    </span>
                </div>
                @if($pembayaran->reservasi->catatan)
                <div class="flex justify-between">
                    <span class="text-gray-600">Catatan:</span>
                    <span class="font-medium">{{ $pembayaran->reservasi->catatan }}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="mb-6">
            <h3 class="font-bold text-gray-800 mb-3 border-b border-gray-200 pb-1">Detail Pembayaran</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Status Pembayaran:</span>
                    <span class="font-medium 
                        @if($pembayaran->status === 'Confirmed') text-green-600 
                        @elseif($pembayaran->status === 'Completed') text-blue-600 
                        @else text-yellow-600 @endif">
                        @if($pembayaran->status === 'Confirmed') Dikonfirmasi
                        @elseif($pembayaran->status === 'Completed') Selesai
                        @else {{ $pembayaran->status }} @endif
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal Pembayaran:</span>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d F Y, H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Total Pembayaran -->
        <div class="border-t-2 border-gray-300 pt-4 mb-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-gray-800">Total Pembayaran:</span>
                    <span class="text-2xl font-bold text-blue-600">Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-sm text-gray-500 border-t border-gray-200 pt-4">
            <p>Terima kasih telah menggunakan layanan kami!</p>
            <p class="mt-1">Resi ini dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y, H:i') }}</p>
        </div>

        <!-- Tombol Print -->
        <div class="text-center mt-6 no-print">
            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg mr-3">
                <i class="fas fa-print mr-2"></i>Cetak Resi
            </button>
            <button onclick="window.close()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                Tutup
            </button>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
</body>
</html>