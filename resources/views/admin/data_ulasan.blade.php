@extends('layouts.admin')

@section('title', 'Data Ulasan')

@section('content')


<h2 class="text-2xl font-bold mb-6 flex items-center">
  <i class="fas fa-comment-dots text-2xl mr-2"></i> 
  Ulasan Pengunjung
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
  <!-- Ulasan 1 -->
  <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
    <div class="flex items-center mb-4">
      <div class="flex-shrink-0">
        <i class="fas fa-comment-alt text-purple-500 text-3xl"></i>
      </div>
      <div class="ml-4">
        <h5 class="text-base font-semibold text-gray-900">Rasya</h5>
        <p class="text-sm text-gray-500">11 Apr 2025</p>
      </div>
    </div>
    <div class="flex items-center mb-2 text-yellow-400 text-lg">
      ★★★★☆
    </div>
    <p class="text-gray-700 mb-4">
      "Pelayanan sangat baik, ruangan bersih dan nyaman. Sound system berkualitas saya sangat suka sekali."
    </p>
    <div class="flex space-x-3">
      <button type="button"
        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-green-700 bg-green-100 rounded-full hover:bg-green-200">
        <i class="fas fa-check mr-1"></i> Setujui
      </button>
      <button type="button"
        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-700 bg-red-100 rounded-full hover:bg-red-200">
        <i class="fas fa-times mr-1"></i> Tolak
      </button>
    </div>
  </div>

  <!-- Ulasan 2 -->
  <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
    <div class="flex items-center mb-4">
      <div class="flex-shrink-0">
        <i class="fas fa-comment-alt text-purple-500 text-3xl"></i>
      </div>
      <div class="ml-4">
        <h5 class="text-base font-semibold text-gray-900">Jaehyun</h5>
        <p class="text-sm text-gray-500">24 Apr 2025</p>
      </div>
    </div>
    <div class="flex items-center mb-2 text-yellow-400 text-lg">
      ★★★★☆
    </div>
    <p class="text-gray-700 mb-4">
      "Seru banget pelayanannya bagus dan sangat baik, rekomend banget suka banget pokoknya!!!"
    </p>
    <div class="flex space-x-3">
      <button type="button"
        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-green-700 bg-green-100 rounded-full hover:bg-green-200">
        <i class="fas fa-check mr-1"></i> Setujui
      </button>
      <button type="button"
        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-700 bg-red-100 rounded-full hover:bg-red-200">
        <i class="fas fa-times mr-1"></i> Tolak
      </button>
    </div>
  </div>
</div>


@endsection
