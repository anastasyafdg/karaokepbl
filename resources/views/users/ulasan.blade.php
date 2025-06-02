@extends('layouts.app')

@section('content')
<section id="ulasan" class="py-12">
  <div class="max-w-4xl mx-auto px-6">
    <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-gray-700">

      {{-- Alert sukses --}}
      @if(session('success'))
      <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded-lg border border-green-300 text-center">
        {{ session('success') }}
      </div>
      @endif

      <div class="flex flex-col md:flex-row justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-teal-400 mb-4 md:mb-0">Ulasan Pengunjung</h2>
        <button id="openModal"
                class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-2 rounded-lg shadow-md transition flex items-center">
          <i class="fas fa-plus mr-2"></i> Tambah Ulasan
        </button>
      </div>

      {{-- Jika tidak ada ulasan --}}
      @if($reviews->isEmpty())
      <div class="text-center text-gray-400 text-lg py-12">Belum ada ulasan yang disetujui.</div>
      @else
      {{-- Review Cards Container --}}
      <div class="space-y-6" id="reviews-container">
        @foreach($reviews as $review)
        <div class="bg-gray-700 p-6 rounded-xl shadow-md transform hover:scale-[1.02] transition duration-300">
          <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center mb-4 md:mb-0">
              <div class="bg-{{ $review->avatarColor }}-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold">
                {{ $review->avatarInitial }}
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-bold text-white">{{ $review->name }}</h3>
                <p class="text-sm text-gray-400">{{ $review->formattedDate }}</p>
              </div>
            </div>
            <div class="flex text-yellow-400 text-lg space-x-1">
              @for($i = 1; $i <= 5; $i++)
                @if($i <= $review->rating)
                  <i class="fas fa-star"></i>
                @else
                  <i class="far fa-star"></i>
                @endif
              @endfor
            </div>
          </div>
          <p class="mt-4 text-gray-300">{{ $review->comment }}</p>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
</section>

<!-- Modal Tambah Ulasan -->
<div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 p-4 hidden">
  <div class="flex items-center justify-center h-full">
    <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl w-full max-w-md relative animate-fadeIn border border-teal-500/30">
      <button id="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-white">
        <i class="fas fa-times text-xl"></i>
      </button>
      
      <h2 class="text-2xl font-bold mb-6 text-teal-400 text-center">Tambah Ulasan</h2>
      
      <form action="{{ route('ulasan.store') }}" method="POST" id="reviewForm" class="space-y-6">
        @csrf
        
        <div>
          <label for="reviewerName" class="block text-gray-300 mb-2">Nama Anda :</label>
          <input type="text" id="reviewerName" name="name" placeholder="Masukkan nama" required
                 class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-teal-500 border border-gray-600">
        </div>
        
        <div>
          <label for="reviewerEmail" class="block text-gray-300 mb-2">Email (opsional) :</label>
          <input type="email" id="reviewerEmail" name="email" placeholder="Masukkan email"
                 class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-teal-500 border border-gray-600">
        </div>
        
        <div class="text-center">
          <label class="block text-gray-300 mb-3">Rating</label>
          <div class="flex justify-center space-x-2" id="ratingStars">
            @for($i = 1; $i <= 5; $i++)
              <i class="far fa-star rating-star text-3xl text-yellow-400 cursor-pointer" data-rating="{{ $i }}"></i>
            @endfor
          </div>
          <input type="hidden" id="selectedRating" name="rating" value="0" required>
        </div>
        
        <div>
          <label for="reviewText" class="block text-gray-300 mb-2">Ulasan Anda :</label>
          <textarea id="reviewText" name="comment" placeholder="Bagikan pengalaman Anda..." required
                    class="w-full p-3 rounded-lg bg-gray-700 text-white h-32 resize-none focus:outline-none focus:ring-2 focus:ring-teal-500 border border-gray-600"></textarea>
        </div>
        
        <div class="flex justify-end space-x-3 pt-2">
          <button type="button" id="cancelReview" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">Batal</button>
          <button type="submit" class="px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition flex items-center">
            <i class="fas fa-paper-plane mr-2"></i> Kirim
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Modal functionality
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const cancelReview = document.getElementById('cancelReview');
    const reviewModal = document.getElementById('reviewModal');
    const ratingStars = document.querySelectorAll('.rating-star');
    const selectedRating = document.getElementById('selectedRating');
    const reviewForm = document.getElementById('reviewForm');

    // Open modal
    openModal.addEventListener('click', () => {
      reviewModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });

    // Close modal
    function closeReviewModal() {
      reviewModal.classList.add('hidden');
      document.body.style.overflow = '';
      reviewForm.reset();
      selectedRating.value = '0';
      ratingStars.forEach(star => {
        star.classList.remove('fas');
        star.classList.add('far');
      });
    }

    closeModal.addEventListener('click', closeReviewModal);
    cancelReview.addEventListener('click', closeReviewModal);

    // Rating stars functionality
    ratingStars.forEach(star => {
      star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-rating'));
        selectedRating.value = rating;
        
        ratingStars.forEach((s, index) => {
          if (index < rating) {
            s.classList.remove('far');
            s.classList.add('fas');
          } else {
            s.classList.remove('fas');
            s.classList.add('far');
          }
        });
      });
      
      // Hover effect
      star.addEventListener('mouseover', () => {
        const hoverRating = parseInt(star.getAttribute('data-rating'));
        ratingStars.forEach((s, index) => {
          if (index < hoverRating) {
            s.classList.add('text-yellow-300');
          } else {
            s.classList.remove('text-yellow-300');
          }
        });
      });
      
      star.addEventListener('mouseout', () => {
        const currentRating = parseInt(selectedRating.value);
        ratingStars.forEach((s, index) => {
          s.classList.remove('text-yellow-300');
          if (index < currentRating) {
            s.classList.remove('far');
            s.classList.add('fas');
          } else {
            s.classList.remove('fas');
            s.classList.add('far');
          }
        });
      });
    });

    // Form validation
    reviewForm.addEventListener('submit', function(e) {
      if (selectedRating.value === '0') {
        e.preventDefault();
        alert('Harap berikan rating!');
      }
    });
  });
</script>
@endsection
