<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Employee extends Model
{

    protected $fillable = [
        'phone',
        'average_rating',
        'about',
        'role',
        'gender',
        'fulltime',
        'hourly_rate'
    ];

    public static $rules = [
        'phone' => 'required',
        // 'average_rating' => 'required',
        // 'about' => 'required',
        'gender' => 'required',
        'hourly_rate' => 'required|digits_between:0,150'
    ];

    // public function accept_request($request_id)
    // {

    // }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

}
