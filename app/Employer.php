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
        'abn' => 'required',
        'address' => 'required'
    ];

    
    public function request_employee($employee_id, $dates) 
    {

    }


    public function cancel_job($request_id)
    {

    }


    public function add_subscription_time()
    {

    }


    public function request_contact_details($employee_id)
    {

    }


}
