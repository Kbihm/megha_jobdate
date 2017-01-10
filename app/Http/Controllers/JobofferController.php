<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Joboffer;
use Auth;
use App\Settings;


class JobofferController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('employer');
    }

    public function index()
    {
        $user = Auth::user();
        $joboffers = Joboffer::where('employer_id', $user->employer->id)->where('status', '!=', 'accepted')->orWhereNull('status')->get();
        return view('joboffers.index', compact('joboffers'));
    }

    public function archived_index()
    {
        $user = Auth::user();
        $joboffers = Joboffer::where('employer_id', $user->employer->id)->where('status', 'accepted')->get();
        return view('joboffers.index', compact('joboffers'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Joboffer::$rules);

        $joboffer = new Joboffer($request->all());
        //want dd/mm/yyyy, have , mm/dd/yyyy
        //test[0] = month, [1] = date, [2] = year
        $dates = explode('/', $joboffer->date);
        $realdate = $dates[2].'-'.$dates[1].'-'.$dates[0];
        $joboffer->date = $realdate;
        $joboffer->employer_id = $user->employer->id;
        $joboffer->save();
        return redirect('/jobs');
    }

    public function destroy($id)
    {   
        $joboffer = Joboffer::find($id);
        if(Auth::user()->employer->id == $joboffer->employer_id){
        $joboffer->delete();
        return back()->with("success", "Job Offer Deleted");
        }
        else
        return ('home');
    }

    public function create()
    {    
        $roles = Settings::$roles;
        return view('joboffers.create', compact('roles'));
    }

    public function edit($id){
        $joboffer = Joboffer::find($id);
        if(Auth::user()->employer->id == $joboffer->employer_id){
        //want mm/dd/yyyy, have , dd/mm/yyyy
        $dates = explode('-', $joboffer->date);
        $date = $dates[2].'/'.$dates[1].'/'.$dates[0];
        return view('joboffers.edit', compact('joboffer', 'date'));
        }
        else
        return ('home');
    }

    public function update(Request $request, $id)
    { 
        $joboffer = Joboffer::find($id);
        if(Auth::user()->employer->id == $joboffer->employer_id){
        $dates = explode('/', $request->date);
        $realdate = $dates[2].'-'.$dates[1].'-'.$dates[0];  
        $this->validate($request, Joboffer::$rules);
        //want dd/mm/yyyy, have , mm/dd/yyyy
        //test[0] = month, [1] = date, [2] = year
        $joboffer->update($request->all());
        $joboffer->date = $realdate;
        $joboffer->save();
        return redirect('/jobs');
        }
        else return('home');
    }

}
