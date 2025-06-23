<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $fillable = [
    'user_id',
    'budget',
    'available_days',
    'difficulty_pref',
    'interest_tags',
    'season_pref',
    'expectation_notes',
];

}





