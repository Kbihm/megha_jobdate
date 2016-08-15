<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'comment',
        'rating',
        'user_id'
    ];
    
    /**
     * This function will be called when a review is left to make searching faster. 
     * @param $user_id User ID for rating to be updated.
     *
     * @author (Update use format: Nate Sanchez-Goodwin <nsg223@gmail.com>)
     * @return void
     */
    public function update_rating($user_id) 
    {
        
    }

}
