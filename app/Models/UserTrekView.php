<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrekView extends Model
{
    protected $table = 'user_trek_views';
    protected $fillable = ['user_id', 'trek_id', 'viewed_at'];
    // In UserTrekView.php
public function trek() {
    return $this->belongsTo(Trek::class);
}

public function user() {
    return $this->belongsTo(User::class);
}

}
