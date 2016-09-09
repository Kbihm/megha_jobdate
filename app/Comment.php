<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'comment',
        'rating',
        'user_id',
        'prefilled_number'
    ];

    public static $rules = [
        'comment' => 'required',
        'rating' => 'required',
        'user_id' => 'required'
    ];
    
    /**
     * This function will be called when a review is left to make searching faster. 
     * @param None
     *
     * @author  Nate Sanchez-Goodwin <nsg223@gmail.com>
     * @return New Rating ? 
     */
    public function update_rating() 
    {
        
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
