@extends('layouts.admin')

@section('content')
 <main class="p-6">
      <div class="flex justify-between items-center mb-4">
        <h5 class="text-xl font-semibold flex items-center">
          <i class="fas fa-home mr-2"></i> Beranda
        </h5>
      </div>
      <hr class="mb-6">

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md p-6 relative overflow-hidden">
          <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-xl"></div>
          <h6 class="text-lg font-semibold flex items-center mb-2"><i class="fas fa-box-open mr-2"></i> Paket Ruangan</h6>
          <p>Total: 3</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 relative overflow-hidden">
          <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-xl"></div>
          <h6 class="text-lg font-semibold flex items-center mb-2"><i class="fas fa-users mr-2"></i> Data Pengunjung</h6>
          <p>Total: 3</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 relative overflow-hidden">
          <div class="absolute top-0 left-0 h-full w-2 bg-purple-300 rounded-l-xl"></div>
          <h6 class="text-lg font-semibold flex items-center mb-2"><i class="fas fa-comment-alt mr-2"></i> Ulasan</h6>
          <p>Total: 2</p>
        </div>
      </div>

    </main>

  </div>

</div>
@endsection
