<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{

    protected $fillable = [
        'abn',
        'address',
        'promo_code'
    ];

    public static $rules = [
        'abn' => 'required|unique',
        'address' => 'required'
    ];

    /**
     * Request an employee for a certain set of dates
     * 
     * @param $employee_id Employer User ID
     * @param $dates The dates being requested for
     * @param $message The message to the employee
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean or ID of Successful Request
     */
    public function request_employee($employee_id, $dates, $message)
    {

    }

    /**
     * Employee Cancels a Job Request // Could this just be done in the request class. 
     * 
     * @param $request_id the request to cancel
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public function cancel_job($request_id)
    {

    }

    /**
     * Add Subscription time to the user account.  THIS NEEDS TO BE ALTERED.
     * 
     * @param None
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public function add_subscription_time()
    {

    }

    /**
     * Request Contact details for an employee  
     * 
     * @param $employee_id The ID of the Employee to get contact details from.
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Status Boolean
     */
    public function request_contact_details($employee_id)
    {

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
