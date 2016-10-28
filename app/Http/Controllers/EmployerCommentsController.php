<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
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
        $comments = Comment::where('employer_id', $user->employer->id)->get();
        return view('employer-comments.index', compact('comments'));
    }

    public function store(Request $request)
    {   
        //$this->validate($request, Comment::$rules);
        $comment = new Comment($request->all());
        //punctual and able  - positive
        if(substr_compare(substr($comment->comment, -7), "future.", 1)){
            $comment->rating = 2;
        }
        //Neutral – Employee did not turn up
        elseif(substr_compare(substr($comment->comment, -7), " level.", 1)){
            $comment->rating = 1;
        }
        //Neutral – Employee was a 
        elseif(substr_compare(substr($comment->comment, -7), "ployer.", 1)){
            $comment->rating = 1;
        }
        //Negative – Employee was not able
        elseif(substr_compare(substr($comment->comment, -7), "istory.", 1)){
            $comment->rating = 0;
        }
        //Negative – Employee never showed
        elseif(substr_compare(substr($comment->comment, -7), "he job.", 1)){
            $comment->rating = 0;
        }
        $comment->approved = true;
        $comment->employer_id = Auth::user()->employer->id;
        $comment->save();
        return redirect('/reviews');
    }

        public function customStore(Request $request)
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
        public function customCreate($id) 
    {
        $user = Employee::find($id);     
        return view('comments.createcustom', compact('user'));
    }


}
