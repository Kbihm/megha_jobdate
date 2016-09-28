<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;
use App\Employer;
use App\Admin;

class CreateAccController extends Controller
{

    public function create_employee(Request $request) {

        $user = new User($request->all());
        $employee = new Employee($request->all());

        // $this->validate($request, Employee::$rules);

        //Not sure if this is required or not.
        $user->password = Hash::make($user->password());

        $user->save();
        $employee->save();

        redirect('home');

    }

    public function create_employer(Request $request) {

        $user = new User($request->all());
        $employer = new Employer($request->all());

        
        // $this->validate($request, Employer::$rules);

        //Not sure if this is required or not.
        $user->password = Hash::make($user->password());

        $user->save();
        $employer->save();

        redirect('home');

    }


}
