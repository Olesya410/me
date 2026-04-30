<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'description_full', // добавлено
        'area',
        'guests',
        'bedrooms',
        'location_address',
        'location_nearby',
        'price_per_night',
        'owner_id', // добавлено
        'available_from', // добавлено
        'available_to', // добавлено
        'check_in_time', // добавлено
        'check_out_time', // добавлено
        'deposit', // добавлено
        'house_rules', // добавлено
    ];

    protected $casts = [
        'available_from' => 'date',
        'available_to' => 'date',
        'check_in_time' => 'datetime:H:i', // добавлено (для времени заезда)
        'check_out_time' => 'datetime:H:i', // добавлено (для времени выезда)
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function isBookedByUser($userId)
    {
        return $this->bookings()->where('user_id', $userId)->exists();
    }

    public function features()
    {
        return $this->belongsToMany(
            Feature::class,
            'listing_features',
            'listing_id',
            'feature_id'
        );
    }

    public function photos()
    {
        return $this->hasMany(Photo::class); 
    }

    public function host()
    {
        return $this->belongsTo(User::class, 'owner_id'); // или другой внешний ключ
    }
    
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public $timestamps = false;
}
