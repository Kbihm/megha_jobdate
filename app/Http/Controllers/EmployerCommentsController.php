<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Auth;


class EmployerCommentsController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $comments = Comment::where('owner_user_id', $user->id)->get();
        return view('employer-comments.index', compact('comments'));
    }


}
