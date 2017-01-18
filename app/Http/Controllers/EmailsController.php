<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Employer;
use App\User;
use Auth;
use App\Joboffer;
use App\Invite;
use App\Employee;
use App\Comment;

class EmailsController extends Controller
{
        
        //Any time a dispute is filed through the dispute system
    public function dispute(Request $request, $id, $cid) 
    {
        $input = $request->all();
        $data = array(
            'user' => Auth::user(),
            'comment' => Comment::find($cid),
            'dispute' => $input['dispute'],
            );

        Mail::send('emails.sendDispute', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('admin@jobdate.com.au')->subject('JobDate - Dispute');

        });
        $dispute_submitted = TRUE;
        $user = Auth::user();
        $comments = Comment::where('employee_id', $user->employee_id)->get();
        return view('employee-comments.index', compact('comments', 'dispute_submitted'));
    }
        //When a new user signs signs Up
    public function signUp($id) 
    {
        $user = Auth::user();
        $data = array(
            'user' => User::find($id),
            );
        if($user->employee_id != null){
        Mail::send('emails.signUp', $data, function ($message) use ($user) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Sign Up');

        });
        }
        if($user->employer_id != null){
        Mail::send('emails.welcome', $data, function ($message) use ($user) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Sign Up');

        });
        }
        return redirect('home');
    }
        // When a user hasn't logged in for 7 days after a job request
    public function noLogin() 
    {

    }
        // When an employer requests the details of an employee
    public function requestDetails() 
    {

    }
        // Acceptance of a job
        public function acceptJob($id) 
    {
        $joboffer = Joboffer::find($id);
        $employer = Employer::where('id', '=', $joboffer->employer_id)->first();
        $data = array(
            'user' => Auth::user(),
            'joboffer' => $joboffer,
            'employer' => $employer,
            );

        Mail::send('emails.acceptJob', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to(Auth::user()->email)->subject('JobDate - Accepted A Job');

        });

        $this->confirmJob($joboffer->id);
        return redirect('/offers');


    }
        // Declination of a job
        public function declineJob() 
    {

    }
        // Confirmation of a job
        public function confirmJob($id) 
    {
        $joboffer = Joboffer::find($id);
        $user = Employer::find($joboffer->employer_id);
        $employee = Auth::user();

        $data = array(
            'user' => $user,
            'joboffer' => $joboffer,
            'employee' => $employee,
            );

        Mail::send('emails.confirmJob', $data, function ($message) use ($user) {
            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->user->email)->subject('JobDate - Job has been accepted');

        });
    }
        // Reminding an employer to renew their sub (PASS USER ID NOT EMPLOYEE ID.)
        public function renewSub($id) 
    {
        $data = array(
            'user' => User::find($id),
            );

        Mail::send('emails.renewSub', $data, function ($message) use ($user) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Subscription Renewal');

        });

        return back();

    }
        // Reminding and employer to review and employee
        public function reviewRemind() 
    {

    }
        // When a job request is sent
        public function sendJobRequest($id) 
    {
        $invite = Invite::find($id);
        if($invite->request_type == "job"){
        $joboffer = Joboffer::find($invite->joboffer_id);
        $user = Auth::user();
        $employee = Employee::find($invite->employee_id);
        $employee = $employee->user;

        $data = array(
            'user' => $user,
            'joboffer' => $joboffer,
            'employee' => $employee,
            );

        Mail::send('emails.sendJobRequestemployer', $data, function ($message) use ($user) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Sent Job Request');

        });

        $data = array(
            'user' => $user,
            'joboffer' => $joboffer,
            'employee' => $employee,
            );

        Mail::send('emails.sendJobRequestemployee', $data, function ($message) use ($employee) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to($employee->email)->subject('JobDate - New Job Request');

        });
        return back()->with('success', 'Successfully invited to a job.');
        }
        elseif($invite->request_type == "details"){
            $user = Auth::user();
            $employee = Employee::find($invite->employee_id);
            $employee = $employee->user;
                        
            $data = array(
                'user' => $user,
                'employee' => $employee
            );

        Mail::send('emails.sendDetailRequestemployee', $data, function ($message) use ($employee) {
            $message->from('team@jobdate.com', 'JobDate');
            $message->to($employee->email)->subject('Jobdate - Someone has requested your details');
        });
        return back()->with('success', 'Successfully requested details.');
        }
        // return back()->withError('Successfully invited to a Job');
    }
}
