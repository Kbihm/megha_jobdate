<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Employee;
use App\Employer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         *  Admin Account
         */
        $admin = new Admin;
        $admin->save();

        $user = new User;
        $user->first_name = 'Admin';
        $user->email = 'admin@jobdate.com.au';
        $user->last_name = 'Lastname';
        $user->password = bcrypt('password');
        $user->admin_id = $admin->id;
        $user->save();

        

        /**
         *  Employer Account
         */
        $employer = new Employer;
        $employer->abn = '012323123';
        $employer->address = '99 Hale Street Ashmore QLD Australia';
        $employer->phone = '0400000000';
        $employer->establishment_name = 'Alfresco Dining';
        $employer->subscription_end = '2018-02-12';
        $employer->email_confirmed = true;
        $employer->save();

        $user = new User;
        $user->first_name = 'Employer';
        $user->email = 'employer@jobdate.com.au';
        $user->last_name = 'Lastname';
        $user->password = bcrypt('password');
        $user->employer_id = $employer->id;
        $user->save();

        $employer->user_id = $user->id;
        $employer->save();

    }
}
