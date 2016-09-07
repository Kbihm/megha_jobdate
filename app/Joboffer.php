<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joboffer extends Model
{
    
    protected $fillable = [
        'role',
        'hours',
        'description',
        'time',
        'date'
    ];

    public static $rules = [
        'role' => 'required',
        'hours' => 'required',
        'description' => 'required',
        'time' => 'required',
        'date' => 'required'
    ];


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
