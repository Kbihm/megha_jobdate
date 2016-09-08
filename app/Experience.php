<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'employment_length',
        'establishment_name'
    ];

    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'employment_length' => 'required',
        'establishment_name' => 'required'
    ];

}
