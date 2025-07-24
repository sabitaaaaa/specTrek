<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Allow mass assignment of these fields
    protected $fillable = ['name', 'email', 'review'];
}