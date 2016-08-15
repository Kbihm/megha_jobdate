<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MailHelper extends Controller
{
    
    // CONFIRM IF THIS SHOULD BE IN MODEL OR IN CONTROLLER.

    /**
     * Send an email to the employee with information about a new job request. 
     * 
     * @param $employer_id Employer User ID
     * @param $employee_id Employee User ID
     * @param $request_id The Job Request ID to pull in information about it.
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function job_request($employer_id, $employee_id, $request_id) 
    {

    }

    public static function review_employee_reminder($employer_id) 
    {

    }

    public static function subscription_reminder($employer_id) 
    {

    }

    public static function promo_code_reminder($employer_id) 
    {

    }

    // Can't Remember what this function is meant to do ... confirm it
    public static function job_request_update($employer_id, $employee_id) 
    {

    }

    public static function employee_details_request($employer_id, $employee_id) 
    {

    }

    public static function verify_email($employer_id, $employee_id) 
    {

    }

    public static function dispute($user_id, $message) 
    {

    }

    public static function login_notification($user_id) 
    {

    }


}
