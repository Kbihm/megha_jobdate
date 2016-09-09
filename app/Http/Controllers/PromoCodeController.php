<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Promocode;
use Auth;

class PromoCodeController extends Controller
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
       // Prevent access from any non Admins - This doesn't work!
        if (Auth::check() && Auth::user()->admin_id == null)
            return 'Not Authorized.';
    }

    public function index() 
    {
        $promocodes = Promocode::paginate(20);
        return view('promocode.index', compact('promocodes'));
    }

    public function create()
    {
        return view('promocode.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, Promocode::$rules);
        $promocode = new Promocode($request->all());
        $promocode->number_of_times_used = 0;
        $promocode->save();
        return redirect('/admin/promocode');
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

}
