<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use App\Joboffer;
use App\Http\Requests;
use App\User;
use Auth;
use App\Employee;
use App\Availability;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('employer');
    }

    public function index() 
    {
        $users = User::where('employee_id', '!=', 'null')->orderBy('average_rating')->paginate(15);
        return view('user.index', compact('users'));
    }

    public function show($id) 
    {

        // Start Calendar Parts
        $today = getdate();
        $start = mktime(0,0,0,$today['mon'],$today['mday'],$today['year']);
        $first = getdate($start);
        //set end date to 2 weeks from when the calendar starts
        $end = mktime(0,0,0,$first['mon'],$today['mday']+13,$first['year']);
        $last = getdate($end);

        if($first['mon']+1 == $last['mon'])
            $daytarget = $this->days_in_month($first['mon'], $first['year']);
        else
            $daytarget = $last['mday'];

        // End Calendar Parts

        $user = Employee::where('id', $id)->first();

        // $employee = Employee::find($id);
        // $user = $employee->user;

        if(Auth::check()){
            $self_user = Auth::user();
            if ($self_user->employer_id != null) {
                $jobs = Joboffer::where('employer_id', $self_user->employer_id)->get();
                return view('user.show', compact('user', 'jobs', 'first', 'last', 'daytarget'));
            }
        }
            
        $jobs = [];
        return view('user.show', compact('user', 'first', 'last', 'daytarget', 'jobs'));
    }

    function days_in_month($month, $year) 
    { 
    // calculate number of days in a month 
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
    } 

    public function search(Request $request)
    {
        // dd($request);
        //want dd/mm/yyyy, have , mm/dd/yyyy
        //test[0] = month, [1] = date, [2] = year
        $dates = explode('/', $request->date);
        $datetouse = $dates[2].'-'.$dates[0].'-'.$dates[1];

        // return $request->all();
        

        $employees = Employee::where('state', $request->state)
                              ->where('region', $request->region)
                              ->where('area', $request->area)
                              ->where('suburb', $request->suburb)
                              ->orderBy('average_rating', 'desc')
                              ->get();

        $users = [];
        $unfavourable_users = [];

        foreach ($employees as $employee)
        {
            if ($request->role != 'any' && $request->role != $employee->role)
                continue;

            if ($request->fulltime != 'any' && $request->fulltime != $employee->fulltime)
                continue;
            
            if ($request->any_date != true) {
            $emp_avl = Availability::where('employee_id', $employee->id)
                                    ->where('date', $datetouse)
                                    ->get();

            if (sizeOf($emp_avl) == 0)
                continue;

            if ($request->time == 'any') {}
            elseif ($request->time == 'morning' && $emp_avl[0]->morning == false) {
                array_push($unfavourable_users, $employee->user);
                continue;
            }
            elseif ($request->time == 'day' && $emp_avl[0]->day == false) {
                array_push($unfavourable_users, $employee->user);
                continue;
            }
            elseif ($request->time == 'night' && $emp_avl[0]->night == false) {
                array_push($unfavourable_users, $employee->user);
                continue;
            }

            }

            array_push($users, $employee->user);
        }

        $users = array_merge($users, $unfavourable_users);
        $user_count = sizeOf($users);

        $paginated = new Paginator($users, $user_count, 15);
        $users = $paginated;

        return view('user.index', compact('users'));
    }

}


