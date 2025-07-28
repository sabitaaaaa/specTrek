<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrekView extends Model
{
    protected $fillable = ['user_id', 'itinerary_id', 'viewed_at'];

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
