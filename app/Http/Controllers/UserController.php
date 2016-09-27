<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Skill;
use App\Experience;
use App\Comment;
use Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employer');
    }
    public function index() 
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function show($id) 
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    public function profile()
    {
            $user = Auth::user();
            return view('profile', compact('user'));
    }
}