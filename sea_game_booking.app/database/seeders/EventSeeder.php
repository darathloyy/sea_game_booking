<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $events=[
            ['date'=>'2023-05-05','number_ticket'=>20000,'sport_id'=>1,'location_id'=>1],
            ['date'=>'2023-06-05','number_ticket'=>2000,'sport_id'=>4,'location_id'=>2],
        ];
        Event::insert($events);
    }
}
