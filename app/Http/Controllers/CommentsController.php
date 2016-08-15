<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;

class Comments extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index() {
        return Comment::all();
    }

    public function create() 
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = new Comment($request->all());
        $comment->save();
        // @TODO Update This Route.
        return view('comments.index');
    }

    /**
     * Update a comment, useful if an edit function is provided for comments.
     * @param $id of Comment
     * @param $request by laravel form 
     *
     * @author Nate Sanchez-Goodwin <nsg223@gmail.com>
     * @return View 
     */
    public function update($id, Request $request)
    {
        $comment = Comment::find($id);
        $comment->update();
        // @TODO Update this route
        return back();
    }

    /**
     * Delete a comment, can only be done by the author of the comment or
     * someone logged in to an admin account.
     * @param $id of Comment 
     *
     * @author Nate Sanchez-Goodwin <nsg223@gmail.com>
     * @return redirect back.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $logged_in_user = Auth::user();
        if ($logged_in_user->id == $comment->comment_owner_id || $logged_in_user->admin_id != null) {
            $comment->delete();
        }
        // @TODO Update this route.
        return back();
    }

}
