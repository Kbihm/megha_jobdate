<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'joboffer_id',
        'employee_id',
        'request_type',
        'employer_id'
    ];

    public static $rules = [
        'employee_id' => 'required',
        'employer_id' => 'required'
    ];


    public function joboffer()
    {
        return $this->belongsTo(Joboffer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

        public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
