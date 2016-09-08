<?php

use Illuminate\Database\Seeder;
use App\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $experience = new Experience;
        $experience->employee_id = 1;
        $experience->title = "Lead Bartender";
        $experience->description = "In this role I completed several duties, including managing stock.";
        $experience->employment_length = "Jan 2014 - Jan 2015 (12 Months)";
        $experience->establishment_name = "Zullaz";
        $experience->save();

        $experience = new Experience;
        $experience->employee_id = 1;
        $experience->title = "Lead Dishwasher";
        $experience->description = "In this role I completed several duties, including cleaning dishes and checking stock.";
        $experience->employment_length = "Jan 2014 - Jan 2015 (12 Months)";
        $experience->establishment_name = "Alfresco on Elston";
        $experience->save();

    }
}
