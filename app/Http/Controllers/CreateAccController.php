<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;
use App\Employer;
use App\Admin;
use Auth;
use App\User;
use Hash;

class CreateAccController extends Controller
{

    public function CreateEmployee(Request $request) {

        $this->validate($request, User::$rules);
        $this->validate($request, Employee::$rules);

        $user = new User($request->all());
        $employee = new Employee($request->all());

        // $user->password = Hash::make($request->password());
        $user->password = bcrypt($request['password']);

        $employee->save();
        $user->employee_id = $employee->id;
        $user->save();

        $employee->user_id = $user->id;
        $user->save();

        return redirect('home');

    }

    public function CreateEmployer(Request $request) {

        $user = new User($request->all());
        $employer = new Employer($request->all());

        
        // $this->validate($request, Employer::$rules);

        //Not sure if this is required or not.
        $user->password = Hash::make($user->password());

        $user->save();
        $employer->save();

        redirect('home');

    }

    public function EmployeeRegisterForm()
    {
        return view('auth.register-employee');
    }


}
