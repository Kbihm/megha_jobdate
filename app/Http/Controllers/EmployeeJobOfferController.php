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
        $requests = [];

        // This could be done better.
        for ($i = 0; $i < sizeOf($user->employee->invites); $i++) {
            if($user->employee->invites[$i]->request_type != "details"){
                if($user->employee->invites[$i]->joboffer != null)
            array_push($joboffers, $user->employee->invites[$i]->joboffer);   
            }
            elseif($user->employee->invites[$i]->request_type == 'details'){
            array_push($requests, $user->employee->invites[$i]);
                   

            }
            $joboffers = array_reverse($joboffers);
        }

        return view('employee-joboffer.index', compact('joboffers', 'requests'));
    }

    public function acceptJobOffer($id)
    {
        $user = Auth::user();
        $joboffer = Joboffer::find($id);
        $invites = Invite::where('joboffer_id', '=', $joboffer->id)->get();
        foreach($invites as $invite){
            if($invite->employee_id != $user->employee->id){
                $invite->delete();
            }
        }
        $joboffer->status = 'accepted';
        $joboffer->employee_id = $user->employee->id;
        $joboffer->save();
        //remove from invites table//

        return redirect('/email/acceptJob/'.$id);
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
