<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Auth;


class EmployerCommentsController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employer');
    }

    public function index()
    {
        $user = Auth::user();
        $comments = Comment::where('employer_id', $user->employer_id)->get();
        return view('employer-comments.index', compact('comments'));
    }


}
