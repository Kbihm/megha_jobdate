<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Comment;
use App\Employee;

class CommentsController extends Controller
{

    /**
     * Prevent any logged in accounts from interacting with comments via this 
     * controller any view user profile will get comments in that location.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    /**
     * Return all of the comments that exist, that are not approved. 
     */
    public function index() {
        $comments = Comment::where('approved', false)->paginate(15);
        return view('comments.index', compact('comments'));
    }

    /**
     * Return all of the comments that exist, that are approved. 
     */
    public function approved() {
        $comments = Comment::where('approved', true)->paginate(15);
        return view('comments.index', compact('comments'));
    }
    
    /**
     * Show the form for creating a comment.
     */
    public function create() 
    {

        return view('comments.create', compact('id'));
    }

    /**
     * Store a new comment.
     */
    public function store(Request $request)
    {
        $this->validate($request->all(), Comment::$rules);
        $comment = new Comment($request->all());
        $comment->owner_user_id = Auth::user()->id;
        $comment->save();
        $comment->update_rating();
        // @TODO Update This Route.
        return view('comments.index');
    }

    /**
     * Update a comment, useful if an edit function is provided for comments.
     */
    public function update($id, Request $request)
    {
        $this->validate($request->all(), Comment::$rules);
        $comment = Comment::find($id);
        $comment->update($request->all());
        $comment->update_rating();
        // @TODO Update this route
        return back();
    }

    /**
     * Delete a comment, can only be done by the author of the comment or
     * someone logged in to an admin account.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        $logged_in_user = Auth::user();
        if ($logged_in_user->id == $comment->comment_owner_id || $logged_in_user->admin_id != null) {
            $comment->delete();
            $comment->update_rating();
        }
        // @TODO Update this route.
        return back();
    }

    public function edit($id)
    {
        return 'Comments can not be edited';
    }

    public function approve($id)
    {
        // Admin Check
        if (Auth::User()->admin_id == null)
          return 'You can not approve comments';

        $comment = Comment::find($id);
        $comment->approved = true;
        $employee = Employee::find($comment->employee_id);


        $comment->save();
        $employee->calc_rating();
        return redirect('/admin/comments');
    }

    public function disapprove($id)
    {
        // Admin Check
        if (Auth::User()->admin_id == null)
          return 'You can not approve comments';

        $comment = Comment::find($id);
        $comment->approved = false;
        $employee = Employee::find($comment->employee_id);
        $comment->save();
        $employee->calc_rating();
        return redirect('/admin/comments/approved');
    }

}
