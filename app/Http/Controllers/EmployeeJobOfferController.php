<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Joboffer;
use Auth;

class EmployeeJobOfferController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $joboffers = Joboffer::all();
        return view('employee-joboffer.index', compact('joboffers'));
    }

}
