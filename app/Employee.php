<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Employee extends Model
{

    protected $fillable = [
        'phone',
        'average_rating',
        'about',
        'role',
        'second_role',
        'gender',
        'fulltime',
        'hourly_rate',
        'region',
        'area',
        'suburb',
        'state'
    ];

    public static $rules = [
        'phone' => 'required',
        // 'average_rating' => 'required',
        // 'about' => 'required',
        'gender' => 'required',
        'hourly_rate' => 'required|digits_between:0,150'
    ];

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
        $comments = $this->hasMany(Comment::class);
        return $comments->where('approved', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    public function availability()
    {
        return $this->hasMany(Availability::class);
    }

    public function calc_rating()
    {
        $comments = Comment::where('employee_id', $this->id)->where('approved', true)->get();
        
        if(sizeof($comments) != 0){

            $sum = 0;

            foreach ($comments as $comment)
                $sum += $comment->rating;

            // $sum -= sizeof($comments);
            $avg = $sum / sizeof($comments);
            $this->average_rating = $avg;
            $this->save();
            }

            else{
            $avg = 0;
            $this->average_rating = $avg;
            $this->save();
            }

    }

}
