<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Settings;

class SettingsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('admin');
    }
    
    public function index()
    {
        $settings = Settings::find(1);
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, Settings::$rules);
        $setting = Settings::find(1);
        $setting->update($request->all());
        $setting->save();

        return redirect('admin/settings');
    }

}
