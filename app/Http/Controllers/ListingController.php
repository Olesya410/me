<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\HostReview;
use App\Models\Photo;
use App\Models\Booking;
use App\Models\User;
use App\Models\Review;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::query();

        if ($request->has('priceMin') && $request->priceMin != '') {
            $query->where('price_per_night', '>=', $request->priceMin);
        }

        if ($request->has('city') && $request->city != '') {
            $query->where('location_address', 'like', '%' . $request->city . '%');
        }

        // Фильтрация по количеству комнат
        if ($request->has('rooms') && $request->rooms != '') {
            $query->where('bedrooms', $request->rooms);
        }

        // Фильтрация по датам доступности
        if ($request->has('check_in') && $request->check_in != '' &&
            $request->has('check_out') && $request->check_out != '') {

            $request->validate([
                'check_in' => 'required|date|before:check_out',
                'check_out' => 'required|date|after:check_in',
            ]);

            $checkIn = $request->check_in;
            $checkOut = $request->check_out;

            $query->where(function ($q) use ($checkIn, $checkOut) {
                $q->whereNull('available_from')
                  ->orWhere(function ($sub) use ($checkIn, $checkOut) {
                      $sub->where('available_from', '<=', $checkOut)
                          ->where('available_to', '>=', $checkIn);
                  });
            });
        }

        $listings = $query->paginate(30);

        $filterData = [
            'priceMin' => $request->input('priceMin'),
            'city' => $request->input('city'),
            'rooms' => $request->input('rooms'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
        ];

        return view('listings', compact('listings', 'filterData'));
    }

    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        $listing = Listing::with('features')->findOrFail($id);

        $userBooking = null;

        if (auth()->check()) {
            $userId = auth()->id(); 
            $userBooking = $listing->bookings->firstWhere('user_id', $userId);
        }

        $user = auth()->user(); 
        $hostReviews = HostReview::with('user')->where('owner_id', $user->id)->get();
        $reviews = Review::where('listing_id', $listing->id)->with('user')->get();
        return view('listings.show', compact('listing', 'userBooking', 'reviews', 'user', 'hostReviews'));
    }

    public function storeReview(Request $request, Listing $listing)
    {
        $request->validate([
            'review' => 'required|string|max:2000',
        ]);

        Review::create([
            'listing_id' => $listing->id,
            'user_id' => auth()->id(),
            'review' => $request->input('review'),
        ]);

        return back()->with('success', 'Отзыв успешно добавлен!');
    }

    public function store(Request $request)
{
    
    // Валидация данных
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'area' => 'nullable|numeric',
        'guests' => 'nullable|integer',
        'bedrooms' => 'nullable|integer',
        'location_address' => 'required|string|max:500',
        'location_nearby' => 'nullable|string',
        'price_per_night' => 'required|numeric|min:0',
        'photos_id' => 'nullable|array',
        'photos_id.*' => 'integer|exists:photos,id',
        'available_from' => 'nullable|date|before_or_equal:available_to',
        'available_to' => 'nullable|date|after_or_equal:available_from',
    ], [
        'title.required' => 'Заголовок обязателен',
        'location_address.required' => 'Адрес обязателен',
        'price_per_night.required' => 'Цена обязательна',
    ]);

    // Создаем объявление
    $listing = Listing::create([
    'title' => $validated['title'],
    'description' => $validated['description'] ?? null,
    'description_full' => $request->input('description_full') ?? null, // добавьте, если есть
    'area' => $validated['area'] ?? null,
    'guests' => $validated['guests'] ?? null,
    'bedrooms' => $validated['bedrooms'] ?? null,
    'location_address' => $validated['location_address'],
    'location_nearby' => $validated['location_nearby'] ?? null,
    'location_details' => $request->input('location_details') ?? null, // добавьте, если есть
    'price_per_night' => $validated['price_per_night'],
    'check_in_time' => $request->input('check_in_time') ?? null, // добавьте, если есть
    'check_out_time' => $request->input('check_out_time') ?? null, // добавьте, если есть
    'deposit' => $request->input('deposit') ?? null, // добавьте, если есть
    'house_rules' => $request->input('house_rules') ?? null, // добавьте, если есть
    'owner_id' => auth()->id(),
    'available_from' => $validated['available_from'] ?? null,
    'available_to' => $validated['available_to'] ?? null,
    ]);

    // Связываем фотографии, если есть
    if (!empty($validated['photos_id'])) {
        foreach ($validated['photos_id'] as $photoId) {
            $photo = \App\Models\Photo::find($photoId);
            if ($photo) {
                $photo->listing_id = $listing->id;
                $photo->save();
            }
        }
    }

    return redirect()->route('listings.index')->with('success', 'Объявление создано!');
}

    public function create()
    {
        return view('listings.create');
    }
    public function createphoto()
    {
        return view('listings.photocreate');
    }

    public function update(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_full' => 'nullable|string',
            'area' => 'nullable|numeric',
            'guests' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'location_address' => 'required|string|max:500',
            'location_nearby' => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'check_in_time' => 'nullable|date_format:H:i',
            'check_out_time' => 'nullable|date_format:H:i',
            'deposit' => 'nullable|numeric',
            'house_rules' => 'nullable|string',
            'owner_id' => 'required|integer',
            'photos_id' => 'nullable|array',
            'available_from' => 'nullable|date|before_or_equal:available_to',
            'available_to' => 'nullable|date|after_or_equal:available_from',
        ],[
            'title.required' => 'Заголовок обязателен',
            'location_address.required' => 'Адрес обязателен',
            'price_per_night.required' => 'Цена обязательна',
        ]);

        if (isset($validated['photos_id'])) {
            $listing->photos_id = $validated['photos_id'];
        }

        $listing->update($validated);
        return redirect()->route('listings.index')->with('success', 'Объявление обновлено!');
    }

    public function storeHost(Request $request, Listing $listing)
    {
        $request->validate([
            'review' => 'required|string|max:1000',
        ]);

        $ownerId = $listing->owner_id; 

        HostReview::create([
            'user_id' => Auth::id(), 
            'owner_id' => $ownerId,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Отзыв успешно отправлен');
    }

    public function showroom()
    {
        $user = Auth::user();
        $listings = $user->listings ?? collect();
        $countListings = $listings->count();
        return view('profile.show', compact('user', 'listings', 'countListings'));
    }
    
}