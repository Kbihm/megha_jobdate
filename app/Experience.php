<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'employment_length',
        'establishment_name',
        'employee_id'
    ];

    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'employment_start' => 'required',
        'establishment_name' => 'required',
        'employee_id' => 'required'
    ];

}
