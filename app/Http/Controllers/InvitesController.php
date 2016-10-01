<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invites;
use Auth;
use App\Http\Requests;

class InvitesController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('employer');
    }
    
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {   
        $this->validate($request, Invite::$rules);
        $invite = new Invite($request->all());
        $invite->employee_id = $id;
        $invite->save();
        return redirect('/jobs');
    }

    public function update(Request $request, Promocode $promocode)
    {
        $this->validate($request, Promocode::$rules);   
        $promocode->update($request->all());
        return redirect('admin/promocode');
    }

    public function destroy($id)
    {
        $promocode = Promocode::find($id);
        $promocode->delete();
        return redirect('admin/promocode');
    }

    public function show($id)
    {
        $promocode = Promocode::find($id);
        return view('promocode.show', compact('promocode'));
    }

    public function edit($id)
    {
        $promocode = Promocode::find($id);
        return view('promocode.show', compact('promocode'));
    }

}
