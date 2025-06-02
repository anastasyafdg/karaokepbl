<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Menampilkan form ulasan dan daftar ulasan yang sudah disetujui.
     */
    public function index()
    {
        $reviews = Review::where('status', 'approved')
                         ->latest()
                         ->get();

        return view('users.ulasan', compact('reviews'));
    }

    /**
     * Menyimpan ulasan baru dari pengguna.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'comment' => 'required|string|max:1000',
            'rating'  => 'required|integer|between:1,5',
        ]);

        Review::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'] ?? null,
            'comment' => $validated['comment'],
            'rating'  => $validated['rating'],
            'status'  => 'pending', // menunggu persetujuan admin
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Ulasan Anda akan ditinjau oleh admin.');
    }
}
