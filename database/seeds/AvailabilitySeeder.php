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

        for ($var = 0; $var < 5; $var++) {
        
        $avl = new Availability;
        $avl->date = '2016-11-15';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-16';
        $avl->morning = true;
        $avl->day = false;
        $avl->night = true;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-17';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-18';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = true;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-19';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = true;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-20';
        $avl->morning = false;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-21';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-22';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-23';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-24';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-25';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-26';
        $avl->morning = true;
        $avl->day = true;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        $avl = new Availability;
        $avl->date = '2016-11-27';
        $avl->morning = true;
        $avl->day = false;
        $avl->night = false;
        $avl->employee_id = $var;
        $avl->save();

        }

    }
}
