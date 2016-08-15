<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    
    protected $fillable = [
        'number_of_uses',
        'percentage',
        'days',
        'expiry',
        'code'
    ];

    public static $rules = [
        'number_of_uses' => 'required',
        'percentage' => 'required',
        'days' => 'required',
        'expiry' => 'required',
        'code' => 'required'
    ];

    /**
     * Apply a promo code to the passed in user id
     * 
     * @param $user_id 
     *
     * @author (Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return Assoc Array, Status Boolean, Error String
     */
     public function apply_promo($user_id)
     {

     }

}
