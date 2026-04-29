<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request, $listingId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для бронирования необходимо авторизоваться');
        }

        $listing = Listing::findOrFail($listingId);

        // Проверяем, не забронировано ли уже
        if ($listing->isBookedByUser(Auth::id())) {
            return back()->with('error', 'Вы уже забронировали это жильё');
        }

        $validated = $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'listing_id' => $listingId,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
        ]);

        return back()->with('success', 'Жильё успешно забронировано!');
    }

    public function destroy($bookingId)
    {
        $booking = Booking::where('user_id', Auth::id())
            ->findOrFail($bookingId);
        $booking->delete();

        return back()->with('success', 'Бронирование отменено');
    }

    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with('listing')
            ->get();

        return view('listings.index', compact('bookings'));
    }

}
