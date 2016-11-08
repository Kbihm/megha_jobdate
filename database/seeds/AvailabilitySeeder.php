<?php

use Illuminate\Database\Seeder;
use App\Availability;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $avl = new Availability;
        $avl->date = '2016-11-11';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = 1;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-12';
        $avl->morning = true;
        $avl->day = false;
        $avl->night = false;
        $avl->employee_id = 1;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-13';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = 1;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-14';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = 1;
        $avl->save();

    }
}
