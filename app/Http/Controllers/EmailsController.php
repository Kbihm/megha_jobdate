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
    
    
    public function index() 
    {
         $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('team@jobdate.com', 'Learning Laravel');

        $message->to('liam.a.southwell@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";
    }
        
        //Any time a dispute is filed through the dispute system
    public function dispute($id, $cid) 
    {

        $data = array(
            'user' => Auth::user(),
            'comment' => Comment::find($cid),
            );

        Mail::send('emails.sendDispute', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Dispute');

        });
        return back();
    }
        //When a new user signs signs Up
    public function signUp($id) 
    {
        $data = array(
            'user' => User::find($id),
            );

        Mail::send('emails.signUp', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Sign Up');

        });
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
        $data = array(
            'user' => Auth::user(),
            'joboffer' => $joboffer,
            );

        Mail::send('emails.acceptJob', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Accepted A Job');

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

        Mail::send('emails.confirmJob', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Job has been accepted');

        });
    }
        // Reminding an employer to renew their sub (PASS USER ID NOT EMPLOYEE ID.)
        public function renewSub($id) 
    {
        $data = array(
            'user' => User::find($id),
            );

        Mail::send('emails.renewSub', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Subscription Renewal');

        });

        return "Your rewnewal has been sent successfully";

    }
        // Reminding and employer to review and employee
        public function reviewRemind() 
    {

    }
        // When a job request is sent
        public function sendJobRequest($id) 
    {
        $invite = Invite::find($id);
        $joboffer = Joboffer::find($invite->joboffer_id);
        $user = Auth::user();
        $employee = Employee::find($invite->employee_id);
        $employee = $employee->user;

        $data = array(
            'user' => $user,
            'joboffer' => $joboffer,
            'employee' => $employee,
            );

        Mail::send('emails.sendJobRequestemployer', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Sent Job Request');

        });

        $data = array(
            'user' => $user,
            'joboffer' => $joboffer,
            'employee' => $employee,
            );

        Mail::send('emails.sendJobRequestemployee', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - New Job Request!');

        });
         return redirect('jobs');
    }
}
