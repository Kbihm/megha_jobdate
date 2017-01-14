<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Experience;
use Auth;

class ExperienceController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $id = Auth::user()->id;
        $experiences = Experience::where('employee_id', $id)->get();
        return view('employee.experience.index', compact('experiences'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $user = Auth::user()->id;
        return view('employee.experience.create', compact('user'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, Experience::$rules);
        
        $employment_start = explode('/', $request->employment_start);
        $employment_start = $employment_start[2].'-'.$employment_start[1].'-'.$employment_start[0];
        
        if($request->currently_employed == null && $request->employment_end == ""){
            return redirect()->back()->withError('Either select a date or check the checkbox to continue.');
        }
        else if($request->currently_employed == "on"){
            
            $employment_length = date('M Y', strtotime($employment_start)) . ' to current';
            $experience = new Experience($request->all());
            $experience->employee_id = Auth::user()->employee_id;
            $experience->employment_length = $employment_length;
            $experience->save();
        }
        else if($request->currently_employed == null){
            $employment_end = explode('/', $request->employment_end);
            $employment_end = $employment_end[2].'-'.$employment_end[1].'-'.$employment_end[0];
            $employment_length = date('M Y', strtotime($employment_start)) . ' to ' . date('M Y', strtotime($employment_end)) . ' (' . $this->dateDifference($employment_start, $employment_end) . ')';
            
            $experience = new Experience($request->all());
            $experience->employee_id = Auth::user()->employee_id;
            $experience->employment_length = $employment_length;
            $experience->save();
        }
        
        return redirect()->back();
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        if(Auth::user()->employee->id == $skill->employee_id){
        $skill = Experience::find($id);
        $skill->delete();
        return redirect(('/profile/experience'));
        }
        else
        return view('home');
    }
    
    function dateDifference($date_1 , $date_2 , $differenceFormat = '%y Years %m Months' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        
        $interval = date_diff($datetime1, $datetime2);
        
        return $interval->format($differenceFormat);
        
    }
}