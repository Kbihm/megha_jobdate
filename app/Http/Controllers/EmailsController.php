<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

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
    public function dispute() 
    {

    }
        //When a new user signs signs Up
    public function signUp() 
    {

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
        public function acceptJob() 
    {

    }
        // Declination of a job
        public function declineJob() 
    {

    }
        // Confirmation of a job
        public function confirmJob() 
    {

    }
        // Reminding an employer to renew their sub
        public function renewSub() 
    {

    }
        // Reminding and employer to review and employee
        public function reviewRemind() 
    {

    }
        // When a job request is sent
        public function sendJobRequest() 
    {

    }
}
