<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Availability;
use Auth;

class AvailabilityController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('employee');
    }

    public function store(Request $request)
    {

        // Availabilities needs to be the data passed in.
        $availabilities = $request->json('avl');

        foreach ($availabilities as $availability) {

            $try_find = Availability::where('employee_id', Auth::user()->employee_id)->where('date', $availability['date'])->first();
            // $try_find = Availability::where('employee_id', 1)->where('date', $availability['date'])->first();

            if ($try_find != null)
                $avl = $try_find;
            else
                $avl = new Availability;


            $avl->date = $availability['date']; 
            $avl->morning = $availability['morning'];
            $avl->day = $availability['day'];
            $avl->night = $availability['night'];
            $avl->employee_id = Auth::user()->employee_id;
            // $avl->employee_id = 1;
            $avl->save();
        }

        $request->session()->flash('success', 'Successfully updated.');
        return '{"status":"true"}';
    }

        public function set()
    {
        // Not sure if this function is still used for anything. 
        // Availabilities needs to be the data passed in.
        $availabilities = $request->json('avl');

        foreach ($availabilities as $availability) {

                $avl = new Availability;


            $avl->date = $availability['date']; 
            $avl->morning = $availability['morning'];
            $avl->day = $availability['day'];
            $avl->night = $availability['night'];
            $avl->employee_id = Auth::user()->employee_id;
            // $avl->employee_id = 1;
            $avl->save();
        }

        return redirect()->back;
    }

}
