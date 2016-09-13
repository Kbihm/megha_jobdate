<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    
    protected $fillable = [
        'skill',
        'employee_id'
    ];

    public static $rules = [
        'skill' => 'required|min:3',
        'employee_id' => 'int'
    ];

}
