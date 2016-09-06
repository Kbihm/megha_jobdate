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
        $joboffers = Joboffer::where('user_id', $user->id)->get();
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
        
    }

}
