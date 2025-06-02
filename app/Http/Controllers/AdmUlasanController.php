<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdmUlasanController extends Controller
{
    // Menampilkan semua ulasan di admin
    // File: app/Http/Controllers/AdmUlasanController.php

public function index()
{
    $reviews = Review::latest()->get();
    return view('admin.data_ulasan', compact('reviews'));
}

public function approve($id)
{
    $review = Review::findOrFail($id);
    $review->update(['status' => 'approved']);
    return back()->with('success', 'Ulasan telah disetujui.');
}

public function reject($id)
{
    $review = Review::findOrFail($id);
    $review->update(['status' => 'rejected']);
    return back()->with('success', 'Ulasan telah ditolak.');
}
}