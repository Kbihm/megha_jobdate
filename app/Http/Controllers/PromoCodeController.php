<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Promocode;

class PromoCode extends Controller
{

    /**
     * @return FIX COMMENTS IN THIS FILE!
     * @return FIX ONLY AUTH::USER()->admin_id != null; can edit
     */
    

    /**
     * Prevent any logged in accounts from interacting with Promocodes via this 
     * controller.
     */
    public function __construct()
    {
        $this->middleware('auth');
        //Prevent access from any non Admins
        if (Auth::user()->admin_id == null)
            return back();
    }

    public function index() 
    {
        $promocodes = Promocode::all();
        return $promocodes;
    }

    public function create()
    {
        return view('promocode.create');
    }

    public function store(Request $request)
    {
        $this->validate($request->all(), Promocode::$rules);
        $promocode = new Promocode($request->all());
        $promocode->save();
        return view('promocode.index');
    }

    public function update(Request $request)
    {
        $this->validate($request->all(), Promocode::$rules);
        $promocode = Promocode::find($id);
        $promocode->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        $promocode = Promocode::find($id);
        $promocode->delete();
        return redirect('promocode.index');
    }


}
