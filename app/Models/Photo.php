<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url', 'user_id', 'listing_id'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    public $timestamps = false;
}
