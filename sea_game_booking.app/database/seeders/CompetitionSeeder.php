<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $competitions=[
            ['match'=>'Vietnam VS Myanmar','time'=>'19:00:00','event_id'=>1,'description'=>'U-22'],
            ['match'=>'Cambodia VS Thailand','time'=>'03:00:00','event_id'=>1,'description'=>'U-22'],
            ['match'=>'Cambodia VS Philippines','time'=>'06:00:00','event_id'=>2,'description'=>'Weight 50Kg']
        ];
        Competition::insert($competitions);
    }
}
