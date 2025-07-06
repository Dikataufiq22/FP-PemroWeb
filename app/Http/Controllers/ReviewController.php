<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        $booking = Booking::where('id', $request->booking_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Cek apakah user sudah pernah review produk ini untuk booking ini
        $alreadyReviewed = Review::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('booking_id', $request->booking_id)
            ->exists();
        if ($alreadyReviewed) {
            return back()->with('error', 'Anda sudah memberikan review untuk produk ini.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return back()->with('success', 'Review berhasil dikirim!');
    }
}
