 @extends('layouts.admin')

@section('title', 'Data Ulasan')

@section('content')
 
      <h2 class="text-2xl font-bold mb-6 flex items-center">
        <i class="fas fa-comment-dots text-2xl mr-2"></i> 
        Ulasan Pengunjung
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Kartu Ulasan 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md relative">
          <div class="flex items-center mb-4">
            <i class="fas fa-comment-alt text-purple-500 text-3xl mr-3"></i>
            <div>
              <h4 class="font-bold">Melanie Putri</h4>
              <small class="text-gray-500">11 Apr 2025</small>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="flex text-yellow-400 text-lg">
              ★★★★☆
            </div>
          </div>
          <p class="text-gray-700 mb-4">"Pelayanan sangat baik, ruangan bersih dan nyaman. Sound system berkualitas."</p>
          <div class="flex space-x-3">
            <button class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm hover:bg-green-200">
              <i class="fas fa-check mr-1"></i> Setujui
            </button>
            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm hover:bg-red-200">
              <i class="fas fa-times mr-1"></i> Tolak
            </button>
          </div>
        </div>

        <!-- Kartu Ulasan 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md relative">
          <div class="flex items-center mb-4">
            <i class="fas fa-comment-alt text-purple-500 text-3xl mr-3"></i>
            <div>
              <h4 class="font-bold">Saskia Annda</h4>
              <small class="text-gray-500">24 Apr 2025</small>
            </div>
          </div>
          <div class="flex items-center mb-2">
            <div class="flex text-yellow-400 text-lg">
              ★★★★☆
            </div>
          </div>
          <p class="text-gray-700 mb-4">"Seru banget pelayanannya bagus dan sangat baik, rekomend banget!!!"</p>
          <div class="flex space-x-3">
            <button class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm hover:bg-green-200">
              <i class="fas fa-check mr-1"></i> Setujui
            </button>
            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm hover:bg-red-200">
              <i class="fas fa-times mr-1"></i> Tolak
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection