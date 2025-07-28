<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
   protected $fillable = [
    'user_id',
    'budget',
    'available_days',
    'region',
    'difficulty',
    'experience_level', 
];


public function user()
{
    return $this->belongsTo(User::class);
}

}






