<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Joboffer;
use App\Invite;

use Auth;

class EmployeeJobOfferController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }

    public function index()
    {
        $user = Auth::user();
        $joboffers = [];

        // This could be done better.
        for ($i = 0; $i < sizeOf($user->employee->invites); $i++) {
            array_push($joboffers, $user->employee->invites[$i]->joboffer);
        }

        return view('employee-joboffer.index', compact('joboffers'));
    }

    public function acceptJobOffer($id)
    {
        $user = Auth::user();
        $joboffer = Joboffer::find($id);
        $joboffer->status = 'accepted';
        $joboffer->employee_id = $user->employee->id;
        $joboffer->save();
        //remove from invites table//
        //Also when do we remove the job offer //
        return redirect('/offers');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $invite = Invite::where('jobOffer_id', $id)
                    ->where('employee_id', $user->employee_id)
                    ->first();

        //$invites = $user->employee->invites;

        $invite->delete();
        return redirect('/offers');
    }
}
