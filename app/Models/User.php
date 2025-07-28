<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_premium',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
<<<<<<< HEAD
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
public function viewedItineraries()
{
    return $this->belongsToMany(Itinerary::class, 'user_trek_views', 'user_id', 'itinerary_id')
                ->withTimestamps()
                ->withPivot('viewed_at');
}


=======
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'has_paid_shivapuri' => 'boolean', // Cast to boolean
    ];
>>>>>>> origin/merged-anushree
}
