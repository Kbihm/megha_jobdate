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
        $joboffers = Joboffer::where('employer_id', $user->employer->id)->get();
        return view('joboffers.index', compact('joboffers'));
    }

    public function show($id)
    { 
        
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Joboffer::$rules);

        $joboffer = new Joboffer($request->all());
        //want dd/mm/yyyy, have , mm/dd/yyyy
        //test[0] = month, [1] = date, [2] = year
        $dates = explode('/', $joboffer->date);
        $realdate = $dates[2].'-'.$dates[0].'-'.$dates[1];
        $joboffer->date = $realdate;
        $joboffer->employer_id = $user->employer->id;
        $joboffer->save();
        return redirect('/jobs');
    }

    public function destroy($id)
    {
        $joboffer = Joboffer::find($id);
        $joboffer->delete();
        return redirect('/');
    }

    public function create()
    {
        $roles = Settings::$roles;
        return view('joboffers.create', compact('roles'));
    }

    public function edit($id){
        $joboffer = Joboffer::find($id);
        return view('joboffers.edit', compact('joboffer'));
    }

    public function update(Request $request, $id)
    { 
        $joboffer = Joboffer::find($id);

        $this->validate($request, Joboffer::$rules);
        $joboffer->update($request->all());
        $joboffer->save();
        return redirect('/jobs');
    }

}
