<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'hidden_gems',
        'day_to_day_itinerary',
        'detailed_itinerary',
        'transport_table',
        'hidden_traditions',
        'best_time',
        'note',
        'image1',
        'image2',
        'image3',
        'image4',
        'quote',
    ];

    public function trek()
{
    return $this->belongsTo(Trek::class);
}

}

