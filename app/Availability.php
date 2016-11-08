<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    
    protected $fillable = [
        'date',
        'night',
        'morning',
        'day'
    ];

    protected $rules = [
        'date' => 'required',
        'night' => 'required',
        'morning' => 'required',
        'day' => 'required'
    ];



}
