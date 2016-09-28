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
        
   


}
