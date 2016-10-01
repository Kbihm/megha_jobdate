<?php

use Illuminate\Database\Seeder;
use App\Joboffer;

class JobofferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $joboffer = new Joboffer;
        $joboffer->date = "2016-07-04";
        $joboffer->role = "Bartender";
        $joboffer->description = "This exciting bartender role is meant for cocktail experts!";
        $joboffer->time = "Afternoon";
        $joboffer->hours = "5";
        $joboffer->employer_id = 4;
        $joboffer->save();
    }
}
