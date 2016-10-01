<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'joboffer_id',
        'employee_id' 
    ];

    public static $rules = [
        'joboffer_id' => 'required',
        'employee_id' => 'required'
    ];


}
