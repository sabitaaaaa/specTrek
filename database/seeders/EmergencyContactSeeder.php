<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmergencyContact;

class EmergencyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            ['name' => 'Police', 'number' => '100'],
            ['name' => 'Fire Brigade', 'number' => '101'],
            ['name' => 'Ambulance', 'number' => '102'],
            ['name' => 'Traffic control', 'number' => '103'],
            ['name' => 'Tourist Police', 'number' => '1144'],
            ['name' => 'Tourist Police', 'number' => '1144'],
            ['name' => 'Women Helpline', 'number' => '1145'],
        ];

        foreach ($contacts as $contact) {
            EmergencyContact::create($contact);
        }
    }
}
