<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function store(Request $request, $listing)
    {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        Booking::create([
            'listing_id' => $listing,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'user_id' => auth()->id(), // добавляем ID текущего пользователя
        ]);

        return redirect()->route('listing.show', ['id' => $listing])->with('success', 'Бронирование успешно создано');
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
