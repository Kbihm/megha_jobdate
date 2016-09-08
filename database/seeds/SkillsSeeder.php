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
        $skill->name = "Cocktail Making";
        $skill->employee_id = 1;
        $skill->save();

        $skill = new Skill;
        $skill->name = "Customer Service";
        $skill->employee_id = 1;
        $skill->save();

        $skill = new Skill;
        $skill->name = "Certificate IV in Food Safety";
        $skill->employee_id = 1;
        $skill->save();

    }
}
