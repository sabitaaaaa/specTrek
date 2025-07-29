<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
   protected $fillable = [
    'users_id',
    'available_days',
    'region',
    'difficulty',
    'experience_level',
    'price_min',
    'price_max',

];


public function user()
{
    return $this->belongsTo(User::class);
}

}
