@extends('layouts.admin')

@section('title', 'Ulasan Pengunjung')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 flex items-center">
            <i class="fas fa-comment-dots mr-2"></i> Ulasan Pengunjung
        </h2>
        <hr class="mb-6 border-gray-200">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($reviews as $review)
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user-circle text-purple-500 text-3xl"></i>
                        <div class="ml-4">
                            <h5 class="text-lg font-semibold text-gray-900">{{ $review->name }}</h5>
                            <p class="text-sm text-gray-500">{{ $review->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="mb-2 text-yellow-400 text-lg">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>

                    <!-- Komentar -->
                    <p class="text-gray-700 mb-4">"{{ $review->comment }}"</p>

                    <div class="flex justify-between items-center mt-4">
                        <span class="px-3 py-1 text-xs rounded-full 
                            {{ $review->status == 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($review->status) }}
                        </span>

                        <div class="flex space-x-2">
                            @if($review->status !== 'approved')
                            <form action="{{ route('admin.ulasan.approve', $review->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full hover:bg-green-200 transition">
                                    <i class="fas fa-check mr-1"></i> Setujui
                                </button>
                            </form>
                            @endif

                            @if($review->status !== 'rejected')
                            <form action="{{ route('admin.ulasan.reject', $review->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition">
                                    <i class="fas fa-times mr-1"></i> Tolak
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-500">Belum ada ulasan tersedia.</div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    </div>
</div>
@endsection
