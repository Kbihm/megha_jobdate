<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $skill = new Skill;
        $skill->skill = "Cocktail Making";
        $skill->employee_id = 2;
        $skill->save();

        $skill = new Skill;
        $skill->skill = "Customer Service";
        $skill->employee_id = 2;
        $skill->save();

        $skill = new Skill;
        $skill->skill = "Certificate IV in Food Safety";
        $skill->employee_id = 2;
        $skill->save();

    }
}
