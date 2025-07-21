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
<<<<<<< HEAD

=======
public function user()
{
    return $this->belongsTo(User::class);
}
>>>>>>> feature/trekking-mapp
}





<<<<<<< HEAD
=======

>>>>>>> feature/trekking-mapp
