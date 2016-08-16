<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    
    protected $fillable = [
        'employer_id',
        'status',
    ];

    public static $rules = [
        'employer_id' => 'required',
        'status' => 'required', // See if we can validate based on options
    ];


}
