<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CreateAccController extends Controller
{
    

        public function create_employee(Request $request) {

        $user = new User($request->all());
        $employee = new Employee($request->all());

        //Not sure if this is required or not.
        $user->password = Hash::make($user->password());

        $user->save();
        $employee->save();

        redirect('home');

    }

    public function create_employer(Request $request) {

        $user = new User($request->all());
        $employer = new Employer($request->all());

        //Not sure if this is required or not.
        $user->password = Hash::make($user->password());

        $user->save();
        $employer->save();

        redirect('home');

    }

    
}
