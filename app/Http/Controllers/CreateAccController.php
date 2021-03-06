<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\VerificationController;
use App\Http\Requests;
use App\Employee;
use App\Employer;
use App\Admin;
use Auth;
use App\User;
use Hash;
use App\Settings;

class CreateAccController extends Controller
{

    public function CreateEmployee(Request $request) {

        $this->validate($request, User::$rules);
        $this->validate($request, Employee::$rules);
        
        $user = new User($request->all());
        $employee = new Employee($request->all());
        $employee->average_rating = 0;
        $user->password = bcrypt($request['password']);

        $employee->save();
        $user->employee_id = $employee->id;
        $user->save();

        if ($request->area == 'any' || $request->area == 'Any')
            $employee->suburb = 'any';

        $employee->user_id = $user->id;
        $employee->save();



        if (Auth::attempt(['email' => $user->email, 'password' => $request['password']])) {
            return redirect('verify/set/'.$user->id);
        } else {
            return redirect('/register/employee');
        }

    }

    public function CreateEmployer(Request $request) {

        $this->validate($request, User::$rules);
        $this->validate($request, Employer::$rules);

        $user = new User($request->all());
        $employer = new Employer($request->all());

        $user->password = bcrypt($request['password']);

        $employer->save();
        $user->employer_id = $employer->id;
        $user->save();
        $employer->user_id = $user->id;
        $employer->save();

        if (Auth::attempt(['email' => $user->email, 'password' => $request['password']])) {
            return redirect('/email/signUp/'.$user->id);
        } else {
            return redirect('/register/employer');
        }

    }

    public function EmployeeRegisterForm()
    {
        $roles = Settings::$roles;
        return view('auth.register-employee', compact('roles'));
    }

    public function EmployerRegisterForm()
    {
        return view('auth.register-employer');
    }


}
