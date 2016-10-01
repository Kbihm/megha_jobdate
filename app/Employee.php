<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\User;

class Employee extends User
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
        'average_rating' => 'required',
        'about' => 'required',
        'gender' => 'required'
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

    public function joboffers()
    {
        // return $this->belongsTo(Joboffers::class);
        // return $this->morphToMany('App\Invites', 'taggable');
    }

}
