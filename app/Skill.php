<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    
    protected $fillable = [
        'name'
    ];

    public static $rules = [
        'name' => 'required|min:3'
    ];

}
