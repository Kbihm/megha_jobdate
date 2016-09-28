<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Comment;

class EmployeeCommentsController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }

    public function index()
    {
        $user = Auth::user();
        $comments = Comment::where('employee_id', $user->employee_id)->get();
        return view('employee-comments.index', compact('comments'));

    }


}
