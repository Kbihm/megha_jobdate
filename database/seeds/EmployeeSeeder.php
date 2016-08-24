<?php

use Illuminate\Database\Seeder;
use App\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $employee = new Employee;
        $employee->first_name = 'Liama';
        $employee->email = 'liama@email.com';
        $employee->last_name = 'Southwella';
        $employee->password = bcrypt('password');
        $employee->phone = '0449918415';
        $employee->average_rating = '25';
        $employee->about ='Imma be ';
        $employee->skills = 'Qualification One; Qualification 2;';
        $employee->role = 'Bartender';

        $employee->save();

    }
}
