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
use App\Settings;
use DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
         //DB::connection()->enableQueryLog();
        // $this->middleware('employer');
    }

    public function index()   //changes in index files 6 sept 2017
    {
        $employees = Employee::where('email_confirmed', true)->orderBy("average_rating", "desc")->paginate(15);
        return view('user.index', compact('employees'));
    }

    public function show($id)
    {

        if (Auth::guest()) {
            return redirect('/register/employer');
        } elseif (Auth::user()->employee_id != null && Auth::user()->employee_id != $id) {
            return back()->withError('You cannot view other employee profiles.');
        }

        // Start Calendar Parts
        $today = getdate();
        $start = mktime(0,0,0,$today['mon'],$today['mday'],$today['year']);
        $first = getdate($start);
        //set end date to 2 weeks from when the calendar starts
        $end = mktime(0,0,0,$first['mon'],$today['mday']+13,$first['year']);
        $last = getdate($end);

        if($first['mon'] != $last['mon'])
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
                $jobs = Joboffer::where('status', '!=', 'accepted')->where('employer_id', $self_user->employer_id)->get();
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

        $this->validate($request, Settings::$search_rules);
        // dd($request);
        //want dd/mm/yyyy, have , mm/dd/yyyy
        //test[0] = month, [1] = date, [2] = year
        if ($request->date != null || $request->date != '') {
            $dates = explode('/', $request->date);
            $dates[1] = (int)$dates[1];
            $dates[0] = (int)$dates[0];
            $datetouse = $dates[2].'-'.$dates[1].'-'.$dates[0];
        }
        // return $request->all();

        if ($request->area == 'any') {

            $employees = Employee::where('state', $request->state)
            ->where('region', $request->region)
            ->orderBy('average_rating', 'desc')
            ->get();


        } else if ($request->suburb == 'any') {

            $employees = Employee::where('state', $request->state)
            ->where('region', $request->region)
            ->where('area', $request->area)
            ->orderBy('average_rating', 'desc')
            ->get();

            $any_suburb_employees = Employee::where('state', $request->state)
            ->where('region', $request->region)
            ->where('area', 'any')
            ->orderBy('average_rating', 'desc')
            ->get();

            $employees = $employees->merge($any_suburb_employees);

        } else {

            $employees = Employee::where('state', $request->state)
            ->where('region', $request->region)
            ->where('area', $request->area)
            ->where('suburb', $request->suburb)
            ->orderBy('average_rating', 'desc')
            ->get();

            $any_suburb_area_employees = Employee::where('state', $request->state)
            ->where('region', $request->region)
            ->where('area', 'any')
            ->where('suburb', 'any')
            ->orderBy('average_rating', 'desc')
            ->get();

            $employees = $employees->merge($any_suburb_area_employees);

            $any_suburb_employees = Employee::where('state', $request->state)
            ->where('region', $request->region)
            ->where('area', $request->area)
            ->where('suburb', 'any')
            ->orderBy('average_rating', 'desc')
            ->get();

            $employees = $employees->merge($any_suburb_employees);


        }

        $users = [];
        $unfavourable_users = [];

        foreach ($employees as $employee)
        {


            if ($request->role != 'any' && $request->role != $employee->role){
                if($employee->second_role !== null){
                    if($request->role !='any' && $request->role !=$employee->second_role){
                        continue;
                    }
                }
                elseif($employee->second_role == null){
                    continue;
                }

            }

            if ($request->fulltime != 'any' && $request->fulltime != $employee->fulltime)
                continue;

            if ($request->date != null || $request->date != '') {
                $emp_avl = Availability::where('employee_id', $employee->id)
                ->where('date', $datetouse)
                ->get();

                if (sizeOf($emp_avl) == 0)
                    continue;

                if ($request->time == 'any') {

                } elseif ($request->time == 'morning' && $emp_avl[0]->morning == false) {
                    array_push($unfavourable_users, $employee);
                    continue;
                }
                elseif ($request->time == 'day' && $emp_avl[0]->day == false) {
                    array_push($unfavourable_users, $employee);
                    continue;
                }
                elseif ($request->time == 'night' && $emp_avl[0]->night == false) {
                    array_push($unfavourable_users, $employee);
                    continue;
                }


            }

            array_push($users, $employee);
        }

        $users = array_merge($users, $unfavourable_users);
        $user_count = sizeOf($users);

        $paginated = new Paginator($users, $user_count, 15);
        $users = $paginated;

        return view('user.index', ['employees' => $users]);
    }

    public function search_staff(){
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];
        $radius = $_POST['radius'];

      $results =  DB::select("SELECT *,( 6371 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lon ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM employees  HAVING distance < $radius ORDER BY distance");

      /*echo '<pre>';
      print_r($results);*/
      if($results){
      foreach($results as $result){
             $user_id = $result->user_id;
             $result_user = User::find($user_id);
             $result_user->last_name;
          ?>
          <div class="card card-horizontal">
              <div class="row">
                  <div class="col-md-12" style="margin-left:20px">
                       <div class="content">
                          <a class="card-link" >
                              <h4 class="title"> <?php echo $result_user->first_name.'&nbsp;'.$result_user->last_name; ?></h4>
                          </a>
                          <a class="card-link" >
                              <h4 class="title"> <?php echo $result->address; ?></h4>
                              <label>Distance</label>
                              <?php echo $result->distance; ?>
                          </a>
                           <div class="footer">
                              <div class="stats">
                                  <a class="card-link">
                                     <i class="fa fa-usd"></i>
                                    <?php echo  $result->hourly_rate ?>
                                  </a>
                              </div>
                              <div class="stats">
                                <a class="card-link" >
                                  <i class="fa fa-briefcase"></i>
                                    <?php echo  $result->role ?>
                                </a>
                              </div>

                              <div class="stats">
                                 <?php echo  $result->gender ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <?php
      }
    }else{  ?>
      <div class="text-center">
          <h2 class="text-muted"> No Results Found </h2>
          <p> Try widening your search query. </p>
      </div>
    <?php
    }

    }

}
