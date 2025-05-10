@extends('layouts.app')

@section('content')

<!-- Ulasan Section -->
<section id="ulasan" class="py-12">
  <div class="max-w-4xl mx-auto px-6">
    <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-gray-700">
      <div class="flex flex-col md:flex-row justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-teal-400 mb-4 md:mb-0">Ulasan Pengunjung</h2>
        <button id="openModal"
                class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-2 rounded-lg shadow-md transition flex items-center">
          <i class="fas fa-plus mr-2"></i> Tambah Ulasan
        </button>
      </div>

      <!-- Review Cards Container -->
      <div class="space-y-6" id="reviews-container">
        <!-- Review Card 1 -->
        <div class="bg-gray-700 p-6 rounded-xl shadow-md transform hover:scale-[1.02] transition duration-300">
          <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center mb-4 md:mb-0">
              <div class="bg-blue-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold">A</div>
              <div class="ml-4">
                <h3 class="text-lg font-bold text-white">Andi</h3>
                <p class="text-sm text-gray-400">21 April 2025</p>
              </div>
            </div>
            <div class="flex text-yellow-400 text-lg space-x-1">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="mt-4 text-gray-300">Tempatnya sangat nyaman dan lagu-lagunya lengkap. Pengalaman karaoke yang luar biasa!</p>
        </div>
        
        <!-- Review Card 2 -->
        <div class="bg-gray-700 p-6 rounded-xl shadow-md transform hover:scale-[1.02] transition duration-300">
          <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center mb-4 md:mb-0">
              <div class="bg-purple-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold">B</div>
              <div class="ml-4">
                <h3 class="text-lg font-bold text-white">Budi</h3>
                <p class="text-sm text-gray-400">15 Maret 2025</p>
              </div>
            </div>
            <div class="flex text-yellow-400 text-lg space-x-1">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="mt-4 text-gray-300">Pelayanan sangat ramah dan makanan enak. Hanya saja beberapa lagu terbaru belum tersedia.</p>
        </div>
      </div>
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
      
      <form id="reviewForm" class="space-y-6">
        <div>
          <label for="reviewerName" class="block text-gray-300 mb-2">Nama Anda</label>
          <input type="text" id="reviewerName" placeholder="Masukkan nama" 
                 class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-teal-500 border border-gray-600">
        </div>
        
        <div class="text-center">
          <label class="block text-gray-300 mb-3">Rating</label>
          <div class="flex justify-center space-x-2" id="ratingStars">
            <i class="far fa-star rating-star text-3xl text-yellow-400 cursor-pointer" data-rating="1"></i>
            <i class="far fa-star rating-star text-3xl text-yellow-400 cursor-pointer" data-rating="2"></i>
            <i class="far fa-star rating-star text-3xl text-yellow-400 cursor-pointer" data-rating="3"></i>
            <i class="far fa-star rating-star text-3xl text-yellow-400 cursor-pointer" data-rating="4"></i>
            <i class="far fa-star rating-star text-3xl text-yellow-400 cursor-pointer" data-rating="5"></i>
          </div>
          <input type="hidden" id="selectedRating" value="0">
        </div>
        
        <div>
          <label for="reviewText" class="block text-gray-300 mb-2">Ulasan Anda</label>
          <textarea id="reviewText" placeholder="Bagikan pengalaman Anda..." 
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
  // Pastikan dokumen sudah sepenuhnya dimuat
  document.addEventListener('DOMContentLoaded', function() {
    // Review Modal Functionality
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const cancelReview = document.getElementById('cancelReview');
    const reviewModal = document.getElementById('reviewModal');
    const ratingStars = document.querySelectorAll('.rating-star');
    const selectedRating = document.getElementById('selectedRating');
    const reviewForm = document.getElementById('reviewForm');
    const reviewsContainer = document.getElementById('reviews-container');

    // Open modal
    openModal.addEventListener('click', () => {
      reviewModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden'; // Prevent scrolling
    });

    // Close modal
    function closeReviewModal() {
      reviewModal.classList.add('hidden');
      document.body.style.overflow = ''; // Re-enable scrolling
      // Reset form
      reviewForm.reset();
      selectedRating.value = '0';
      // Reset stars
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

    // Form submission
    reviewForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const name = document.getElementById('reviewerName').value.trim();
      const rating = selectedRating.value;
      const text = document.getElementById('reviewText').value.trim();
      
      if (!name || !rating || rating === '0' || !text) {
        alert('Harap lengkapi semua field dan berikan rating!');
        return;
      }
      
      // Create new review element
      const newReview = document.createElement('div');
      newReview.className = 'bg-gray-700 p-6 rounded-xl shadow-md transform hover:scale-[1.02] transition duration-300';
      
      // Generate random color for avatar
      const colors = ['blue', 'purple', 'green', 'red', 'pink', 'indigo'];
      const randomColor = colors[Math.floor(Math.random() * colors.length)];
      
      // Format date
      const today = new Date();
      const options = { day: 'numeric', month: 'long', year: 'numeric' };
      const formattedDate = today.toLocaleDateString('id-ID', options);
      
      // Create stars HTML
      let starsHTML = '';
      const fullStars = parseInt(rating);
      const emptyStars = 5 - fullStars;
      
      for (let i = 0; i < fullStars; i++) {
        starsHTML += '<i class="fas fa-star"></i>';
      }
      for (let i = 0; i < emptyStars; i++) {
        starsHTML += '<i class="far fa-star"></i>';
      }
      
      newReview.innerHTML = `
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
          <div class="flex items-center mb-4 md:mb-0">
            <div class="bg-${randomColor}-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold">${name.charAt(0).toUpperCase()}</div>
            <div class="ml-4">
              <h3 class="text-lg font-bold text-white">${name}</h3>
              <p class="text-sm text-gray-400">${formattedDate}</p>
            </div>
          </div>
          <div class="flex text-yellow-400 text-lg space-x-1">
            ${starsHTML}
          </div>
        </div>
        <p class="mt-4 text-gray-300">${text}</p>
      `;
      
      // Add new review to the top
      reviewsContainer.insertBefore(newReview, reviewsContainer.firstChild);
      
      // Close modal
      closeReviewModal();
      
      // Show success message
      alert('Terima kasih atas ulasan Anda!');
    });
  });
</script>
@endsection