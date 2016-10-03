<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
use Auth;
use App\Http\Requests;
use App\Employee;

class InvitesController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('employer');
    }
    
    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        
        $this->validate($request, Invite::$rules);
        $invite = new Invite($request->all());
        $invite->save();
        return redirect('/jobs');
    }



}
