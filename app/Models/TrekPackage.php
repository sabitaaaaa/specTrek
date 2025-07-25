<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrekPackage extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'hidden_gems', 'best_time', 'itinerary', 'quote', 'main_image', 'map_image'
    ];
}
