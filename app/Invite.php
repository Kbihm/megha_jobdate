<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    public static $rules = [
        'joboffer_id' => 'required',
        'employee_id' => 'required'
    ];


}
