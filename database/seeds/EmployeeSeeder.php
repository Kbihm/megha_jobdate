<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

/**
         *  Employee Account
         */
        $employee = new Employee;
        $employee->phone = '0400000000';
        $employee->average_rating = '2.2';
        $employee->about = 'This is an awesome about feature for details!';
        $employee->gender = '0';
        $employee->fulltime = true;
        $employee->role = "Bartender";
        $employee->hourly_rate = 28.40;
        $employee->save();

        $user = new User;
        $user->first_name = 'Employee';
        $user->email = 'employee@jobdate.com.au';
        $user->last_name = 'Lastname';
        $user->password = bcrypt('password');
        $user->employee_id = $employee->id;
        $user->save();

        $employee->user_id = $user->id;
        $employee->save();

        $employee = new Employee;
        $employee->phone = '0400020000';
        $employee->average_rating = '2.2';
        $employee->about = 'This is an awesome about feature for details!';
        $employee->gender = '1';
        $employee->fulltime = true;
        $employee->role = "Bartender";
        $employee->hourly_rate = 28.40;
        $employee->save();

        $user = new User;
        $user->first_name = 'Employette';
        $user->email = 'employette@jobdate.com.au';
        $user->last_name = 'Lastaaaname';
        $user->password = bcrypt('password');
        $user->employee_id = $employee->id;
        $user->save();

        $employee->user_id = $user->id;
        $employee->save();

        $employee = new Employee;
        $employee->phone = '0400000000';
        $employee->average_rating = '2.4';
        $employee->about = "I'm John Smith, a hardworking individual who gets the job done!";
        $employee->gender = '0';
        $employee->fulltime = true;
        $employee->role = "Waiter/Waitress";
        $employee->hourly_rate = 25;
        $employee->save();

        $user = new User;
        $user->first_name = 'John';
        $user->email = 'johnsmith@jobdate.com.au';
        $user->last_name = 'Smith';
        $user->password = bcrypt('password');
        $user->employee_id = $employee->id;
        $user->save();

        $employee->user_id = $user->id;
        $employee->save();

        $employee = new Employee;
        $employee->phone = '0400000000';
        $employee->average_rating = '2.4';
        $employee->about = "I'm John Smith, a hardworking individual who gets the job done!";
        $employee->gender = 1;
        $employee->fulltime = true;
        $employee->role = "Waiter/Waitress";
        $employee->hourly_rate = 25;
        $employee->save();

        $user = new User;
        $user->first_name = 'Jill';
        $user->email = 'jillsmith@jobdate.com.au';
        $user->last_name = 'Smith';
        $user->password = bcrypt('password');
        $user->employee_id = $employee->id;
        $user->save();

        $employee->user_id = $user->id;
        $employee->save();

    }
}
