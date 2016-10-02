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

    public function store(Request $request)
    {   

        $this->validate($request, Comment::$rules);
        $comment = new Comment($request->all());
        $comment->employer_id = Auth::user()->employer->id;
        $comment->save();
        return redirect('/reviews');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/reviews');
    }

        public function create($id)
    {

        $user = Employee::find($id);     
        return view('comments.create', compact('user'));
    }


}
