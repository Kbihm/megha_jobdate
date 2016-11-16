<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;

class User extends Authenticatable
{
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'first_name' => 'required', 
        'last_name' => 'required', 
        'email' => 'required|unique:users', 
        'password' => 'required|min:5, max:30',
        'password_confirmation' => 'required|same:password'
    ];

    public static $update_rules = [
        'first_name' => 'required', 
        'last_name' => 'required',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function banned()
    {
        return $this->belongsTo(Banned::class);
    }
    
}
