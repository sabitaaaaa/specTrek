<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trek extends Model
{
public function run()
{
    Trek::create(['name' => 'Annapurna base camp ', 'price' => 1200, 'days' => 12, 'region' => 'Annapurna', 'type' => 'Multi Day']);
    Trek::create(['name' => 'Langtang ', 'price' => 800, 'days' => 10, 'region' => 'Langtang', 'type' => 'Multi Day']);
    Trek::create(['name' => 'Shivapuri', 'price' => 100, 'days' => 1, 'region' => 'Kathmandu', 'type' => 'Day Hike']);
}

}
