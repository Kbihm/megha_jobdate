<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailHelper extends Model
{
    
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

    /**
     * Send an email to the employer if they haven't left a review for a job 
     * 
     * @param $employer_id Employer User ID
     * @param $request_id The Job Request ID to pull in information about it.
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function review_employee_reminder($employer_id, $request_id) 
    {

    }

    /**
     * Send an email to the employer to remind them their subscription is 
     * running out and they need to renew
     * 
     * @param $employer_id Employer User ID
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function subscription_reminder($employer_id) 
    {

    }

    /**
     * Remind a user that they have a promocode waiting to be used.
     * 
     * @param $employer_id Employer User ID
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function promo_code_reminder($employer_id) 
    {

    }

    // Can't Remember what this function is meant to do ... confirm 
    // Does it tell the employer when and employee responds? 
    public static function job_request_update($employer_id, $employee_id) 
    {

    }

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
    public static function employee_details_request($employer_id, $employee_id) 
    {

    }

    /**
     * Send an email to the user to confirm their email account, prevent use.
     * of the site without a verified email address.  
     * 
     * @param $employer_id Employer User ID
     * @param $employee_id Employee User ID
     * @param $request_id The Job Request ID to pull in information about it.
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function verify_email($employer_id, $employee_id) 
    {

    }

    /**
     * Send an email to the dispute team with the details 
     * 
     * @param $user_id User ID who made the dispute
     * @param $message the message that gets sent to the dispute team
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function dispute($user_id, $message) 
    {

    }

    /**
     * Send an email to the employee if they haven't logged in and have been
     * sent a job request  
     * 
     * @param $employer_id Employer User ID
     * @param $employee_id Employee User ID
     * @param $request_id The Job Request ID to pull in information about it.
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public static function login_notification($user_id) 
    {

    }

}
