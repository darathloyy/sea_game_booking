<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $locations=[
            ['name' => 'Olympices','number_seat'=>20000,'address'=>'Olympic Stadium is a multi-purpose stadium in Phnom Penh'],
            ['name' => 'Morodock Techo','number_seat'=>60000,'address'=>'Phnom Penh']
        ];
        Location::insert($locations);
    }
}
