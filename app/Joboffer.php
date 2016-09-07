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

    // public static $rules = []


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
