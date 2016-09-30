<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Joboffer;
use Auth;

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
        $joboffers = Joboffer::where('employer_id', $user->employer_id)->get();
        // $joboffers = Joboffer::all();
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
        $joboffer->employer_id = $user->employer_id;
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

        return view('joboffers.create');
    }

    public function edit($id){
        $joboffer = Joboffer::find($id);
        return view('joboffers.edit', compact('joboffer'));
    }

    public function update(Request $request, Joboffer $joboffer)
    { 
        $this->validate($request, Joboffer::$rules);
        $joboffer->update($request->all());
        return redirect('/jobs');
    }

}
