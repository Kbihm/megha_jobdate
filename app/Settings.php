<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    
    protected $fillable = [
        'sub_days',
        'sub_price',
        'support_email',
        'dispute_email',
        'employee_registration_blocked'
    ];

    public static $rules = [
        // 'sub_days' => 'required',
        // 'sub_price' => 'required',
        'support_email' => 'required|email',
        'dispute_email' => 'required|email',
        'employee_registration_blocked' => 'required'
    ];

    public static $roles = [
        'Waiter/Waitress',
        'Bartender',
        'Barista',
        'Kitchenhand',
        'Cook',
        'Chef',
        'Musician',
        'Cleaner',
        'Delivery Driver',
        'Fast Food Attendant'
    ];

}
