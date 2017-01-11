<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Invite;
use Auth;
use App\Http\Requests;
use App\Employee;
use App\Employer;
use App\Joboffer;

class InvitesController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth');

    }
    
    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        if(Auth::User()->employer_id == $request->employer_id){
        if($request->request_type == "job"){
        $joboffer = Joboffer::where('id', '=', $request->joboffer_id)->first();
        if(Auth::user()->employer->id == $joboffer->employer_id)
        $this->validate($request, Invite::$rules);
        $invite = new Invite($request->all());
        $invite->save();
        }
        elseif($request->request_type == "details"){
        $invite = new Invite($request->all());
        $invite->save();
        }
        return redirect('email/sendJobRequest/'.$invite->id);
        }
        else return redirect('home');
    }

        public function accept($id)
    {
        $invite = Invite::find($id);
        if(Auth::User()->employee_id == $invite->employee_id){
            $user = Employer::find($invite->employer_id);
            $user = $user->user;
            $employee = Auth::User();
            //send email
            $data = array(
            'user' => $user,
            'employee' => $employee,
            );

        Mail::send('emails.sendDetailsEmployer', $data, function ($message) use ($user) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Employees Details');

        });



            //remove invite
            $invite->delete();
            return redirect('offers')->with('success', 'Details Sent');
        }
        else return('home');
    }

        public function decline($id)
    {
        $invite = Invite::find($id);
        if(Auth::User()->employee_id == $invite->employee_id){

             $user = Employer::find($invite->employer_id);
            $user = $user->user;
            $employee = Auth::User();
            //send email
            $data = array(
            'user' => $user,
            'employee' => $employee,
            );

        Mail::send('emails.declineDetailsEmployer', $data, function ($message) use ($user) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Employees Details');

        });

            $invite->delete();
            return redirect('offers')->with('error', 'Request for Details Declined');
        }
    }



}
