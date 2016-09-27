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
    }
    
    public function index()
    {
        $settings = Settings::find(1);
        return view('settings.index', compact('settings'));
    }


    public function update($id, Request $request)
    {
        $this->validate($request, Settings::$rules);
        $setting = Settings::find($id);

        if($request['employee_registration_blocked'] = 0){
            $request['employee_registration_blocked'] = "FALSE";
        }
        elseif($request['employee_registration_blocked'] = 1){
            $request['employee_registration_blocked'] = "TRUE";
        }

        $setting->update($request->all());
        $setting->save();
        return redirect('admin/settings');
    }

}
