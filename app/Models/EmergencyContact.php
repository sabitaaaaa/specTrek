<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model{
    protected $fillable = [
        'transaction_id',
        'amount',
        'status',
    ];
}

