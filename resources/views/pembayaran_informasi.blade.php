<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mikkeu Pangpang Karaoke</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-white">

  <!-- Header & Navigation -->
  <header class="bg-blue-200 shadow-md">
  <nav class="container mx-auto px-6 py-4">
    <div class="flex items-center">
      <!-- Menu Tengah -->
      <ul class="flex flex-1 justify-center items-center space-x-8 md:space-x-8 mx-auto">
        <li><a href="halaman.php" class="text-gray-800 hover:text-yellow-400 transition">Beranda</a></li>
        <li><a href="ruangan.php" class="text-gray-800 hover:text-yellow-400 transition">Ruangan</a></li>
        <li class="mx-4 md:mx-8">
    <img 
        src="logo.png"
        alt="Logo Mikkeu Pangpang" 
        class="h-10 w-10 rounded-full object-cover mx-auto"
    >
</li>

        <li><a href="ulasan.php" class="text-gray-800 hover:text-yellow-400 transition">Ulasan</a></li>
        <li><a href="kontak.php" class="text-gray-800 hover:text-yellow-400 transition">Kontak</a></li>
      </ul>
      
      <!-- Profile Icon di Kanan -->
      <div class="relative group ml-auto">
        <button class="focus:outline-none">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
               alt="Profile" 
               class="w-8 h-8 rounded-full border-2 border-blue-300">
        </button>
        
        <!-- Dropdown Menu -->
        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block group-focus:block z-50">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
          <hr class="border-gray-200 my-1">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
      </div>
    </div>
  </nav>
</header>
        
  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Payment Information Section -->
      <div class="bg-white rounded-lg shadow-lg p-6 flex-1 text-black">
        <h2 class="text-2xl font-bold mb-6">Informasi Pembayaran</h2>
        
        <div class="flex items-center bg-yellow-100 p-4 rounded-lg mb-6">
          <span class="mr-2">⏱</span>
          <span>Batas waktu pembayaran</span>
          <span class="ml-auto font-bold">30:00</span>
        </div>
        
        <div class="mb-8">
          <h3 class="text-xl font-semibold mb-4">Bank Transfer Details</h3>
          
          <div class="flex justify-between items-center py-3 border-b">
            <span class="font-medium">Nama Bank:</span>
            <div class="flex items-center">
              <span class="mr-2">Bank Negara Indonesia</span>
              <button class="copy-btn bg-gray-200 p-1 rounded hover:bg-gray-300">📋</button>
            </div>
          </div>
          
          <div class="flex justify-between items-center py-3 border-b">
            <span class="font-medium">Nomor Rekening:</span>
            <div class="flex items-center">
              <span class="mr-2">12345678910</span>
              <button class="copy-btn bg-gray-200 p-1 rounded hover:bg-gray-300">📋</button>
            </div>
          </div>
          
          <div class="flex justify-between items-center py-3 border-b">
            <span class="font-medium">Nama Pengguna:</span>
            <div class="flex items-center">
              <span class="mr-2">MikkeuPangpang Karaoke</span>
              <button class="copy-btn bg-gray-200 p-1 rounded hover:bg-gray-300">📋</button>
            </div>
          </div>
          
          <div class="flex justify-between items-center py-3 border-b">
            <span class="font-medium">Total Pembayaran:</span>
            <div class="flex items-center">
              <span class="mr-2">Rp. 150.000</span>
              <button class="copy-btn bg-gray-200 p-1 rounded hover:bg-gray-300">📋</button>
            </div>
          </div>
        </div>
        
        <div class="mb-8">
          <h3 class="text-xl font-semibold mb-4">Unggah Bukti Pembayaran</h3>
          <div class="border-2 border-dashed border-gray-300 p-4 rounded-lg cursor-pointer hover:bg-gray-50">
            <span class="text-gray-600">Pilih gambar</span>
            <span class="ml-2 text-gray-400">Screenshot (150).png</span>
          </div>
        </div>
        
        <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded-lg transition mb-6">
          Bayar Sekarang
        </button>
        
        <div class="text-sm text-gray-600 space-y-2">
          <p>Setelah melakukan pembayaran, unggah bukti pembayaran Anda untuk mengkonfirmasi pemesanan.</p>
          <p>Pemesanan Anda akan dikonfirmasi setelah kami meverifikasi bukti pembayaran Anda.</p>
          <p>Pembayaran harus diselesaikan dalam batas waktu yang ditentukan, jika tidak maka pemesanan Anda akan dibatalkan.</p>
        </div>
      </div>
      
      <!-- Order Summary Section -->
      <div class="bg-white rounded-lg shadow-lg p-6 flex-1 text-black">
        <h2 class="text-2xl font-bold mb-6">Pembayaran</h2>
        
        <div class="flex items-center mb-6">
          <div class="w-24 h-24 bg-gray-200 rounded-lg overflow-hidden mr-4">
            <img src="paketA.webp" alt="Small Room" class="w-full h-full object-cover">
          </div>
          <div>
            <div class="font-bold">SA001 Paket A</div>
            <div class="text-gray-600">Small Room</div>
            <div class="text-sm text-gray-500">maks. 5 orang</div>
          </div>
        </div>
        
        <div class="space-y-3 mb-6">
          <div class="flex justify-between">
            <span class="text-gray-600">Tanggal:</span>
            <span>April 18th, 2025</span>
          </div>
          
          <div class="flex justify-between">
            <span class="text-gray-600">waktu:</span>
            <span>13:00-16:00</span>
          </div>
          
          <div class="flex justify-between">
            <span class="text-gray-600">Durasi:</span>
            <span>3 jam</span>
          </div>
        </div>
        
        <div class="space-y-3 mb-6">
          <div class="flex justify-between">
            <span class="text-gray-600">harga:</span>
            <span>Rp. 50.000/jam</span>
          </div>
          
          <div class="flex justify-between">
            <span class="text-gray-600">Durasi:</span>
            <span>3 Jam</span>
          </div>
        </div>
        
        <div class="space-y-3 mb-6">
          <div class="flex justify-between font-bold text-lg">
            <span>Total Harga</span>
            <span class="text-yellow-600">Rp. 150.000</span>
          </div>
          
          <div class="flex justify-between">
            <span class="text-gray-600">Metode Pembayaran:</span>
            <span>Bank Transfer</span>
          </div>
          
          <div class="flex justify-between">
            <span class="text-gray-600">Status:</span>
            <span class="text-orange-500">Tertunda</span>
          </div>
        </div>
        
        <div class="text-sm text-gray-600 space-y-2">
          <p>Semua harga sudah termasuk pajak dan biaya layanan.</p>
          <p>Biaya pembatalan mungkin dikenakan untuk pembatalan yang terlambat.</p>
        </div>
      </div>
    </div>
  </div>
    
  <script>
    // Simple timer function (just for visual purposes in this demo)
    let timeLeft = 1800; // 30 minutes in seconds
    const updateTimer = () => {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        
        const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        document.querySelector('.time-limit span:last-child').textContent = formattedTime;
        
        if (timeLeft > 0) {
            timeLeft--;
            setTimeout(updateTimer, 1000);
        } else {
            alert('Waktu pembayaran habis!');
        }
    };
    
    // Initialize timer
    updateTimer();
    
    // Copy button functionality
    document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', function() {
            const textToCopy = this.previousElementSibling.textContent;
            navigator.clipboard.writeText(textToCopy).then(() => {
                alert('Berhasil disalin: ' + textToCopy);
            });
        });
    });
    
    // Payment button functionality
    document.querySelector('.pay-btn').addEventListener('click', function() {
        alert('Pembayaran sedang diproses!');
    });
  </script>
</body>
</html>