<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Availability;

class AvailabilityController extends Controller
{
    

    public function store(Request $request)
    {

        // Availabilities needs to be the data passed in.
        $availabilities = $request->input('avl');

        foreach ($availabilities as $availability) {

            // This will need to be updated to check if
            // it exists already and update if it does.

            $avl = new Availability;
            $avl->date = $availability->date; 
            $avl->morning = $availability->morning;
            $avl->day = $availability->day;
            $avl->night = $availability->night;
            $avl->employee_id = Auth::user()->employee_id;
            $avl->save();
        }

        return '{"status":"true"}';
    }

}
