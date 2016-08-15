<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    
    protected $fillable = [
        'sub_days',
        'sub_price',
        'support_email',
        'dispute_email'
    ];

}
