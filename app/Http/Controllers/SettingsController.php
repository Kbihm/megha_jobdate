<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Settings;

class SettingsController extends Controller
{
    
    public function index()
    {
        $settings = Settings::all();
        return view('settings.index', compact($settings));
    }

    // public function show($id)
    // {
    //     $setting = Settings::find($id);
    //     return view('settings.show', compact($setting));
    // }

    public function update($id, Request $request)
    {
        $this->validate($request, Settings::$rules);
        $setting = Settings::find($id);
        $setting->update($request->all());
        $setting->save();
        return redirect('admin/settings');
    }

}
