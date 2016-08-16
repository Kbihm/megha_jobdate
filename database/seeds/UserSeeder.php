<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User;
        $user->name = 'Nate';
        $user->first_name = 'Nate';
        $user->email = 'nsg223@gmail.com';
        $user->last_name = 'Sanchez-Goodwin';
        $user->password = bcrypt('password');
        $user->save();

        $user = new User;
        $user->name = 'Liam';
        $user->first_name = 'S';
        $user->email = 'liam@email.com';
        $user->last_name = 'Southwell';
        $user->password = bcrypt('password');
        $user->save();

    }
}
