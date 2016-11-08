<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Availability extends Controller
{
    

    public function store(Request $request)
    {

        return '{"status":"true"}';
        $availability = new Availability;

        $availability->date = $request->date; 
        $availability->morning = $request->morning;
        $availability->day = $request->day;
        $availability->night = $request->night;
        $availability->employee_id = Auth::user()->employee_id;

        $availability->save();

        return true;
    }

}
