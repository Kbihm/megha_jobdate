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
    }

    public function index()
    {
        $user = Auth::user();
        // $joboffers = Joboffer::where('employer_id', $user->employee_id)->get();
        $joboffers = Joboffer::all();
        return view('joboffers.index', compact('joboffers'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {

    }

    public function create()
    {
        return view('joboffers.create');
    }

    public function edit($id){
        $joboffer = Joboffer::find($id);
        return view('joboffers.edit', compact('joboffer'));
    }

}
