@extends('layouts.admin')

@section('title', 'Data Pengunjung')

@section('content')
   <main class="p-6">
      <div class="flex justify-between items-center mb-4">
        <h5 class="text-xl font-semibold flex items-center">
          <i class="fas fa-users mr-2"></i> Data Pengunjung
        </h5>
      </div>
      <hr class="mb-6">

      <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">NO</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">NAMA</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">EMAIL</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">NO HANDPHONE</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          </tbody>
        </table>
      </div>

    </main>

  </div>

</div>
@endsection
