<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];
    

    protected $fillable = [
        'abn',
        'address',
        'promo_code',
        'phone',
        'establishment_name',
    ];

    public static $rules = [
        'abn' => 'required|unique:employers',
        'address' => 'required',
        'phone' => 'required',
        'establishment_name' => 'required'
    ];

    public static $update_rules = [
        'abn' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'establishment_name' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
