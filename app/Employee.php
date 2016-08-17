<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'phone',
        'average_rating',
        'about',
        'skills',
        'role'
    ];

    public static $rules = [
        'phone' => 'required',
        'average_rating' => 'required',
        'about' => 'required',
        'skills' => 'required'
    ];

    public function accept_request($request_id)
    {

    }

}
