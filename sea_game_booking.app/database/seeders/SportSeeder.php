<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sports=[
            ['name' => 'football', 'gender' => 'female'],
            ['name' => 'football', 'gender' => 'male'],
            ['name' => 'Swimming', 'gender' => 'male'],
            ['name' => 'Ju-jitsu', 'gender' => 'female'],
            ['name' => 'Volleyball', 'gender' => 'male'],
            
        ];
        Sport::insert($sports);
    }
}
