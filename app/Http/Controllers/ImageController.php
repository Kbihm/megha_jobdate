<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Config\Image;
use App\Http\Requests;
use Response;

class ImageController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }

        public function store(Request $request)
    {   
        // $this->validate($request, Image::$rules);
        $user = Auth::user();
        $file = $request->file('image');
        $destinationPath = public_path().'/profilePics/';
        $filename = $user->employee->id . '.' . $file->getClientOriginalextension();
        $uploadSucess = $file->move($destinationPath, $filename);

        return redirect('/profile');
    }
    public function readImage($filename)
    {   
            $path = public_path().'/profilePics/' . $filename;

            return $path;
    }
}

