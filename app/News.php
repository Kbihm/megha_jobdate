<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    protected $fillable = [
        'message',
        'title'
    ];

    public static $rules = [
        'title' => 'required',
        'message' => 'required'
    ];


}
